<?php

namespace Core\Responders;

/**
 * Class HomeActionResponder
 *
 * @author guillaume Loulier <contact@guillaumeloulier.fr>
 */
class HomeActionResponder
{
    public function __construct($templating)
    {
        $this->templating = $templating;
    }

    public function __invoke()
    {
        $this->templating->render('');
    }
}
