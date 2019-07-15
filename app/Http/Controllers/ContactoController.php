<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Mail;
use App\Http\Requests;
// namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\ContactMail;





class ContactoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }


    public function index()
    {

        return view('contacto');

    }

    protected function enviarMensaje(Request $request)
    {

      $rules = [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255'],
        'mensaje' => ['required'],
      ];

      $messages = [
        'required' => 'El campo :attribute es obligatorio',
        'string' => 'El campo :attribute debe contener solo letras',
        'email' => "Por favor use el formato: usuario@ejemplo.com",

      ];

      $niceNames = array(
          'name' => 'nombre',
          'last_name' => 'apellido',
          'email' => 'email',
          'mensaje' => 'mensaje',
      );



      $validator = Validator::make($request->all(), $rules, $messages);
      $validator->setAttributeNames($niceNames);

      if ($validator->fails())
      {
          return redirect('contacto')->withErrors($validator->messages())->withInput();
      }
      else{


        // Mail::send(new ContactMail($request));

       $mensajeEnviado = "Su mensaje ha sido enviado!";

       return view('contacto')->with('mensajeEnviado', $mensajeEnviado);
      }




    }

}
