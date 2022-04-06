<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Helpers;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create user roles
        $roles = ['admin', 'user'];
        
        foreach($roles as $item){
            Helpers::newRole($item);
        }
    }
}

