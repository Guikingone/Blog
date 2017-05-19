<?php

/*
 * This file is part of the Blog project.
 *
 * (c) Guillaume Loulier <contact@guillaumeloulier.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
        'path' => '/article/details/',
        'action' => \Core\Action\ArticleDetailsAction::class,
        'parameters' => 'id'
    ],
    'contact' => [
        'path' => '/contact',
        'action' => \Core\Action\ContactAction::class
    ]
];
