<?php

namespace Phpfox\Mvc;

class Responder
{
    /**
     * @var StrategyInterface
     */
    protected $strategy;

    /**
     * @var mixed
     */
    protected $content;

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

    /**
     * @param mixed $content
     *
     * @return $this
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    public function response()
    {
        $layout = service('layout');
        return service('renderer')->render($layout);
    }
}