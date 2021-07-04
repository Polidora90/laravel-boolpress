<?php

use Illuminate\Database\Seeder;
use App\Category;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Biografia', 'Saggio storico', 'Giallo', 'Romanzo', 'Classico', 'Azione', 'Rosa', 'Umoristico'];

        foreach($categories as $category) {
            $new_category_object = new Category();
            $new_category_object->name = $category;
            $new_category_object->slug = Str::slug($category);
            $new_category_object->save();
        }
    }
}
