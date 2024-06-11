<?php
return [
    'module' => [
        [
            'title' => 'QL Thành Viên',
            'icon' => 'fa fa-user',
            'name' => 'user',
            'subModule' => [
                [
                    'title' => 'QL Thành Viên',
                    'route' => 'user.index'
                ],
                [
                    'title' => 'QL Nhóm Thành Viên',
                    'route' => 'user.catalogue.index'
                ]
            ]
        ],
        [
            'title' => 'QL Bài Viết',
            'icon' => 'fa fa-file',
            'name' => 'post',
            'subModule' => [
                [
                    'title' => 'QL Bài Viết',
                    'route' => 'post.catalogue.index'
                ],
                [
                    'title' => 'QL Nhóm Bài Viết',
                    'route' => 'post.catalogue.index'
                ]
            ]
        ],
        [
            'title' => 'Cấu hình chung',
            'icon' => 'fa fa-cog',
            'name' => 'post',
            'subModule' => [
                [
                    'title' => 'QL Ngôn Ngữ',
                    'route' => 'language.index'
                ]
            ]
        ]
    ]
];
