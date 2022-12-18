<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $permissions= ['posts-index', 'posts-store', 'posts-update', 'posts-delete',
                'comments-index', 'comments-store', 'comments-update', 'comments-delete'];
            $admin = Role::create([
               'name' => 'admin',
               'permissions' => ['posts-index','comments-index']
            ]);

            $author = Role::create([
                'name' => 'author',
                'permissions' => $permissions
            ]);
    }
}
