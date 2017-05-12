<?php

return [
    'app.article_manager' => [
        'class' => \Core\Managers\ArticlesManager::class,
        'arguments' => [
            'db',
            'form'
        ]
    ]
];
