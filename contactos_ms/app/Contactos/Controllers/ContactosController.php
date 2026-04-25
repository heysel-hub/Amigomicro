<?php
namespace App\Contactos\Controllers;

use App\Contactos\Models\Contacto;
use Exception;

class ContactosController {

    function getContactos(){
        $rows = Contacto::all();
        return $rows->toJson();
    }
    
    function guardarContacto($data){
        $contacto = new Contacto();
        $contacto->nombre = $data['nombre'];
        $contacto->email = $data['email'];
        $contacto->telefono = $data['telefono'];
        $contacto->save();
        return $contacto->toJson();
    }

    function getContacto($id){
        //$contacto = Contacto::where('id', $id)->get()[0];
        $contacto = Contacto::find($id);
        if(empty($contacto)){
            throw new Exception("El contacto $id no existe", 1);
        }
        return $contacto;
    }

    function modificarContacto($id, $data){
        $contacto = $this->getContacto($id);
        $contacto->nombre = $data['nombre'];
        $contacto->email = $data['email'];
        $contacto->telefono = $data['telefono'];
        $contacto->save();
        return $contacto;
    }

    function borrarContacto($id){
        $contacto = $this->getContacto($id);
        $contacto->delete();
    }
}