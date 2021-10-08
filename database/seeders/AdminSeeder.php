<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
	        'name' => 'Fernand Jose',
	        'last_name' => 'Diaz Perez',
	        'tipo_usuario_id' => 4,
	        'cedula' => '27273962',
	        'telefono' => '0424-6265955',
	        'email' => 'fernand.diaz1708@gmail.com',
	        'password' => bcrypt('01000110'),
        ]);
    }
}
