<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Exception;
use App\Mail\ContactoMailable;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    //

    public function pintarFormulario(){
        return view ('contacto.pintar');
    }


    public function procesarFormulario(Request $request){

        $request->validate([

            'nombre' => ['required' , 'string' , 'min:3'],
            'email'=> ['required' , 'email'],
            'contenido' => ['required' , 'string' , 'min:10'],


        ]);

        //Si pasamos las validaciones mandamos un objeto de la clase Mailable creada con make:mail ContactoMailable


        try{
            Mail::to('admin@posts.es')->send(new ContactoMailable($request->all())); //Se mandara el mensaje al administrador (por ejemplo) ,  con los campos nombre , email y contenido atraves de un array hacia el constructor de ContactoMailable
            return redirect()->route('dashboard')->with('mensaje' , "Mensaje de Correo Enviado");
        }catch(Exception $exception){
            return redirect()->route('dashboard')->with('mensaje' , "No se pudo enviar el correo intentelo mas tarde");

        }


    }


}
