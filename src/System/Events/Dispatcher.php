<?php

namespace System\Events;

/**
 * Class Dispatcher
 *
 * Abstract class implementing functionality of event dispatching. Should be extended
 * by objects that needs to trigger events
 *
 * @category System
 * @package  Events
 * @author   peter.georgiev <peter.georgiev@concatel.com>
 * @license  http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @link     none
 */
abstract class Dispatcher
{
    protected $events = array();

    /**
     * Triggers events for a given object
     *
     * @param string $eventName
     * @param Event|null $event
     * @return null|boolean
     */
    final public function trigger($eventName, Event $event = null)
    {
        if (!isset($this->events[$eventName])) {
            return null;
        }
        if ($event === null) {
            $event = new Event();
        }
        if ($event->sender === null) {
            $event->sender = $this;
        }
        foreach ($this->events[$eventName] as $handlers) {
            if (!isset($handlers) || !is_callable($handlers)) {
                continue;
            }
            call_user_func($handlers, $event);
            if ($event->isAborted()) {
                break;
            }
        }
        return true;
    }

    /**
     *
     * @param string $eventName
     * @param $handler
     */
    final public function on($eventName, $handler)
    {
        if (!isset($this->events[$eventName])) {
            $this->events[$eventName] = array();
        }
        $this->events[$eventName][] = !is_array($handler)?array($handler):$handler;
    }

    /**
     * @param null $eventName
     * @param null $handler
     * @return bool
     */
    final public function off($eventName = null, $handler = null)
    {
        if (empty($this->events[$eventName])) {
            return false;
        }
        if ($handler === null) {
            unset($this->events[$eventName]);
            return true;
        } else {
            $removed = false;
            foreach ($this->events[$eventName] as $i => $event) {
                if ($event === $handler) {
                    unset($this->events[$eventName][$i]);
                    $removed = true;
                }
            }
            if ($removed) {
                $this->events[$eventName] = array_values($this->events[$eventName]);
            }
            return $removed;
        }
    }
}