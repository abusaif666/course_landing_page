<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run()
    {
        Course::create([
            'title' => 'YouTube Monetization and CPM Course',
            'description' => 'আমাদের কোর্সে বাংলাদেশ থেকে ইউএস মার্কেট টার্গেট করে AI ব্যবহার করে ইংলিশ কনটেন্ট এর মাধ্যমে চ্যানেল মনিটাইজ এবং হাই RPM (Revenue Per Mille) তোলার সম্পূর্ণ গাইডলাইন স্টেপ বাই স্টেপ দেওয়া হবে।',
            'thumbnail' => 'default.png',
            'video' => 'yb5ps_gkVlM',
            'price' => 1600,
            'discount_price' => 1500,
            'type' => 1,
            'status' => 1,
        ]);
    }
}
