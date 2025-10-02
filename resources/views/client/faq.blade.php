@extends ('client.layouts.master')
@section('title', 'Hỏi & Đáp - Công ty Cổ phần Ngọc Quyết Thắng')
@section('content')

<!-- Hero Section -->
<section class="bg-gradient-to-r from-purple-600 to-purple-700 py-16">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Hỏi & Đáp</h1>
        <p class="text-xl text-purple-100 max-w-2xl mx-auto">
            Tìm câu trả lời cho những câu hỏi thường gặp về lốp xe và dịch vụ của chúng tôi
        </p>
    </div>
</section>

<!-- FAQ Content -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <!-- Search Box -->
            <div class="mb-12 text-center">
                <div class="relative max-w-md mx-auto">
                    <input type="text" id="faqSearch" placeholder="Tìm kiếm câu hỏi..." 
                           class="w-full px-4 py-3 pl-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                    <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                </div>
            </div>

            <!-- FAQ Categories -->
            <div class="mb-8">
                <div class="flex flex-wrap justify-center gap-4">
                    <button class="faq-category-btn active px-6 py-2 rounded-full bg-purple-600 text-white hover:bg-purple-700 transition-colors" data-category="all">
                        Tất cả
                    </button>
                    <button class="faq-category-btn px-6 py-2 rounded-full bg-gray-200 text-gray-700 hover:bg-purple-600 hover:text-white transition-colors" data-category="product">
                        Sản phẩm
                    </button>
                    <button class="faq-category-btn px-6 py-2 rounded-full bg-gray-200 text-gray-700 hover:bg-purple-600 hover:text-white transition-colors" data-category="service">
                        Dịch vụ
                    </button>
                    <button class="faq-category-btn px-6 py-2 rounded-full bg-gray-200 text-gray-700 hover:bg-purple-600 hover:text-white transition-colors" data-category="warranty">
                        Bảo hành
                    </button>
                    <button class="faq-category-btn px-6 py-2 rounded-full bg-gray-200 text-gray-700 hover:bg-purple-600 hover:text-white transition-colors" data-category="delivery">
                        Giao hàng
                    </button>
                </div>
            </div>

            <!-- FAQ Items -->
            <div class="space-y-4">
                <!-- Product FAQs -->
                <div class="faq-item bg-white rounded-lg shadow-md overflow-hidden" data-category="product">
                    <button class="faq-question w-full text-left px-6 py-4 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition-colors">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-gray-800">Làm thế nào để chọn lốp xe phù hợp với xe của tôi?</h3>
                            <i class="fas fa-chevron-down text-gray-500 transform transition-transform"></i>
                        </div>
                    </button>
                    <div class="faq-answer hidden px-6 pb-4">
                        <p class="text-gray-600">
                            Để chọn lốp xe phù hợp, bạn cần xem thông số lốp gốc trên thành xe hoặc trong sách hướng dẫn sử dụng. 
                            Thông số bao gồm chiều rộng, tỷ lệ thành, đường kính vành và chỉ số tải trọng. 
                            Ví dụ: 205/55R16 91V. Chúng tôi cũng có đội ngũ tư vấn chuyên nghiệp để hỗ trợ bạn chọn lựa.
                        </p>
                    </div>
                </div>

                <div class="faq-item bg-white rounded-lg shadow-md overflow-hidden" data-category="product">
                    <button class="faq-question w-full text-left px-6 py-4 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition-colors">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-gray-800">Sự khác biệt giữa lốp Trazano và Golden Crown là gì?</h3>
                            <i class="fas fa-chevron-down text-gray-500 transform transition-transform"></i>
                        </div>
                    </button>
                    <div class="faq-answer hidden px-6 pb-4">
                        <p class="text-gray-600">
                            Trazano là thương hiệu lốp xe cao cấp với công nghệ hiện đại, phù hợp cho xe du lịch và SUV. 
                            Golden Crown chuyên về lốp xe tải và xe thương mại với độ bền cao và khả năng chịu tải lớn. 
                            Cả hai đều đảm bảo chất lượng quốc tế và có bảo hành chính hãng.
                        </p>
                    </div>
                </div>

                <div class="faq-item bg-white rounded-lg shadow-md overflow-hidden" data-category="product">
                    <button class="faq-question w-full text-left px-6 py-4 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition-colors">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-gray-800">Khi nào tôi cần thay lốp xe?</h3>
                            <i class="fas fa-chevron-down text-gray-500 transform transition-transform"></i>
                        </div>
                    </button>
                    <div class="faq-answer hidden px-6 pb-4">
                        <p class="text-gray-600">
                            Bạn nên thay lốp khi: độ sâu rãnh gai < 1.6mm, lốp có vết nứt hoặc phồng rộp, 
                            mòn không đều, hoặc đã sử dụng quá 5-6 năm. Kiểm tra định kỳ hàng tháng để đảm bảo an toàn.
                        </p>
                    </div>
                </div>

                <!-- Service FAQs -->
                <div class="faq-item bg-white rounded-lg shadow-md overflow-hidden" data-category="service">
                    <button class="faq-question w-full text-left px-6 py-4 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition-colors">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-gray-800">Dịch vụ lắp đặt lốp có mất phí không?</h3>
                            <i class="fas fa-chevron-down text-gray-500 transform transition-transform"></i>
                        </div>
                    </button>
                    <div class="faq-answer hidden px-6 pb-4">
                        <p class="text-gray-600">
                            Khi mua lốp tại cửa hàng, chúng tôi miễn phí dịch vụ lắp đặt cơ bản. 
                            Các dịch vụ bổ sung như cân bằng lốp, thay van hơi sẽ có phí theo bảng giá niêm yết.
                        </p>
                    </div>
                </div>

                <div class="faq-item bg-white rounded-lg shadow-md overflow-hidden" data-category="service">
                    <button class="faq-question w-full text-left px-6 py-4 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition-colors">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-gray-800">Tôi có thể đặt lịch hẹn lắp lốp trước không?</h3>
                            <i class="fas fa-chevron-down text-gray-500 transform transition-transform"></i>
                        </div>
                    </button>
                    <div class="faq-answer hidden px-6 pb-4">
                        <p class="text-gray-600">
                            Có, bạn có thể gọi điện thoại 093 454 1313 để đặt lịch hẹn trước. 
                            Điều này giúp tiết kiệm thời gian chờ đợi và đảm bảo chúng tôi có đủ thời gian phục vụ bạn tốt nhất.
                        </p>
                    </div>
                </div>

                <!-- Warranty FAQs -->
                <div class="faq-item bg-white rounded-lg shadow-md overflow-hidden" data-category="warranty">
                    <button class="faq-question w-full text-left px-6 py-4 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition-colors">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-gray-800">Chính sách bảo hành lốp xe như thế nào?</h3>
                            <i class="fas fa-chevron-down text-gray-500 transform transition-transform"></i>
                        </div>
                    </button>
                    <div class="faq-answer hidden px-6 pb-4">
                        <p class="text-gray-600">
                            Tất cả lốp xe đều được bảo hành chính hãng theo tiêu chuẩn nhà sản xuất. 
                            Thời gian bảo hành từ 12-24 tháng tùy theo từng dòng sản phẩm. 
                            Bảo hành bao gồm lỗi kỹ thuật, không bao gồm hao mòn tự nhiên và hư hỏng do va đập.
                        </p>
                    </div>
                </div>

                <div class="faq-item bg-white rounded-lg shadow-md overflow-hidden" data-category="warranty">
                    <button class="faq-question w-full text-left px-6 py-4 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition-colors">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-gray-800">Làm thế nào để bảo hành lốp xe?</h3>
                            <i class="fas fa-chevron-down text-gray-500 transform transition-transform"></i>
                        </div>
                    </button>
                    <div class="faq-answer hidden px-6 pb-4">
                        <p class="text-gray-600">
                            Khi cần bảo hành, bạn mang lốp và hóa đơn mua hàng đến cửa hàng. 
                            Chúng tôi sẽ kiểm tra và xử lý theo quy định bảo hành của nhà sản xuất. 
                            Thời gian xử lý thường từ 3-7 ngày làm việc.
                        </p>
                    </div>
                </div>

                <!-- Delivery FAQs -->
                <div class="faq-item bg-white rounded-lg shadow-md overflow-hidden" data-category="delivery">
                    <button class="faq-question w-full text-left px-6 py-4 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition-colors">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-gray-800">Khu vực nào được giao hàng tận nơi?</h3>
                            <i class="fas fa-chevron-down text-gray-500 transform transition-transform"></i>
                        </div>
                    </button>
                    <div class="faq-answer hidden px-6 pb-4">
                        <p class="text-gray-600">
                            Chúng tôi giao hàng tận nơi trong khu vực nội thành Hà Nội và một số tỉnh lân cận. 
                            Phí giao hàng tùy theo khoảng cách và số lượng sản phẩm. 
                            Liên hệ 093 454 1313 để biết chi tiết về phí giao hàng đến địa chỉ của bạn.
                        </p>
                    </div>
                </div>

                <div class="faq-item bg-white rounded-lg shadow-md overflow-hidden" data-category="delivery">
                    <button class="faq-question w-full text-left px-6 py-4 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition-colors">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-gray-800">Thời gian giao hàng là bao lâu?</h3>
                            <i class="fas fa-chevron-down text-gray-500 transform transition-transform"></i>
                        </div>
                    </button>
                    <div class="faq-answer hidden px-6 pb-4">
                        <p class="text-gray-600">
                            Đối với hàng có sẵn: giao trong ngày hoặc ngày hôm sau tùy theo thời gian đặt hàng. 
                            Đối với hàng đặt trước: 2-5 ngày làm việc. 
                            Chúng tôi sẽ thông báo thời gian giao hàng cụ thể khi xác nhận đơn hàng.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Contact Section -->
            <div class="mt-16 text-center">
                <div class="bg-purple-50 rounded-lg p-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">Không tìm thấy câu trả lời?</h2>
                    <p class="text-gray-600 mb-6">Liên hệ trực tiếp với chúng tôi để được hỗ trợ tốt nhất</p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="tel:0934541313" class="bg-purple-600 text-white px-6 py-3 rounded-lg hover:bg-purple-700 transition-colors inline-flex items-center justify-center">
                            <i class="fas fa-phone mr-2"></i>
                            Gọi ngay: 093 454 1313
                        </a>
                        <a href="{{ route('contactus') }}" class="bg-white text-purple-600 border border-purple-600 px-6 py-3 rounded-lg hover:bg-purple-50 transition-colors inline-flex items-center justify-center">
                            <i class="fas fa-envelope mr-2"></i>
                            Gửi tin nhắn
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // FAQ Toggle functionality
    const faqQuestions = document.querySelectorAll('.faq-question');
    faqQuestions.forEach(question => {
        question.addEventListener('click', function() {
            const answer = this.nextElementSibling;
            const icon = this.querySelector('i');
            
            // Close other open FAQs
            faqQuestions.forEach(otherQuestion => {
                if (otherQuestion !== this) {
                    const otherAnswer = otherQuestion.nextElementSibling;
                    const otherIcon = otherQuestion.querySelector('i');
                    otherAnswer.classList.add('hidden');
                    otherIcon.classList.remove('rotate-180');
                }
            });
            
            // Toggle current FAQ
            answer.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        });
    });

    // Category filter functionality
    const categoryBtns = document.querySelectorAll('.faq-category-btn');
    const faqItems = document.querySelectorAll('.faq-item');

    categoryBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const category = this.dataset.category;
            
            // Update active button
            categoryBtns.forEach(b => {
                b.classList.remove('active', 'bg-purple-600', 'text-white');
                b.classList.add('bg-gray-200', 'text-gray-700');
            });
            this.classList.add('active', 'bg-purple-600', 'text-white');
            this.classList.remove('bg-gray-200', 'text-gray-700');
            
            // Filter FAQ items
            faqItems.forEach(item => {
                if (category === 'all' || item.dataset.category === category) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });

    // Search functionality
    const searchInput = document.getElementById('faqSearch');
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        
        faqItems.forEach(item => {
            const question = item.querySelector('.faq-question h3').textContent.toLowerCase();
            const answer = item.querySelector('.faq-answer p').textContent.toLowerCase();
            
            if (question.includes(searchTerm) || answer.includes(searchTerm)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    });
});
</script>

@endsection
