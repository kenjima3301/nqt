<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 1.0
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */

return [
    'san-pham' => [
        'title_main' => "Sản phẩm",
        'website' => [
            'type' => [
                'index' => 'object',
                'detail' => 'article'
            ],
            'title' => "Sản phẩm"
        ],
        'id_categories' => true,
        'copy' => true,
        'tags' => true,
        'suggest' => false,
        'slug' => true,
        'status' => ["noibat" => "Nổi bật", "hienthi" => "Hiển thị"],
        'images' => [
            'photo' => [
                'title' => 'Ảnh đại diện',
                'width' => '600',
                'height' => '600',
                'thumb' => '100x100x1'
            ],
            // 'attachment' => [
            //     'title' => 'File đại diện',
            //     'width' => '400',
            //     'height' => '450',
            //     'thumb' => '200x200x1'
            // ],
            // 'video-attachment' => [
            //     'title' => 'Video đại diện',
            //     'width' => '400',
            //     'height' => '450',
            //     'thumb' => '200x200x1'
            // ]
        ],
        'show_images' => true,
        'gallery' => [
            'san-pham' => [
                "title_main_photo" => "Hình ảnh sản phẩm",
                "title_sub_photo" => "Hình ảnh",
                "status_photo" => ["hienthi" => "Hiển thị"],
                "number_photo" => 3,
                "images_photo" => true,
                "avatar_photo" => true,
                "name_photo" => true,
                "photo_width" => 600,
                "photo_height" => 600,
                "photo_thumb" => '100x100x1'
            ]
        ],
        'view' => true,
        'comment' => false,
        'properties' => false,
        // 'properties_json' => true,
        'code' => true,
        'regular_price' => true,
        'sale_price' => true,
        'discount' => true,
        'datePublish' => false,
        'name' => true,
        'desc' => true,
        'desc_cke' => true,
        'content' => true,
        'content_cke' => true,
        'parameter' => true,
        'parameter_cke' => false,
        'promotion' => false,
        'promotion_cke' => false,
        'incentives' => false,
        'incentives_cke' => false,
        'schema' => true,
        'seo' => true,
        'group' => false,
        // 'brand' => [
        //     'title_main_brand'=>'Hãng sản phẩm',
        //     'status_brand' => ["hienthi" => "Hiển thị"],
        //     'name_brand' => true,
        //     'slug_brand' => true,
        //     'seo_brand' => true
        // ],
        'company' => [
            'title_main_brand'=>'Hãng sản phẩm'
        ],
        'size' => [
            'title_main_brand'=>'Size sản phẩm'
        ],
        'code' => [
            'title_main_brand'=>'Mã sản phẩm'
        ],
        'type' => [
            'title_main_brand'=>'Loại sản phẩm'
        ],
        'categories' => [
            'list' => [
                'title_main_categories' => "Danh mục cấp 1",
                'images' => [
                    'photo' => [
                        'title' => 'Ảnh đại diện',
                        'width' => '300',
                        'height' => '300',
                        'thumb' => '300x300x1'
                    ]
                ],
                'copy_categories' => false,
                'show_images_categories' => false,
                'slug_categories' => true,
                'status_categories' => ["noibat" => "Nổi bật","hienthi" => "Hiển thị"],
                'gallery_categories' => [],
                'name_categories' => true,
                'desc_categories' => false,
                'desc_categories_cke' => false,
                'content_categories' => false,
                'content_categories_cke' => false,
                'seo_categories' => true,
            ],
            'cat' => [
                'title_main_categories' => "Danh mục cấp 2",
                'images' => [
                    'photo' => [
                        'title' => 'Ảnh đại diện',
                        'width' => '500',
                        'height' => '500',
                        'thumb' => '500x500x1'
                    ],
                    'icon' => [
                        'title' => 'Ảnh đại diện',
                        'width' => '25',
                        'height' => '25',
                        'thumb' => '25x25x1'
                    ]
                ],
                'copy_categories' => false,
                'show_images_categories' => false,
                'slug_categories' => true,
                'status_categories' => ["menu" => "Menu", "noibat" => "Nổi bật", "hienthi" => "Hiển thị"],
                'gallery_categories' => [],
                'name_categories' => true,
                'desc_categories' => true,
                'desc_categories_cke' => false,
                'content_categories' => false,
                'content_categories_cke' => false,
                'seo_categories' => true,
            ],
            // 'item' => [
            //     'title_main_categories' => "Danh mục cấp 3",
            //     'images' => [
            //         'photo' => [
            //             'title' => 'Ảnh đại diện',
            //             'width' => '500',
            //             'height' => '500',
            //             'thumb' => '500x500x1'
            //         ],
            //         'icon' => [
            //             'title' => 'Ảnh đại diện',
            //             'width' => '25',
            //             'height' => '25',
            //             'thumb' => '25x25x1'
            //         ]
            //     ],
            //     'copy_categories' => false,
            //     'show_images_categories' => false,
            //     'slug_categories' => true,
            //     'status_categories' => ["hienthi" => "Hiển thị"],
            //     'gallery_categories' => [],
            //     'name_categories' => true,
            //     'desc_categories' => true,
            //     'desc_categories_cke' => false,
            //     'content_categories' => false,
            //     'content_categories_cke' => false,
            //     'seo_categories' => true,
            // ]
        ]
    ]
];