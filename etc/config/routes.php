<?php

return [
    'home' => [
        'path' => '/',
        'action' => \Core\Action\HomeAction::class
    ],
    'articles' => [
        'path' => '/articles',
        'action' => \Core\Action\ArticlesAction::class
    ],
    'article_details' => [
        'path' => '/article/details/id',
        'action' => \Core\Action\ArticleDetailsAction::class,
        'parameters' => 'id'
    ],
    'contact' => [
        'path' => '/contact',
        'action' => \Core\Action\ContactAction::class
    ]
];
