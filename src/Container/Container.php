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
        /**
         * The application instance that is executed
         * in the bin/console entrypoint.
         */
        $this['app'] = function ($container) {
            $app = new Application();

            // Here the sample command is registered
            $app->add($container['greet.command']);

            return $app;
        };

        /**
         * The default sample command
         */
        $this['greet.command'] = function () {
            return new \Sample\GreetCommand();
        };
    }
}
