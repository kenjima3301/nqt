<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ImageManagerController extends Controller
{
    /**
     * Hiển thị danh sách ảnh từ thư mục upload/product
     */
    public function index(Request $request)
    {
        $uploadPath = public_path('upload/product');
        $images = [];
        
        if (File::exists($uploadPath)) {
            $files = File::files($uploadPath);
            
            foreach ($files as $file) {
                $extension = strtolower($file->getExtension());
                if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                    $images[] = [
                        'name' => $file->getFilename(),
                        'path' => 'upload/product/' . $file->getFilename(),
                        'url' => asset('upload/product/' . $file->getFilename()),
                        'size' => $this->formatBytes($file->getSize()),
                        'modified' => date('d/m/Y H:i', $file->getMTime())
                    ];
                }
            }
            
            // Sắp xếp theo thời gian sửa đổi mới nhất
            usort($images, function($a, $b) {
                return strcmp($b['name'], $a['name']);
            });
        }
        
        // Phân trang
        $perPage = 20;
        $currentPage = $request->get('page', 1);
        $offset = ($currentPage - 1) * $perPage;
        $paginatedImages = array_slice($images, $offset, $perPage);
        
        $totalPages = ceil(count($images) / $perPage);
        
        return response()->json([
            'images' => $paginatedImages,
            'pagination' => [
                'current_page' => $currentPage,
                'total_pages' => $totalPages,
                'per_page' => $perPage,
                'total_images' => count($images)
            ]
        ]);
    }
    
    /**
     * Upload ảnh mới lên server
     */
    public function upload(Request $request)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);
        
        $uploadedImages = [];
        $uploadPath = public_path('upload/product');
        
        if (!File::exists($uploadPath)) {
            File::makeDirectory($uploadPath, 0755, true);
        }
        
        foreach ($request->file('images') as $image) {
            $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move($uploadPath, $filename);
            
            $uploadedImages[] = [
                'name' => $filename,
                'path' => 'upload/product/' . $filename,
                'url' => asset('upload/product/' . $filename),
                'size' => $this->formatBytes($image->getSize()),
                'modified' => date('d/m/Y H:i')
            ];
        }
        
        return response()->json([
            'success' => true,
            'message' => 'Upload thành công ' . count($uploadedImages) . ' ảnh',
            'images' => $uploadedImages
        ]);
    }
    
    /**
     * Xóa ảnh
     */
    public function delete(Request $request)
    {
        $filename = $request->get('filename');
        $filePath = public_path('upload/product/' . $filename);
        
        if (File::exists($filePath)) {
            File::delete($filePath);
            return response()->json([
                'success' => true,
                'message' => 'Xóa ảnh thành công'
            ]);
        }
        
        return response()->json([
            'success' => false,
            'message' => 'Không tìm thấy ảnh'
        ], 404);
    }
    
    /**
     * Tìm kiếm ảnh theo tên
     */
    public function search(Request $request)
    {
        $keyword = $request->get('keyword', '');
        $uploadPath = public_path('upload/product');
        $images = [];
        
        if (File::exists($uploadPath)) {
            $files = File::files($uploadPath);
            
            foreach ($files as $file) {
                $extension = strtolower($file->getExtension());
                if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                    $filename = $file->getFilename();
                    
                    // Tìm kiếm theo tên file
                    if (empty($keyword) || stripos($filename, $keyword) !== false) {
                        $images[] = [
                            'name' => $filename,
                            'path' => 'upload/product/' . $filename,
                            'url' => asset('upload/product/' . $filename),
                            'size' => $this->formatBytes($file->getSize()),
                            'modified' => date('d/m/Y H:i', $file->getMTime())
                        ];
                    }
                }
            }
            
            // Sắp xếp theo thời gian sửa đổi mới nhất
            usort($images, function($a, $b) {
                return strcmp($b['name'], $a['name']);
            });
        }
        
        return response()->json([
            'images' => $images,
            'total' => count($images)
        ]);
    }
    
    /**
     * Format bytes thành readable format
     */
    private function formatBytes($size, $precision = 2)
    {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');
        
        for ($i = 0; $size > 1024 && $i < count($units) - 1; $i++) {
            $size /= 1024;
        }
        
        return round($size, $precision) . ' ' . $units[$i];
    }
}
