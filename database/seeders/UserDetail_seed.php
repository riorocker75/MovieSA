<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Userdetail;
use DB;
class UserDetail_seed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_detail')->delete();
        UserDetail::create([
          'id' => 1,
          'user_id' => "2",
          'nama' =>"Safira",
          'gender' =>"Wanita",
          'email'=> "Safira@tes.com",
          'umur'=> "1995-10-12",
          'phone'=> "082366779",
          'point'=> 10,
        ]);

        UserDetail::create([
            'id' => 2,
            'user_id' => "3",
            'nama' =>"Razman",
            'gender' =>"Pria",
            'email'=> "Razman@tes.com",
            'umur'=> "2013-10-12",
            'phone'=> "082126779",
            'point'=> 10,
          ]);
    }
}
