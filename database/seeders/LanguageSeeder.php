<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\Language::factory()->create([
            'title' => 'English',
            'lang_type' => 'Audio'
        ]);

        \App\Models\Language::factory()->create([
            'title' => 'Spanish',
            'lang_type' => 'Audio'
        ]);

        \App\Models\Language::factory()->create([
            'title' => 'German',
            'lang_type' => 'Audio'
        ]);
    }
}
