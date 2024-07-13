<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\UsersTableSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Désactiver les vérifications de clé étrangère
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        // Vider les tables
      
        DB::table('users')->truncate();

        // Réactiver les vérifications de clé étrangère
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        $user3 = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
            'password' => bcrypt('password'),
        ]);
        $user3->assignRole('super-admin');

        $user2 = User::create([
            'name' => 'Mariama Diallo',
            'email' => 'i@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $user2->assignRole('admin');

        $user1 = User::create([
            'name' => 'User',
            'email' => 'user@mail.com',
            'password' => bcrypt('password'),
        ]);
        $user1->assignRole('user');
    }
}
