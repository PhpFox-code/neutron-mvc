<?php

namespace Phpfox\Mvc;


use Phpfox\Service\ServiceManager;

/**
 * Class StandardController
 *
 * @package Phpfox\Mvc
 */
class StandardController implements ControllerInterface
{
    /**
     * @var ServiceManager
     */
    protected $serviceManager;

    /**
     * StandardController constructor.
     *
     * @param ServiceManager $serviceManager
     */
    public function __construct(ServiceManager $serviceManager)
    {
        $this->serviceManager = $serviceManager;

        $this->initialize();
    }

    protected function initialize()
    {

    }

    /**
     * @inheritdoc
     */
    public function dispatch($action)
    {
        $method = 'action' . _camelize($action);

        $this->{$method}();
    }

    /**
     * @param string $controller
     * @param string $action
     */
    public function forward($controller, $action)
    {
        App::instance()->getDispatcher()->setControllerName($controller)
            ->setActionName($action)->setDispatched(false);
    }
}