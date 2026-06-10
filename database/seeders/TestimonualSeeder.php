<?php

namespace Database\Seeders;
use App\Models\StudentTestimonial;
use Illuminate\Database\Seeder;

class TestimonualSeeder extends Seeder
{
    public function run()
    {
        $videos = [
            'nJeG0BtQZzQ',
            '1ed3ldaubbk',
            'Ba5lwUePeos',
            'p73HmjfpPq4',
            'V1RVbkXsR_8',
        ];

        $courseId = 1;

        foreach ($videos as $video) {
            StudentTestimonial::create([
                'course_id' => $courseId,
                'video' => $video,
            ]);
        }
    }
}
