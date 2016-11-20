<?php

namespace Phpfox\Mvc;


/**
 * Class StandardController
 *
 * @package Phpfox\Mvc
 */
class StandardController implements ControllerInterface
{
    public function __construct()
    {
        $this->initialize();
    }

    protected function initialize()
    {
    }

    /**
     * @inheritdoc
     */
    public function resolve($action)
    {
        $method = 'action' . _camelize($action);

        return $this->{$method}();
    }

    /**
     * @param string $controller
     * @param string $action
     */
    public function forward($controller, $action)
    {
        Application::instance()->getDispatcher()->setControllerName($controller)
            ->setActionName($action)->setDispatched(false);
    }
}