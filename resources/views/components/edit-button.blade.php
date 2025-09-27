@props([
    'url' => '#',
    'title' => 'Chỉnh sửa',
    'size' => 'sm',
    'color' => 'primary',
    'icon' => 'fas fa-edit',
    'text' => 'Sửa'
])

<a href="{{ $url }}" 
   class="btn btn-{{ $size }} btn-outline-{{ $color }} edit-btn" 
   title="{{ $title }}"
   {{ $attributes }}>
    <i class="{{ $icon }} me-1"></i>{{ $text }}
</a>

@once
@push('css')
<style>
.edit-btn {
    transition: all 0.3s ease;
    border-radius: 6px;
    font-weight: 500;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.edit-btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.15);
}

.edit-btn:active {
    transform: translateY(0);
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}
</style>
@endpush
@endonce

