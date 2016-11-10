<?php

namespace Phpfox\Mvc;

class Responder
{
    /**
     * @var StrategyInterface
     */
    protected $strategy;

    /**
     * @return StrategyInterface
     */
    public function getStrategy()
    {
        return $this->strategy;
    }

    /**
     * @param StrategyInterface $strategy
     */
    public function setStrategy($strategy)
    {
        $this->strategy = $strategy;
    }
}