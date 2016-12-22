<?php
/**
 * Interface IEvent
 *
 * Events interface. Should be implemented by all events
 *
 * @category System
 * @package  Events
 * @author   peter.georgiev <peter.georgiev@concatel.com>
 * @license  http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @link     none
 */

namespace System\Events;


interface IEvent
{
    public function isAborted();
    public function abort();
}