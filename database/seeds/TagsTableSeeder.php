<?php

use App\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['letteraturaitaliana', 'letteraturastraniera', 'intramontabile', 'illustrazioni', 'poesia', 'citazioni', 'perriflettere', 'consigliato', 'incipit', 'spoiler', 'loveit'];

        foreach($tags as $tag)
        {
            $newTag = new Tag();
            $newTag->name = $tag;
            $newTag->slug = Str::slug($tag);
            $newTag->save();
        }
    }
}
