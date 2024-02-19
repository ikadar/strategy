<?php

namespace IKadar\Strategy;

interface CommandInterface
{
    /**
     * @return ParameterBag
     */
    public function getParameter(): ParameterBag;

    public function execute();
}
