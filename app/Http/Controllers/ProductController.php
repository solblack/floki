<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\ProductPhoto;
use Illuminate\Http\Request;
use Session;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  $products = Product::all();

        $products = Product::paginate(20);

        $categories = Category::all();


        return view('shop')->with('products', $products)
            ->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $data)
    {

        $product = Product::create([
            'name' => $data['name'],
            'price' => $data['price'],
            'stock' => $data['stock'],
            'description' => $data['description']
        ]);
        $product->categories()->attach($data->category);
        $route = $data['filename']->store('public/uploads/product_photos');
        $filename = basename($route);
        ProductPhoto::create([
            'filename' => $filename,
            'product_id' => $product->id
        ]);

        $products = Product::all();
        return view('/productList')->with('products', $product);
    }

    public function search()
    {

        $products = Product::where("name", "LIKE", "%" . $_GET["search"] . "%")
            ->orwhere("description", "LIKE", "%" . $_GET["search"] . "%")
            ->paginate(20);

        $categories = Category::all();

        return view('shop')->with('products', $products)
            ->with('categories', $categories);
    }

    public function orderByPrice($parametro)
    {
        if ($parametro == 'asc') {
            $products = Product::orderBy('price')->paginate(20);
        } elseif ($parametro == 'desc') {
            $products = Product::orderBy('price', 'DESC')->paginate(20);
        } elseif (is_numeric($parametro)) {
            $products = Product::where('price', '<', $parametro)->orderBy('price', 'DESC')->paginate(20);
        } else {
            $products = Product::paginate(20);
        }

        $categories = Category::all();

        return view('shop')->with('products', $products)
            ->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $category = $product->categories->first()->url;
        $productsRecomendados = Product::whereHas('categories', function ($query) use ($category) {
            $query->where('url', $category);
        })->inRandomOrder()->take(4)->get();

        return view('product')->with('product', $product)
            ->with('productsRecomendados', $productsRecomendados);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function list(Product $product)
    {
        $products = Product::orderBy('id', 'DESC')->paginate(20);

        $categories = Category::all();

        return view('productlist')->with('products', $products)
            ->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $product = Product::find($id);


        return view('editproduct')->with('product', $product);
    }

    public function update(Request $data)
    {

        $product = Product::find($data->id);
        $product->name = $data->name;
        $product->price = $data->price;
        $product->description = $data->description;
        $product->stock = $data->stock;
        $product->save();
        $product->categories()->attach($data->category);

        $filename = null;
        if($data->hasfile('filename')){
            $destinationPath = public_path('uploads/product_photos');
            $filename = $product->id . $data->file('filename')->getClientOriginalName();
            $data->file('filename')->move($destinationPath, $filename);
            ProductPhoto::create([
                'filename' => $filename,
                'product_id' => $product->id
            ]);

        };

        $products = Product::orderBy('id', 'DESC')->paginate(20);
        $categories = Category::all();

        return view('productlist')->with('products', $products);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/admin/productlist');
    }

    public function categories($url)
    {


        $products = Product::whereHas('categories', function ($query) use ($url) {
            $query->where('url', $url);
        })->paginate(20);



        return view('shop')->with('products', $products);
    }


    public function addToCart(Request $request)
    {
        
        $product = $request->all();



        if (Session::has('cart')) {
            $cart = Session::get('cart');
        }

        if (isset($cart[$product['id']])) :
            $cart[$product['id']]['cantidad'] += $product['cantidad'];
        else :
            $cart[$product['id']] = $product;
        endif;

        Session::put('cart', $cart);
        $cartsInSession = Session::get('cart');

        $cartItems = count($cartsInSession);

        return redirect()->back()->with('message', 'Hay nuevos productos en el carrito.')
            // ->with('cart_items', $cartItems)
            ->with('success', true);
    }

    public function editCart(Request $request)
    {
        $cartCambios = $request->all();

        // BORRA ARRAY EN SESSION
        // Session::forget('cart');

        $cart = Session::get('cart');

        if (count(Session::get('cart')) == 1) {
            Session::forget('cart');

            return redirect('home');
        } else {
            $cartIdABorrar = $cartCambios['cart-id'];

            unset($cart[$cartIdABorrar]);

            Session::put('cart', $cart);

            return redirect()->back();
        }

    }

    public function updateCart(Request $request){

        // dd($request);
        $product = $request->all();
        // dd($product);

        if (Session::has('cart')) {
            $cart = Session::get('cart');
        }

        if (isset($cart[$product['id']])) :
            $cart[$product['id']]['cantidad'] = $product['cantidad'];
        else :
            $cart[$product['id']] = $product;
        endif;

        Session::put('cart', $cart);
        $cartsInSession = Session::get('cart');
        // dd($cartsInSession);
        $cartItems = count($cartsInSession);

    }

    public function deleteFromCart(Request $request){

        $cartCambios = $request->all();

        $cart = Session::get('cart');

            $cartIdABorrar = $cartCambios['id'];

            unset($cart[$cartIdABorrar]);

            Session::put('cart', $cart);

        }



    public function cart()
    {


        $products = Product::all();



        return view('cart')->with('products', $products);
    }
}
