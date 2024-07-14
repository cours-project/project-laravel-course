<?php

namespace Modules\User\seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Modules\User\src\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    // $faker = Factory::create();
    //     for($i= 0;$i<=30; $i++){
    //     $user = new User();
    //     $user->name = $faker->name;
    //     $user->email = $faker->email;
    //     $user->password = Hash::make('111');
    //     $user->group_id = 1;
    //     $user->save();
    //     }
    DB::table('users')->insert([
        'name' => 'hung',
        'email' => 'zkanhung@gmail.com',
        'group_id' => 1,
        'password' => Hash::make('111111'),
    ]);

    }
}
