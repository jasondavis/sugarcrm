<?php


//Для того что бы валидация работала правильно, нужно передать в метод display второй параметр true, таким образом обойдя баг sugar. Переопределение метода display. Если этого не сделать, то поле пометится звездочкой, но валидация работать не будет. 
function display(){
   $this->ev->process();
   echo $this->ev->display($this->showTitle,true);
}
