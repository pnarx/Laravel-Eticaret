<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        About::create( [

            'name'=> 'Pratik Shop E-ticaret',
            'content'=> 'E ticaret Hakkımızda yazısı',
            'text_1_icon' => 'icon-truck',
            'text_1'=> 'ÜCRETSİZ KARGO',
            'text_1_content'=> 'Ürünlerimizde kargo ücretsizdir',
            'text_2_icon'=> 'icon-refresh2',
            'text_2'=> 'ÜCRETSİZ İADE',
            'text_2_content'=> '30 gün içinde ücretsiz iade',
            'text_3_icon'=> 'icon-help',
            'text_3'=> 'MÜŞTERİ DESTEĞİ',
            'text_3_content'=> '7/24 Destek hattı',
        ]);

    }
}
