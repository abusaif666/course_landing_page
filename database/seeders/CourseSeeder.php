<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run()
    {
        Course::create([
            'title' => 'USA YouTube Shorts Masterclass ! কোর্সটির কাজ চলমান দয়া করে কেউ এডমিশন নিবেন না',
            'description' => 'বর্তমান সময়ে ইউটিউব শর্টস হলো অর্গানিক রিচ ও দ্রুত আয়ের সেরা মাধ্যম। এই কোর্সে শেখানো হবে কিভাবে বাংলাদেশ থেকে সঠিক নিয়মে USA মার্কেট টার্গেট করে প্রফেশনাল মানের শর্টস চ্যানেল তৈরি করবেন। কপিরাইট বা জটিলতা ছাড়াই স্মার্ট অটোমেশন ব্যবহার করে সাস্টেইনেবল প্যাসিভ ইনকাম তৈরির প্রমাণিত স্টেপ-বাই-স্টেপ গাইড।',
            'thumbnail' => '1778279800_copy_91C5F371-40F3-4917-8B17-9D767D02DCF7.webp',
            'video' => 'yb5ps_gkVlM',
            'price' => 2999,
            'discount_price' => 1250,
            'type' => 1,
            'status' => 1,
            'offer_start' => null,
            'offer_end' => null,
            'total_seat' => 120,
            'whatsapp' => 'www.whatsapp.com',
            'drive' => 'www.google.drive.com',
        ]);
    }
}
