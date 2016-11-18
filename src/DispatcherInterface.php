<?php

namespace Phpfox\Mvc;


interface DispatcherInterface
{
    /**
     * @param string $controller
     *
     * @return $this
     */
    public function setControllerName($controller);

    /**
     * @param string $action
     *
     * @return $this
     */
    public function setActionName($action);

    /**
     * @param bool $flag
     *
     * @return $this
     */
    public function setDispatched($flag);

    /**
     * @return bool
     */
    public function isDispatched();

    /**
     * @return string
     */
    public function getControllerName();

    /**
     * @return string
     */
    public function getActionName();

    /**
     * @return $this
     */
    public function resolve();
}