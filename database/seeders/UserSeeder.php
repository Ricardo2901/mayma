<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
        $user = new User();
        $user -> username = 'alondramedina';
        $user -> name = 'Alondra Medina';
        $user -> email = 'alondra@email.com';
        $user -> password = '12345678';
        $user -> save(); 
        */
        $user = new User();
        $user -> username = 'alondra1234';
        $user -> name = 'Alondra Mendoza';
        $user -> email = 'alondra@email.com';
        $user -> email_verified_at = now();
        $user -> password = Hash::make('password');
        $user -> created_at = now();
        $user -> updated_at = now();
        $user -> last_login = null;
        $user -> is_active = 0;
        $user -> type_user = 'user';
        $user -> rol = 'Usuario';
        $user -> remember_token = Str::random(10); // Agrega el token de recordatorio
        $user -> avatar = 'images/default_profile.jpg'; // Agrega la imagen de perfil por defecto
        $user -> save();

        // Crear carpeta para el primer admin
        $userFolder = storage_path('app/public/files/users/' . $user -> username);
        if (!file_exists($userFolder)) {
            mkdir($userFolder, 0777, true);
        }

        // Crear 150 admins más con carpeta individual
        $users = User::factory(70)->create();
        foreach ($users as $u) {
            $folder = storage_path('app/public/files/users/' . $u -> username);
            if (!file_exists($folder)) {
                mkdir($folder, 0777, true);
            }
        }
    }
}
