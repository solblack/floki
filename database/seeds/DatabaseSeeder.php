<?php
use App\Product;
use App\ProductPhoto;
use App\ProductCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {



        DB::table('roles')->insert([
          'role' => 'admin'
        ]);
        DB::table('roles')->insert([
          'role' => 'client'
        ]);

        DB::table('users')->insert([
          'name' => 'admin',
          'last_name' => 'admin',
          'email' => 'admin@admin.com',
          'password' => bcrypt('admin'),
          'newsletter' => 0,
          'role_id' => '1'
        ]);

        DB::table('categories')->insert([
          'name' => 'Living',
          'url' => 'living',
          'is_main' => 1
        ]);
        DB::table('categories')->insert([
          'name' => 'Comedor',
          'url' => 'comedor',
          'is_main' => 1
        ]);

        DB::table('categories')->insert([
          'name' => 'Dormitorio',
          'url' => 'dormitorio',
          'is_main' => 1
        ]);

        DB::table('categories')->insert([
          'name' => 'Cocina',
          'url' => 'cocina',
          'is_main' => 1
        ]);

        DB::table('categories')->insert([
          'name' => 'Baño',
          'url' => 'bath',
          'is_main' => 1
        ]);

        DB::table('categories')->insert([
          'name' => 'Home office',
          'url' => 'homeoffice',
          'is_main' => 1
        ]);


        DB::table('order_statuses')->insert([
          'status' => 'ESPERANDO PAGO'
        ]);
        DB::table('order_statuses')->insert([
          'status' => 'PAGO APROBADO'
        ]);
        DB::table('order_statuses')->insert([
          'status' => 'EN CAMINO'
        ]);
        DB::table('order_statuses')->insert([
          'status' => 'COMPRA FINALIZADA OK'
        ]);
        DB::table('order_statuses')->insert([
          'status' => 'COMPRA CANCELADA'
        ]);
        DB::table('order_statuses')->insert([
          'status' => 'COMPRA RECLAMADA'
        ]);

        $products = factory(Product::class)->times(100)->create();

        foreach ($products as $product) {
          DB::table('product_category')->insert(
          [
          'product_id' => $product['id'],
          'category_id' => rand(1, 6)
          ]);
        }

// Cada "for" crea un filename para cada uno de los id de producto - con 3 "for" se crean 3 foto por producto
        for ($i=1; $i < 101 ; $i++) {
          DB::table('product_photos')->insert([
            'filename' => 'image-test (' . rand(1, 20) . ').jpg',
            'product_id' => $i
          ]);
        }
        for ($i=1; $i < 101 ; $i++) {
          DB::table('product_photos')->insert([
            'filename' => 'image-test (' . rand(1, 20) . ').jpg',
            'product_id' => $i
          ]);
        }
        for ($i=1; $i < 101 ; $i++) {
          DB::table('product_photos')->insert([
            'filename' => 'image-test (' . rand(1, 20) . ').jpg',
            'product_id' => $i
          ]);
        }






    }
}
