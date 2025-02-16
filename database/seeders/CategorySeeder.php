<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories=[
            ["category_name"=>"体重"],
            ["category_name"=>"体温"],
            ["category_name"=>"散歩"],
            ["category_name"=>"尿"],
            ["category_name"=>"便"],

        ];
        foreach( $categories as $category ) {
            Category::create(['category_name'=>$category["category_name"]]);
        }
    }
}
