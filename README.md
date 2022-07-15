# Simple events system

Extend Dispatcher class to add events support to your objects.

Attach event handlers with <pre>$object->on('event_name', &lt;handler in callable format&gt;)</pre>

Execute handlers with <pre>$object->trigger('event_name', $event)</pre>

You can also detach event by using <pre>$object->off('event_name', &lt;handler&gt;)</pre>

PHP System Event engine
<pre>
"repositories": [
    {
      "url": "https://github.com/maniakalen/Events.git",
      "type": "git"
    }
  ]
  </pre>
  and 
  <pre>
  "System/Events" : "1.0.0"
  </pre>
  in your require
