@extends ('client.layouts.master')
@section('title', 'Dịch vụ - Công ty Cổ phần Ngọc Quyết Thắng')
@section('content')

<!-- Hero Section -->
<section class="bg-gradient-to-r from-green-600 to-green-700 py-16">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Dịch vụ của chúng tôi</h1>
        <p class="text-xl text-green-100 max-w-2xl mx-auto">
            Chúng tôi cung cấp các dịch vụ chuyên nghiệp về lốp xe với chất lượng cao và giá cả hợp lý
        </p>
    </div>
</section>

<!-- Services Grid -->
<section class="py-16">
    <div class="container mx-auto px-4">
        @if($services->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($services as $service)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    @if($service->image)
                        <div class="h-48 bg-cover bg-center" style="background-image: url('{{ asset($service->image) }}')"></div>
                    @else
                        <div class="h-48 bg-gradient-to-br from-green-400 to-green-600 flex items-center justify-center">
                            @if($service->icon)
                                <i class="{{ $service->icon }} text-4xl text-white"></i>
                            @else
                                <i class="fas fa-cogs text-4xl text-white"></i>
                            @endif
                        </div>
                    @endif
                    
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-3 text-gray-800">{{ $service->title_show() }}</h3>
                        <p class="text-gray-600 mb-4">{{ $service->description_show() }}</p>
                        
                        @if($service->content_show())
                            <button class="text-green-600 hover:text-green-700 font-medium" onclick="openServiceModal({{ $service->id }})">
                                Xem chi tiết <i class="fas fa-arrow-right ml-1"></i>
                            </button>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <!-- Default Services when no data -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <div class="h-48 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                        <i class="fas fa-tire text-4xl text-white"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-3 text-gray-800">Bán lốp xe chính hãng</h3>
                        <p class="text-gray-600 mb-4">Cung cấp các loại lốp xe chính hãng từ các thương hiệu uy tín như Trazano, Golden Crown với giá cả cạnh tranh.</p>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <div class="h-48 bg-gradient-to-br from-green-400 to-green-600 flex items-center justify-center">
                        <i class="fas fa-tools text-4xl text-white"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-3 text-gray-800">Lắp đặt và thay lốp</h3>
                        <p class="text-gray-600 mb-4">Dịch vụ lắp đặt và thay lốp xe chuyên nghiệp với đội ngũ kỹ thuật viên có kinh nghiệm.</p>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <div class="h-48 bg-gradient-to-br from-orange-400 to-orange-600 flex items-center justify-center">
                        <i class="fas fa-balance-scale text-4xl text-white"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-3 text-gray-800">Cân bằng lốp xe</h3>
                        <p class="text-gray-600 mb-4">Dịch vụ cân bằng lốp xe giúp xe chạy êm ái và tăng tuổi thọ của lốp xe.</p>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <div class="h-48 bg-gradient-to-br from-purple-400 to-purple-600 flex items-center justify-center">
                        <i class="fas fa-shipping-fast text-4xl text-white"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-3 text-gray-800">Giao hàng tận nơi</h3>
                        <p class="text-gray-600 mb-4">Dịch vụ giao hàng tận nơi nhanh chóng trong khu vực Hà Nội và các tỉnh lân cận.</p>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <div class="h-48 bg-gradient-to-br from-red-400 to-red-600 flex items-center justify-center">
                        <i class="fas fa-phone-alt text-4xl text-white"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-3 text-gray-800">Tư vấn chuyên nghiệp</h3>
                        <p class="text-gray-600 mb-4">Đội ngũ chuyên gia tư vấn giúp bạn chọn lựa loại lốp phù hợp nhất với nhu cầu sử dụng.</p>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <div class="h-48 bg-gradient-to-br from-indigo-400 to-indigo-600 flex items-center justify-center">
                        <i class="fas fa-shield-alt text-4xl text-white"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-3 text-gray-800">Bảo hành chính hãng</h3>
                        <p class="text-gray-600 mb-4">Tất cả sản phẩm đều được bảo hành chính hãng theo tiêu chuẩn của nhà sản xuất.</p>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>

<!-- Contact Section -->
<section class="bg-gray-100 py-16">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-8 text-gray-800">Liên hệ với chúng tôi</h2>
        <p class="text-lg text-gray-600 mb-8 max-w-2xl mx-auto">
            Để được tư vấn và hỗ trợ tốt nhất, hãy liên hệ với chúng tôi qua các kênh sau:
        </p>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto">
            <div class="text-center">
                <div class="bg-green-600 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-phone text-white text-xl"></i>
                </div>
                <h3 class="font-semibold mb-2">Hotline</h3>
                <p class="text-green-600 font-medium">093 454 1313</p>
            </div>
            
            <div class="text-center">
                <div class="bg-green-600 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-envelope text-white text-xl"></i>
                </div>
                <h3 class="font-semibold mb-2">Email</h3>
                <p class="text-green-600 font-medium">nqt3999@gmail.com</p>
            </div>
            
            <div class="text-center">
                <div class="bg-green-600 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-map-marker-alt text-white text-xl"></i>
                </div>
                <h3 class="font-semibold mb-2">Địa chỉ</h3>
                <p class="text-gray-600">Phường Dĩ An, Thành phố Hồ Chí Minh</p>
            </div>
        </div>
        
        <div class="mt-8">
            <a href="{{ route('contactus') }}" class="bg-green-600 text-white px-8 py-3 rounded-lg hover:bg-green-700 transition-colors duration-200 inline-block">
                Liên hệ ngay
            </a>
        </div>
    </div>
</section>

<!-- Service Detail Modal -->
@if($services->count() > 0)
<div id="serviceModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-lg max-w-2xl w-full max-h-[80vh] overflow-y-auto">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 id="modalTitle" class="text-2xl font-bold text-gray-800"></h3>
                    <button onclick="closeServiceModal()" class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                <div id="modalContent" class="prose max-w-none"></div>
            </div>
        </div>
    </div>
</div>

<script>
const services = @json($services);

function openServiceModal(serviceId) {
    const service = services.find(s => s.id === serviceId);
    if (service) {
        document.getElementById('modalTitle').textContent = service.title{{ session()->get('language') == 'en' ? '_en' : '' }} || service.title;
        document.getElementById('modalContent').innerHTML = service.content{{ session()->get('language') == 'en' ? '_en' : '' }} || service.content;
        document.getElementById('serviceModal').classList.remove('hidden');
    }
}

function closeServiceModal() {
    document.getElementById('serviceModal').classList.add('hidden');
}

// Close modal when clicking outside
document.getElementById('serviceModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeServiceModal();
    }
});
</script>
@endif

@endsection