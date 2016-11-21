<?php

namespace Phpfox\Mvc;

/**
 * Class Application
 *
 * @package Phpfox\Mvc
 */
class Application
{
    /**
     * @var bool
     */
    protected $dispatched = false;

    /**
     * @var string
     */
    protected $controllerName = '';

    /**
     * @var string
     */
    protected $actionName = 'index';

    public function getControllerName()
    {
        return $this->controllerName;
    }

    public function setControllerName($controllerName)
    {
        $this->controllerName = $controllerName;
        return $this;
    }

    public function getActionName()
    {
        return $this->actionName;
    }

    public function setActionName($actionName)
    {
        $this->actionName = $actionName;
        return $this;
    }

    public function isDispatched()
    {
        return $this->dispatched;
    }

    public function setDispatched($flag)
    {
        $this->dispatched = (bool)$flag;
    }

    public function getFullActionName()
    {
        return preg_replace('/\W+/', '_', _deflect(str_replace('Controller', '',
            $this->getControllerName() . '.' . $this->getActionName())));
    }

    public function dispatch()
    {
        $loop = 5;
        $content = null;

        list($path, $host, $method) = _http_init_info();

        if (null == $this->controllerName) {
            $routeResult = service('routing')->resolve($path, $host, $method);
            $this->controllerName = $routeResult->getControllerName();
            $this->actionName = $routeResult->getActionName();
        }

        do {
            $this->setDispatched(true);
            $content
                = (new $this->controllerName())->resolve($this->actionName);
        } while ($this->dispatched == false and --$loop > 0);

        echo service('responder')->setContent($content)
            ->response();
    }
}