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
          'slug' => "uncategorized",
          'desc' =>"",
          'status'=> 1
        ]);
        Category::create([
          'id' => 2,
          'nama' => "Uncategorized",
          'slug' => "uncategorized-post",
          'desc' =>"",
          'status'=> 2
        ]);
        Category::create([
          'id' => 3,
          'nama' => "Populer",
          'slug' => "populer",
          'desc' =>"",
          'status'=> 1
        ]);
        Category::create([
          'id' => 4,
          'nama' => "Pilihan Oscar",
          'slug' => "pilihan-oscar",
          'desc' =>"",
          'status'=> 1
        ]);
      
    }
}
