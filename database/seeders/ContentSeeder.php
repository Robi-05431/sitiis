<?php

namespace Database\Seeders;

use App\Models\Content;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        $contents = [
            [
                'key'   => 'homepage_title',
                'label' => 'Judul Homepage',
                'value' => 'Selamat Datang di Website Kami',
                'type'  => 'text',
            ],
            [
                'key'   => 'homepage_subtitle',
                'label' => 'Subjudul Homepage',
                'value' => 'Temukan pengalaman wisata terbaik bersama kami',
                'type'  => 'text',
            ],
            [
                'key'   => 'about_text',
                'label' => 'Teks About',
                'value' => 'Kami adalah perusahaan wisata yang berpengalaman.',
                'type'  => 'textarea',
            ],
            [
                'key'   => 'homepage_banner',
                'label' => 'Banner Homepage',
                'value' => null,
                'type'  => 'image',
            ],
        ];

        foreach ($contents as $content) {
            Content::updateOrCreate(['key' => $content['key']], $content);
        }
    }
}
