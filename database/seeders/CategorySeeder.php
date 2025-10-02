<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Category::create([
            'name' => 'Tin tức công nghệ',
            'name_en' => 'Technology News',
            'slug' => 'tin-tuc-cong-nghe',
            'description' => 'Những tin tức mới nhất về công nghệ lốp xe và ô tô',
            'description_en' => 'Latest news about tire and automotive technology',
            'status' => 'active',
            'order' => 1
        ]);

        \App\Models\Category::create([
            'name' => 'Hướng dẫn sử dụng',
            'name_en' => 'User Guide',
            'slug' => 'huong-dan-su-dung',
            'description' => 'Hướng dẫn sử dụng và bảo dưỡng lốp xe',
            'description_en' => 'Guide to tire usage and maintenance',
            'status' => 'active',
            'order' => 2
        ]);

        \App\Models\Category::create([
            'name' => 'Khuyến mãi',
            'name_en' => 'Promotions',
            'slug' => 'khuyen-mai',
            'description' => 'Thông tin về các chương trình khuyến mãi',
            'description_en' => 'Information about promotional programs',
            'status' => 'active',
            'order' => 3
        ]);

        \App\Models\Category::create([
            'name' => 'Tin tức ngành',
            'name_en' => 'Industry News',
            'slug' => 'tin-tuc-nganh',
            'description' => 'Tin tức về ngành công nghiệp lốp xe và ô tô',
            'description_en' => 'News about tire and automotive industry',
            'status' => 'active',
            'order' => 4
        ]);
    }
}
