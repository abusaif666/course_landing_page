<?php

namespace Database\Seeders;

use App\Models\Outline;
use Illuminate\Database\Seeder;

class OutlineSeeder extends Seeder
{
    public function run()
    {
        $outlines = [
            'Professional USA Channel Setup & Branding',
            'Viral Topic & Winning Niche Selection',
            'Advanced Viral Scripting & Hook Engineering',
            'High-Retention Shorts Editing Masterclass',
            'Copyright Management & Fair Use Secrets',
            'Monetize Shorts - Ads, Affiliate & Other Income',
            'Smart Automation & Bulk Production System',
            'FINAL MASTERCLASS: Income Roadmap & Endless Opertunity',
        ];

        $courseId = 1;

        foreach ($outlines as $outline) {
            Outline::create([
                'course_id' => $courseId,
                'outline' => $outline,
            ]);
        }
    }
}
