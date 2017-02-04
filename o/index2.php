<?php

require 'inheritance.php';

$c=new Collection();

$c->add('foo');

$c->add('bar');

$c->baz='qux';

echo '<pre>',print_r($c->all());

?>