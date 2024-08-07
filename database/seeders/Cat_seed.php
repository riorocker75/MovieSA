<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use DB;
class Cat_seed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('category')->delete();
        Category::create([
          'id' => 1,
          'nama' => "Uncategorized",
          'desc' =>"",
          'status'=> 1
        ]);
    }
}
