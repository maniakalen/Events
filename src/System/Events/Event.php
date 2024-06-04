<?php
/**
 * Class Event
 *
 * Basic event bundle class
 *
 * @category System
 * @package  Events
 * @author   peter.georgiev <maniakalen@gmail.com>
 * @license  http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @link     none
 */

namespace System\Events;


class Event implements IEvent
{
    public $sender;
    public $extra = array();
    protected $aborted = false;
    public function isAborted()
    {
        return $this->aborted;
    }
    public function abort()
    {
        $this->aborted = true;
        return $this;
    }
}
