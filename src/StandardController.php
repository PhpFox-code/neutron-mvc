<?php

namespace Neutron\Mvc;


/**
 * Class StandardController
 *
 * @package Neutron\Mvc
 */
class StandardController implements ControllerInterface
{
    public function resolve($action)
    {
        if (!method_exists($this, $method = 'action' . _inflect($action))) {
            return $this->forward('Core\Controller\ErrorController', '404');
        }
        return $this->{$method}();
    }

    /**
     * @param string $controller
     * @param string $action
     *
     * @return false
     */
    public function forward($controller, $action)
    {
        service('app')->setDispatched(false)
            ->setControllerName($controller)
            ->setActionName($action);

        return false;
    }
}