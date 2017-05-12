<?php

namespace Core\Action;

/**
 * Class HomeAction
 *
 * @author Guillaume Loulier <contact@guillaumeloulier.fr>
 */
class HomeAction
{
    private $templating;

    private $responder;

    public function __construct($templating, $responder)
    {
        $this->templating = $templating;
        $this->responder = $responder;
    }

    public function __invoke()
    {
        // TODO: Implement __invoke() method.
    }
}
