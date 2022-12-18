<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@blog.com',
            'password' => bcrypt('admin_password'),
            'role_id' => 1,
        ]);
        User::create([
            'name' => 'Author',
            'email' => 'author@blog.com',
            'password' => bcrypt('author_password'),
            'role_id' => 2,
        ]);
        User::create([
            'name' => 'Author2',
            'email' => 'author2@blog.com',
            'password' => bcrypt('author_password'),
            'role_id' => 2,
        ]);
    }
}
