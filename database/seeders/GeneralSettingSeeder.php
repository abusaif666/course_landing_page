<?php

namespace Database\Seeders;

use App\Models\GeneralSetting;
use Illuminate\Database\Seeder;

class GeneralSettingSeeder extends Seeder
{
    public function run()
    {
        GeneralSetting::create(
            [
                'site_name' => 'Adminify',
                'site_title' => 'Adminify',
            ]
        );
    }
}
