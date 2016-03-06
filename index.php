<?php

require_once 'class/hello.class.php';

$world = new Hello();
  $world->HelloWorldUp();
  $world->HelloWorldDown();

$world2 = new Hello();
  $world2->HelloWorldDown();
  $world2->HelloWorldUp();

Hello::HelloWorldUp();
Hello::HelloWorldDown();

$n = new Hello();
$n->name = "Sergey";
echo $n->name;

?>