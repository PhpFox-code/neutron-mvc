<?php
namespace Neutron\Mvc;


/**
 * Dispatch Interface
 *
 * @package Neutron\Mvc
 */
interface DispatchInterface
{
    public function getControllerName();

    public function setControllerName($controllerName);

    public function getActionName();

    public function setActionName($actionName);

    public function isDispatched();

    public function setDispatched($flag);

    public function dispatch();

    public function getFullActionName();
}