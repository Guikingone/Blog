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
    'app.article_manager' => [
        'class' => \Core\Managers\ArticlesManager::class,
        'arguments' => [
            \Core\Services\DBFactory::class,
            \Symfony\Component\Form\FormFactory::class
        ]
    ]
];
