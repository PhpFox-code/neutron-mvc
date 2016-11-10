<?php
namespace Phpfox\Mvc;

class StandardDispatcher implements DispatcherInterface
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

    /**
     * @inheritdoc
     */
    public function getControllerName()
    {
        return $this->controllerName;
    }

    /**
     * @inheritdoc
     */
    public function setControllerName($controllerName)
    {
        $this->controllerName = $controllerName;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getActionName()
    {
        return $this->actionName;
    }

    /**
     * @inheritdoc
     */
    public function setActionName($actionName)
    {
        $this->actionName = $actionName;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function isDispatched()
    {
        return $this->dispatched;
    }

    /**
     * @inheritdoc
     */
    public function setDispatched($flag)
    {
        $this->dispatched = (bool)$flag;
    }

    /**
     * @inheritdoc
     */
    public function dispatch()
    {
        $stack = 0;
        $manager = App::instance()->getManager();
        
        do {
            $result = $manager->get($this->controllerName)
                ->dispatch($this->actionName);
        } while ($this->dispatched == false && $stack++ < 4);
    }
}