<?php
/**
 *
 *
 * @category Dispatcher
 * @package  Events
 * @author   Peter Georgiev
 * @license  http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @link     none
 */

namespace System\Events;

interface IDispatcher
{
    /**
     * @param $eventName
     * @param IEvent|null $event
     * @return mixed
     */
    public function trigger($eventName, IEvent $event = null);

    /**
     * @param string $eventName
     * @param \Closure $handler
     * @return mixed
     */
    public function on($eventName, $handler);

    /**
     * @param string|null $eventName
     * @param \Closure $handler
     * @return mixed
     */
    public function off($eventName = null, $handler = null);
}