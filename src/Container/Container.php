<?php

namespace Container;

use Pimple\Container as BaseContainer;
use Symfony\Component\Console\Application;

class Container extends BaseContainer
{
    /**
     * @param boolean $debug
     */
    public function __construct($debug = false)
    {
        $this['app'] = function ($container) {
            $app = new Application();

            $app->add($container['greet.command']);

            return $app;
        };

        $this['greet.command'] = function () {
            return new \Sample\GreetCommand();
        };
    }
}
