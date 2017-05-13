<?php

namespace Core\Action;

/**
 * Class HomeAction
 *
 * @author Guillaume Loulier <contact@guillaumeloulier.fr>
 */
class HomeAction
{
    private $responder;

    public function __construct($responder)
    {
        $this->responder = $responder;
    }

    public function __invoke()
    {
        return $this->responder;
    }
}
