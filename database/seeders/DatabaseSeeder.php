<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call([
            UserSeeder::class,
            CourseSeeder::class,
            GeneralSettingSeeder::class,
            SmtpSeeder::class,
            BenefitSeeder::class,
            OutlineSeeder::class,
            FaqSeeder::class,
            TestimonualSeeder::class,
        ]);
    }
}
