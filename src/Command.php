<?php

namespace IKadar\Strategy;

abstract class Command implements CommandInterface
{
    protected ParameterBag $parameter;

    public function __construct(
    )
    {
    }

    /**
     * @param ParameterBag $parameter
     * @return CommandInterface
     */
    public function setParameter(ParameterBag $parameter): CommandInterface
    {
        $this->parameter = $parameter;
        return $this;
    }

    /**
     * @return ParameterBag
     */
    public function getParameter(): ParameterBag
    {
        return $this->parameter;
    }


}
