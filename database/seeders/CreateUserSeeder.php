<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
               'name'=>'Admin User',
               'email'=>'admin@gmail.com',
               'type'=>1,
               'password'=> bcrypt('12345678'),
               'manager'    => 1,
               'c_manager'  => 1,
               'd_manager'  => 1,
               'e_manager'  => 1,
               'employee'   => 1,
               'c_employee' => 1,
               'd_employee' => 1,
               'e_employee' => 1,
               
            ],
            [
               'name'=>'manager User',
               'email'=>'manager@gmail.com',
               'type'=>2,
               'password'=> bcrypt('12345678'),
               'manager'    => 0,
               'c_manager'  => 0,
               'd_manager'  => 0,
               'e_manager'  => 0,
               'employee'   => 1,
               'c_employee' => 1,
               'd_employee' => 0,
               'e_employee' => 1,
               
            ],
            [
               'name'=>'Employee',
               'email'=>'employee@gmail.com',
               'type'=>0,
               'password'=> bcrypt('12345678'),

               'manager'    => 1,
               'c_manager'  => 0,
               'd_manager'  => 0,
               'e_manager'  => 0,
               'employee'   => 1,
               'c_employee' => 0,
               'd_employee' => 0,
               'e_employee' => 0,
            ],
        ];
        
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
