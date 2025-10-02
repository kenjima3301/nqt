@extends ('client.layouts.master')
@section('title', 'Tin tức - Công ty Cổ phần Ngọc Quyết Thắng')
@section('content')

<!-- Hero Section -->
<section class="bg-gradient-to-r from-blue-600 to-blue-700 py-16">
    <div class="container mx-auto px-4">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">
                @if(isset($category))
                    {{ $category->name_show() }}
                @else
                    Tin tức
                @endif
            </h1>
            <p class="text-xl text-blue-100 max-w-2xl mx-auto">
                @if(isset($category))
                    {{ $category->description_show() }}
                @else
                    Cập nhật những tin tức mới nhất về lốp xe và ngành công nghiệp ô tô
                @endif
            </p>
        </div>
        
        <!-- Breadcrumb -->
        <nav class="mt-8 text-center">
            <ol class="inline-flex items-center space-x-2 text-blue-100">
                <li><a href="{{ route('index') }}" class="hover:text-white">Trang chủ</a></li>
                <li><i class="fas fa-chevron-right text-xs"></i></li>
                @if(isset($category))
                    <li><a href="{{ route('news-list') }}" class="hover:text-white">Tin tức</a></li>
                    <li><i class="fas fa-chevron-right text-xs"></i></li>
                    <li class="text-white">{{ $category->name_show() }}</li>
                @else
                    <li class="text-white">Tin tức</li>
                @endif
            </ol>
        </nav>
    </div>
</section>

<!-- Main Content -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap -mx-4">
            <!-- Main Content -->
            <div class="w-full lg:w-2/3 px-4">
                @if($posts->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        @foreach($posts as $post)
                        <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                            <div class="h-48 bg-gray-200 overflow-hidden">
                                @if($post->image)
                                    <img src="{{ asset($post->image) }}" alt="{{ $post->title_show() }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                                        <i class="fas fa-newspaper text-4xl text-white"></i>
                                    </div>
                                @endif
                            </div>
                            
                            <div class="p-6">
                                @if($post->category)
                                    <div class="mb-2">
                                        <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">
                                            {{ $post->category->name_show() }}
                                        </span>
                                    </div>
                                @endif
                                
                                <h2 class="text-xl font-semibold mb-3 text-gray-800 hover:text-blue-600">
                                    <a href="{{ route('posts', $post->slug) }}">{{ $post->title_show() }}</a>
                                </h2>
                                
                                <div class="flex items-center text-sm text-gray-500 mb-3">
                                    <i class="fas fa-calendar mr-2"></i>
                                    <span>{{ $post->created_at->format('d/m/Y') }}</span>
                                </div>
                                
                                <p class="text-gray-600 mb-4 line-clamp-3">
                                    {{ Str::limit(strip_tags($post->content_show()), 150) }}
                                </p>
                                
                                <a href="{{ route('posts', $post->slug) }}" class="text-blue-600 hover:text-blue-700 font-medium">
                                    Đọc thêm <i class="fas fa-arrow-right ml-1"></i>
                                </a>
                            </div>
                        </article>
                        @endforeach
                    </div>
                    
                    <!-- Pagination -->
                    <div class="mt-12">
                        {{ $posts->links() }}
                    </div>
                @else
                    <div class="text-center py-12">
                        <i class="fas fa-newspaper text-6xl text-gray-300 mb-4"></i>
                        <h3 class="text-xl font-semibold text-gray-600 mb-2">Chưa có bài viết nào</h3>
                        <p class="text-gray-500">
                            @if(isset($category))
                                Chưa có bài viết nào trong danh mục này.
                            @else
                                Hiện tại chưa có bài viết nào được đăng tải.
                            @endif
                        </p>
                    </div>
                @endif
            </div>
            
            <!-- Sidebar -->
            <div class="w-full lg:w-1/3 px-4 mt-8 lg:mt-0">
                <!-- Categories -->
                @if($categories->count() > 0)
                <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                    <h3 class="text-xl font-semibold mb-4 text-gray-800">Danh mục tin tức</h3>
                    <ul class="space-y-2">
                        <li>
                            <a href="{{ route('news-list') }}" class="flex items-center justify-between py-2 px-3 rounded hover:bg-gray-100 {{ !isset($category) ? 'bg-blue-50 text-blue-600' : 'text-gray-700' }}">
                                <span>Tất cả tin tức</span>
                                <span class="text-sm text-gray-500">{{ \App\Models\Posts::where('status', 'published')->count() }}</span>
                            </a>
                        </li>
                        @foreach($categories as $cat)
                        <li>
                            <a href="{{ route('news-category', $cat->slug) }}" class="flex items-center justify-between py-2 px-3 rounded hover:bg-gray-100 {{ isset($category) && $category->id == $cat->id ? 'bg-blue-50 text-blue-600' : 'text-gray-700' }}">
                                <span>{{ $cat->name_show() }}</span>
                                <span class="text-sm text-gray-500">{{ $cat->posts()->where('status', 'published')->count() }}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif
                
                <!-- Recent Posts -->
                @php
                    $recentPosts = \App\Models\Posts::where('status', 'published')
                                                   ->orderBy('created_at', 'desc')
                                                   ->limit(5)
                                                   ->get();
                @endphp
                
                @if($recentPosts->count() > 0)
                <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                    <h3 class="text-xl font-semibold mb-4 text-gray-800">Bài viết mới nhất</h3>
                    <div class="space-y-4">
                        @foreach($recentPosts as $recentPost)
                        <div class="flex space-x-3">
                            <div class="w-16 h-16 bg-gray-200 rounded overflow-hidden flex-shrink-0">
                                @if($recentPost->image)
                                    <img src="{{ asset($recentPost->image) }}" alt="{{ $recentPost->title_show() }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-gray-300 to-gray-400 flex items-center justify-center">
                                        <i class="fas fa-newspaper text-gray-600"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="flex-1">
                                <h4 class="text-sm font-medium text-gray-800 hover:text-blue-600 line-clamp-2">
                                    <a href="{{ route('posts', $recentPost->slug) }}">{{ $recentPost->title_show() }}</a>
                                </h4>
                                <p class="text-xs text-gray-500 mt-1">{{ $recentPost->created_at->format('d/m/Y') }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
                
                <!-- Contact Widget -->
                <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-lg p-6 text-white">
                    <h3 class="text-xl font-semibold mb-4">Liên hệ tư vấn</h3>
                    <p class="mb-4 text-green-100">Cần tư vấn về lốp xe? Hãy liên hệ với chúng tôi!</p>
                    <div class="space-y-2 mb-4">
                        <div class="flex items-center">
                            <i class="fas fa-phone mr-2"></i>
                            <span>093 454 1313</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-envelope mr-2"></i>
                            <span>nqt3999@gmail.com</span>
                        </div>
                    </div>
                    <a href="{{ route('contactus') }}" class="bg-white text-green-600 px-4 py-2 rounded font-medium hover:bg-gray-100 transition-colors duration-200 inline-block">
                        Liên hệ ngay
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>

@endsection
