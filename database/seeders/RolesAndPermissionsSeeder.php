<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Database\Seeders\RolesAndPermissionsSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        DB::table('roles')->truncate();
        DB::table('permissions')->truncate();
         // Créer les permissions
         Permission::create(['name' => 'view ideas']);
         Permission::create(['name' => 'view idea details']);
         Permission::create(['name' => 'comment on ideas']);
         Permission::create(['name' => 'add idea']);
         Permission::create(['name' => 'edit own idea']);
         Permission::create(['name' => 'delete own idea']);
         Permission::create(['name' => 'approve idea']);
         Permission::create(['name' => 'accept idea']);
 
         // Créer les rôles et assigner les permissions
         $role1 = Role::create(['name' => 'user']);
         $role1->givePermissionTo(['view ideas', 'view idea details', 'comment on ideas']);
 
         $role2 = Role::create(['name' => 'admin']);
         $role2->givePermissionTo(['add idea', 'edit own idea','view idea details', 'delete own idea']);
 
         $role3 = Role::create(['name' => 'super-admin']);
         $role3->givePermissionTo(['approve idea','accept idea']);
    }
}
