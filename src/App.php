<?php

namespace Phpfox\Mvc {

    use Phpfox\EventManager\EventManagerInterface;
    use Phpfox\Service\ServiceManager;

    /**
     * Class App
     *
     * @package Phpfox\Mvc
     */
    class App
    {
        /**
         * @var App
         */
        private static $singleton;
        /**
         * @var bool
         */
        private $initialized = false;
        /**
         * @var ServiceManager
         */
        private $manager;

        /**
         * @var DispatcherInterface
         */
        private $dispatcher;

        /**
         * @var EventManagerInterface
         */
        private $event;

        /**
         * App constructor.
         */
        private function __construct()
        {
            $this->initialize();
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

        public static function instance()
        {
            if (null == self::$singleton) {
                self::$singleton = new static();
            }
            return self::$singleton;
        }

        /**
         * @return ServiceManager
         */
        public function getManager()
        {
            if (null == $this->manager) {
                $this->manager = new ServiceManager();
            }
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

        /**
         * @return EventManagerInterface
         */
        public function getEvent()
        {
            return $this->event;
        }

        /**
         * @param EventManagerInterface $event
         */
        public function setEvent($event)
        {
            $this->event = $event;
        }

        public function dispatch()
        {

        }
    }
}

namespace {

    use Phpfox\Mvc\App;

    /**
     * @return App
     */
    function app()
    {
        return App::instance();
    }

    /**
     * @param string $id
     *
     * @return mixed
     */
    function service($id)
    {
        return App::instance()->getManager()->get($id);
    }
}