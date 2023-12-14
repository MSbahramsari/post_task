<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'title'=>'ورزشی',
            'description'=>Str::random(20)
        ]);
        Category::create([
            'title'=>'ادبی',
            'description'=>Str::random(20)
        ]);
        Category::create([
            'title'=>'تاریخ',
            'description'=>Str::random(20)
        ]);
        Category::create([
            'title'=>'عمومی',
            'description'=>Str::random(20)
        ]);
    }
}
