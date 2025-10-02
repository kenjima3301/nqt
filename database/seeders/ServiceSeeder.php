<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Service::create([
            'title' => 'Bán lốp xe chính hãng',
            'title_en' => 'Genuine Tire Sales',
            'description' => 'Cung cấp các loại lốp xe chính hãng từ các thương hiệu uy tín',
            'description_en' => 'Providing genuine tires from reputable brands',
            'content' => '<p>Chúng tôi chuyên cung cấp các loại lốp xe chính hãng từ các thương hiệu uy tín như Trazano, Golden Crown với chất lượng đảm bảo và giá cả cạnh tranh nhất thị trường.</p><p>Tất cả sản phẩm đều có tem chống hàng giả và được bảo hành chính hãng theo tiêu chuẩn của nhà sản xuất.</p>',
            'content_en' => '<p>We specialize in providing genuine tires from reputable brands like Trazano, Golden Crown with guaranteed quality and the most competitive prices in the market.</p><p>All products have anti-counterfeit stamps and are covered by genuine warranty according to manufacturer standards.</p>',
            'icon' => 'fas fa-tire',
            'status' => 'active',
            'order' => 1
        ]);

        \App\Models\Service::create([
            'title' => 'Lắp đặt và thay lốp',
            'title_en' => 'Tire Installation & Replacement',
            'description' => 'Dịch vụ lắp đặt và thay lốp xe chuyên nghiệp',
            'description_en' => 'Professional tire installation and replacement service',
            'content' => '<p>Đội ngũ kỹ thuật viên có kinh nghiệm sẽ thực hiện việc lắp đặt và thay lốp xe một cách chuyên nghiệp, đảm bảo an toàn và chất lượng cao nhất.</p><p>Chúng tôi sử dụng các thiết bị hiện đại và tuân thủ quy trình kỹ thuật nghiêm ngặt.</p>',
            'content_en' => '<p>Our experienced technicians will perform tire installation and replacement professionally, ensuring the highest safety and quality.</p><p>We use modern equipment and follow strict technical procedures.</p>',
            'icon' => 'fas fa-tools',
            'status' => 'active',
            'order' => 2
        ]);

        \App\Models\Service::create([
            'title' => 'Cân bằng lốp xe',
            'title_en' => 'Tire Balancing',
            'description' => 'Dịch vụ cân bằng lốp xe giúp xe chạy êm ái',
            'description_en' => 'Tire balancing service for smooth driving',
            'content' => '<p>Cân bằng lốp xe là dịch vụ quan trọng giúp xe chạy êm ái, giảm rung động và tăng tuổi thọ của lốp xe.</p><p>Chúng tôi sử dụng máy cân bằng lốp hiện đại, chính xác cao để đảm bảo chất lượng dịch vụ tốt nhất.</p>',
            'content_en' => '<p>Tire balancing is an important service that helps vehicles run smoothly, reduces vibration and increases tire life.</p><p>We use modern, high-precision tire balancing machines to ensure the best service quality.</p>',
            'icon' => 'fas fa-balance-scale',
            'status' => 'active',
            'order' => 3
        ]);

        \App\Models\Service::create([
            'title' => 'Giao hàng tận nơi',
            'title_en' => 'Home Delivery',
            'description' => 'Dịch vụ giao hàng nhanh chóng trong khu vực',
            'description_en' => 'Fast delivery service in the area',
            'content' => '<p>Chúng tôi cung cấp dịch vụ giao hàng tận nơi nhanh chóng trong khu vực Hà Nội và các tỉnh lân cận.</p><p>Đội ngũ giao hàng chuyên nghiệp sẽ đảm bảo sản phẩm được vận chuyển an toàn và đúng thời gian cam kết.</p>',
            'content_en' => '<p>We provide fast home delivery service in Hanoi and neighboring provinces.</p><p>Our professional delivery team ensures products are transported safely and on time as committed.</p>',
            'icon' => 'fas fa-shipping-fast',
            'status' => 'active',
            'order' => 4
        ]);
    }
}
