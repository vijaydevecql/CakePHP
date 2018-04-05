<?php

echo $this->element('home/header');
echo $this->Session->flash();
echo $this->fetch('content');
echo $this->element('home/newslettersection');
echo $this->element('home/footer');
?>
   
