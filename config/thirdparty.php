<?php

return [
    'all' => [
        'blogger' => [
            'name' => 'Google Blogger',
            'default' => true,
            'feed' => '/feeds/posts/default?alt=rss'
        ],
        'medium' => [
            'name' => 'Medium.com',
            'default' => false,
            'feed' => '/feed'
        ],
        'wordpress' => [
            'name' => 'Wordpress',
            'default' => false,
            'feed' => '/feed'
        ]
    ],
    'validation' => [
        'HTML' => [
            'description' => '上傳HTML檔案',
            'default' => true,
        ],
        'DNS' => [
            'description' => 'DNS新增TXT標籤',
            'default' => false,
        ],
        'Meta' => [
            'description' => '新增Meta 標籤',
            'default' => false,
        ]
    ]
];
