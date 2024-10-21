<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SiteSetting::create([
            'name'=>'Telefon',
            'data'=>'0505 222 22 22'

        ]);
        SiteSetting::create([
            'name'=>'Adres',
            'data'=>'Türkiye , Gaziantep'

        ]);
        SiteSetting::create([
            'name'=>'E-Mail',
            'data'=>'pratikshop@gmail.com'

        ]);
        SiteSetting::create([
            'name'=>'Harita',
            'data'=>null,

        ]);
        SiteSetting::create([
            'name'=>'Copyright',
            'data'=>'Pratik Shop 2024 - Tüm haklar saklıdır.',

        ]);

    }
}
