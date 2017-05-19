<?php

/*
 * This file is part of the Blog project.
 *
 * (c) Guillaume Loulier <contact@guillaumeloulier.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Core\Managers;

use Core\Services\DBFactory;
use Symfony\Component\Form\FormFactory;

/**
 * Class ArticlesManager
 *
 * @author Guillaume Loulier <contact@guillaumeloulier.fr>
 */
class ArticlesManager
{
    /** @var DBFactory */
    private $db;

    /** @var FormFactory */
    private $form;

    /**
     * ArticlesManager constructor.
     * @param DBFactory $db
     * @param FormFactory $form
     */
    public function __construct(DBFactory $db, FormFactory $form)
    {
        $this->db = $db;
        $this->form = $form;
    }

    public function getArticles()
    {
        
    }
}
