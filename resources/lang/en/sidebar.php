<?php
return [
    'module' => [
        [
            'title' => 'Article',
            'icon' => 'fa fa-users',
            'name' => ['post'],
            'subModule' => [
                [
                    'title' => 'Article Group',
                    'route' => 'post.catalogue.index'
                ],
                [
                    'title' => 'Article',
                    'route' => 'post.index'
                ]
            ]
        ],
        [
            'title' => 'Post',
            'icon' => 'fa fa-file',
            'name' => 'post',
            'subModule' => [
                [
                    'title' => 'Post',
                    'route' => 'post.index'
                ],
                [
                    'title' => 'Post Group',
                    'route' => 'post.catalogue.index'
                ]
            ]
        ],
        [
            'title' => 'General',
            'icon' => 'fa fa-cog',
            'name' => ['language'],
            'subModule' => [
                [
                    'title' => 'Language',
                    'route' => 'language.index'
                ],
            ]
        ]
    ],
];
