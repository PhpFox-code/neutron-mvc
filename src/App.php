<?php

namespace Phpfox\Mvc {

    use Phpfox\EventManager\EventManagerInterface;

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

        public function routing()
        {
            return service('routing');
        }
    }
}