<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;
use Storage;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MailController extends Controller {
  /* public function basic_email() {
      $data = array('name'=>"Virat Gandhi");

      Mail::send(['text'=>'mail'], $data, function($message) {
         $message->to('abc@gmail.com', 'Tutorials Point')->subject
            ('Laravel Basic Testing Mail');
         $message->from('xyz@gmail.com','Virat Gandhi');
      });
      echo "Basic Email Sent. Check your inbox.";
   }*/
/*   public function html_email() {
      $data = array('name'=>"Virat Gandhi");
      Mail::send('mail', $data, function($message) {
         $message->to('abc@gmail.com', 'Tutorials Point')->subject
            ('Laravel HTML Testing Mail');
         $message->from('xyz@gmail.com','Virat Gandhi');
      });
      echo "HTML Email Sent. Check your inbox.";
   }*/
   public function attachment_email($data) {
     echo($data);
      //$datosEmail = array('name'=> $data->nombre);
      $datosEmail = array('name' => $data->nombre, 'fecha' => $data->fecha_nacimiento);
      Mail::send('mail', $datosEmail, function($message) {
         $message->to('iherfue@gmail.com', 'Tutorials Point')->subject
            ('Feliz Cumpleaños');
  //          $message->attach();
         //$message->attach('C:\laravel-master\laravel\public\uploads\test.txt');
         $message->from('iherfuesecundario@gmail.com','LARAVEL SERVER');
      });
      echo "Email Sent with attachment. Check your inbox.";
   }
}
