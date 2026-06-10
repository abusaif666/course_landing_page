<?php

namespace Database\Seeders;
use App\Models\Student_Result;
use Illuminate\Database\Seeder;

class ResultSeeder extends Seeder
{
    public function run()
    {
        $photos = [
            '1771151577_9F50AB96-E801-4472-9351-D5E028C35C0A.webp',
            '1771151994_12BA1FE9-F88F-4675-8A54-5D1D8A31737F.webp',
            '1771152137_23F01C88-EB68-4D87-8D33-BBAA28C3EB68.webp',
            '1771152380_IMG_8724.webp',
            '1771152834_IMG_2578.webp',
            '1771153342_IMG_2585.webp',
            '1771153411_IMG_1379.webp',
            '1771153464_F71718FB-A055-43BB-A969-2DBD3B40864E.webp',
            '1771153915_4617B659-F450-474B-99FF-E1089C878283.webp',
            '1771154996_IMG_2084.webp',
            '1771155035_IMG_2092.webp',
            '1771155117_IMG_6162.webp',
            '1771155194_IMG_9572.webp',
            '1771155989_IMG_9817.webp',
            '1771156116_IMG_1115.webp',
            '1771156403_IMG_2597.webp',
            '1771156649_2B30990A-E913-4053-87DC-2409957A1D42.webp',
            '1771156752_2B8D229B-6BCB-42A2-985C-AEE4FD54ACC0.webp',
            '1771156869_A81427AD-93EF-4A7A-B916-80EB9073088E.webp',
        ];

        $courseId = 1;

        foreach ($photos as $photo) {
            Student_Result::create([
                'course_id' => $courseId,
                'photo' => $photo,
            ]);
        }
    }
}
