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
        $layout = service('layout')->prepare();
        return service('renderer')->render($layout);
    }

    /**
     * @param string $path          External/Internal url
     * @param int    $response_code Temporary = 302, Permanently =  301
     */
    public function redirect($path, $response_code = 302)
    {
        if (headers_sent()) {

        } else {
            http_response_code($response_code);
            header('location: ' . $path);
        }
        $this->terminate();
    }

    public function terminate()
    {
        events()->trigger('onResponderTerminate');
        exit();
    }
}