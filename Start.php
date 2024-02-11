<?php

use world\Tools\ConsoleText;
use world\World\World;


spl_autoload_register(function ($class) {
    $a = array_slice(explode('\\', $class), 1);
    if (!$a) {
        throw new \Exception();
    }
    $filename = implode('\\', [__DIR__, ...$a]) . '.php';
    require_once $filename;
});

$world = new World();
$world->startCycles();

ConsoleText::echoTextOrange('=========FINISH=========');

if($world->getAnimalStorage()->count() > 0){
    ConsoleText::echoTextGreen('Победа');
}else{
    ConsoleText::echoTextRed('Проигрыш');
}

ConsoleText::echoTextOrange('- циклов пройдено ' . $world->getYear());
ConsoleText::echoTextOrange('- животные ' . $world->getAnimalStorage()->count());
ConsoleText::echoTextOrange('- растения ' . $world->getPlantStorage()->count());

