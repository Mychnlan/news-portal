<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data contoh untuk dimasukkan
        $tags = [
            ['id' => 'TG1000001', 'name' => 'Teknologi', 'slug' => Str::slug('Teknologi')],
            ['id' => 'TG1000002', 'name' => 'Bisnis', 'slug' => Str::slug('Bisnis')],
            ['id' => 'TG1000003', 'name' => 'Olahraga', 'slug' => Str::slug('Olahraga')],
            ['id' => 'TG1000004', 'name' => 'Kesehatan', 'slug' => Str::slug('Kesehatan')],
            ['id' => 'TG1000005', 'name' => 'Hiburan', 'slug' => Str::slug('Hiburan')],
        ];

        // Memasukkan data menggunakan model Tag
        foreach ($tags as $tag) {
            Tag::create($tag);
        }
    }
}
