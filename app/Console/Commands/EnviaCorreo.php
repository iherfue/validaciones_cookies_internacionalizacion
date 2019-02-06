<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Cliente;
use App\Http\Controllers\MailController;

class EnviaCorreo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:enviaCorreo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envia un correo si es su cumpleaños';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      $cliente = Cliente::All();

      $hoy = date("m-d");
      //echo $hoy;
      foreach ($cliente as $c) {

        $fecha = substr($c->fecha_nacimiento,5);

        if($hoy == $fecha){
        //  echo('si cumple');
          $mail = new MailController();
          $data = $c;
          $mail->attachment_email($data);
        }
      }
    }
}
