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
    ]
];
