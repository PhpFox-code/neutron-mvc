<?php
namespace Neutron\Mvc;

interface ControllerInterface
{
    /**
     * @param string $action
     *
     * @return mixed
     */
    public function resolve($action);
}