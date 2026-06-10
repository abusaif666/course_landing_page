<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Benefits;
use Illuminate\Database\Seeder;

class BenefitSeeder extends Seeder
{

    public function run()
    {

        $benefits = [
            'কম সময়, দ্রুত গ্রোথ অল্প সময় দিয়ে নিয়মিত শর্টস আপলোডের মাধ্যমে খুব দ্রুত চ্যানেল গ্রো করার সুযোগ।',
            'বাংলাদেশ থেকে বসে USA টার্গেট করে তুলনামূলক বেশি আয়ের জন্য প্রয়োজনীয় সেটআপ ও স্ট্র্যাটেজি শিখবেন।',
            'ভিউ পাওয়ার সম্ভাবনা বেশি প্রুভড শর্টস স্ট্রাকচার ও প্রেজেন্টেশন ব্যবহার করে ভিডিও রিচ পাওয়ার সুযোগ বাড়ে।',
            'Job বা Business-এর পাশাপাশি নিজের সময় অনুযায়ী কাজ করে ধীরে ধীরে একটি স্টেবল প্যাসিভ ইনকাম সোর্স গড়ে তোলার সুযোগ।',
            'ফেসলেস কন্টেন্ট ক্রিয়েশন নিজের চেহারা বা ভয়েস না দিয়েই এআই (AI) টুলস ব্যবহার করে প্রফেশনাল মানের ভিডিও তৈরির পূর্ণাঙ্গ গাইডলাইন।',
            'দীর্ঘমেয়াদি পরিকল্পনা আমরা শুধু হঠাৎ ভাইরাল হওয়ার স্বপ্ন দেখাবো না, বরং চ্যানেলকে ভবিষ্যতের স্থায়ী আয়ের উৎস হিসেবে গড়ে তোলার পথ দেখাবো।'
        ];

        $courseId = 1;

        foreach($benefits as $benefit){
                Benefits::create([
                    'course_id' => $courseId,
                    'benefit' => $benefit,
                ]);
        }


    }
}
