<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BonusCourse;

class BonousSeeder extends Seeder
{

    public function run()
    {
        BonusCourse::create([
            'course_id' => 1,
            'title' => '২০০০ টাকা মূল্যের ‘THE PROJECT 30K’ (৩০,০০০+ ভিডিও) বান্ডিলটি আজ কোর্সের সাথে পাচ্ছেন একদম ফ্রি!',
            'description' => null,
            'price' => 2000,
            'discount_price' => null,
            'status' => 1,
        ]);
    }
}
