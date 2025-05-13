<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear manualmente el primer admin
        $admin = new Admin();
        $admin->username = 'ricardo1234';
        $admin->name = 'Ricardo Blanco';
        $admin->email = 'ricardo@email.com';
        $admin->email_verified_at = now();
        $admin->password = Hash::make('password');
        $admin->created_at = now();
        $admin->updated_at = now();
        $admin->last_login = null;
        $admin->is_active = 0;
        $admin->type_user = 'admin';
        $admin->rol = 'Administrador';
        $admin->remember_token = Str::random(10);
        $admin->avatar = 'images/default_profile.jpg';
        $admin->save();

        // Crear carpeta para el primer admin
        $adminFolder = storage_path('app/public/files/admins/' . $admin -> username);
        if (!file_exists($adminFolder)) {
            mkdir($adminFolder, 0777, true);
        }

        // Crear 150 admins más con carpeta individual
        $admins = Admin::factory(15)->create();
        foreach ($admins as $a) {
            $folder = storage_path('app/public/files/admins/' . $a -> username);
            if (!file_exists($folder)) {
                mkdir($folder, 0777, true);
            }
        }
    }
}
