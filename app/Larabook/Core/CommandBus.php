<?php

namespace Larabook\Core;

use App;
trait CommandBus {

    /**
     * Execute the command
     *
     * @param $command
     * @return mixed
     */
    public function execute($command)
    {
        return $this->getCommandBus()->execute($command);
    }

    /**
     * Returns an instance of the command bus
     *
     * @return Laracasts\Commander\CommandBus
     */
    public function getCommandBus()
    {
        return App::make('Laracasts\Commander\CommandBus');
    }
} 