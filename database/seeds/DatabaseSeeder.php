<?php

use Illuminate\Database\Seeder;
//use App\Models\Cliente;
use App\Cliente;
use App\User;

class DatabaseSeeder extends Seeder
{
  private $arrayClientes = array(
    array(
        'nombre' => 'Neo',
        'imagen' => 'https://vignette.wikia.nocookie.net/doblaje/images/4/4c/Neo2.jpg/revision/latest?cb=20160728235744&path-prefix=es',
        'fecha_nacimiento' => '1972-01-06',
        'correo' => 'neo@matrix.org'
    ),
    array(
        'nombre' => 'Morfeo',
        'imagen' => 'http://4.bp.blogspot.com/-pI-RatqdMFk/TgDDNTwkM7I/AAAAAAAAB40/VYUxhTL2480/s1600/Fishburne.JPG',
        'fecha_nacimiento' => '1997-03-05',
        'correo' => 'morfeo@matrix.org'
    )
);

private $arrayUsers = array(
  array(
      'name' => 'ivan',
      'email' => 'ivan@gmail.es',
      'password' => '1234'
  ),
  array(
      'name' => 'andres',
      'email' => 'andres@gmail.es',
      'password' => '123456'
  )
);
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        self::seedCatalog();
        $this->command->info('Tabla clientes inicializadas con datos!');
        self::seedUsers();
        $this->command->info('Tabla users inicializada con datos!');
        // $this->call(UsersTableSeeder::class);

        // La creación de datos de roles debe ejecutarse primero
        $this->call(RoleTableSeeder::class);
        // Los usuarios necesitarán los roles previamente generados
        $this->call(UserTableSeeder::class);

    }

    private function seedCatalog(){ //campos base de datos
//      DB::table('clientes')->delete();
//      $c->nombre(columna en BD)
      foreach( $this->arrayClientes as $cliente ) {
          $c = new Cliente;
          $c->nombre = $cliente['nombre'];
          $c->imagen = $cliente['imagen'];
          $c->fecha_nacimiento = $cliente['fecha_nacimiento'];
          $c->correo = $cliente['correo'];
          $c->save();
        }
    }

    private function seedUsers(){
      DB::table('users')->delete();
      foreach( $this->arrayUsers as $user ) {
          $c = new User;
          $c->name = $user['name'];
          $c->email = $user['email'];
          $c->password = bcrypt($user['password']);
          $c->save();
        }
    }
}
