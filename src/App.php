<?php
namespace Phpfox\Mvc;

use Phpfox\Service\ServiceManager;

class App
{
    /**
     * @var bool
     */
    private $initialized = false;

    /**
     * @var App
     */
    private static $singleton;

    /**
     * @var ServiceManager
     */
    private $manager;

    /**
     * @var DispatcherInterface
     */
    private $dispatcher;

    /**
     * App constructor.
     */
    private function __construct()
    {
        $this->initialize();
    }

    public static function instance()
    {
        if (null == self::$singleton) {
            self::$singleton = new static();
        }
        return self::$singleton;
    }

    /**
     * Load all database configuration. there are no items the test.
     */
    protected function initialize()
    {
        if ($this->initialized) {
            return;
        }
        $this->initialized = true;
    }

    /**
     * @return ServiceManager
     */
    public function getManager()
    {
        return $this->manager;
    }

    /**
     * @param ServiceManager $manager
     */
    public function setManager($manager)
    {
        $this->manager = $manager;
    }

    /**
     * @return DispatcherInterface
     */
    public function getDispatcher()
    {
        return $this->dispatcher;
    }

    /**
     * @param DispatcherInterface $dispatcher
     */
    public function setDispatcher($dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }


    public function dispatch()
    {
    }
}