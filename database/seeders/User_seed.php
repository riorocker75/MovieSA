<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Users;
use DB;

class User_seed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->delete();
        Users::create([
          'id' => 1,
          'username' => "admin",
          'password' =>bcrypt("admin"),
          'level' =>1,
          'status'=> 1
        ]);

        Users::create([
            'id' => 2,
            'username' => "fira",
            'password' =>bcrypt("fira"),
            'level' =>2,
            'status'=> 1
          ]);

          Users::create([
            'id' => 3,
            'username' => "razman",
            'password' =>bcrypt("razman"),
            'level' =>2,
            'status'=> 1
          ]);

    }
}
