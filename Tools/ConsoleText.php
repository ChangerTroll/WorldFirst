<?php
namespace world\Tools;

class ConsoleText {

    static public function echoText(string $text): void
    {
        echo $text, ' ' , PHP_EOL;
    }

    static public function echoTextRed(string $text): void
    {
        echo "\033[01;31m $text \033[0m", ' ' , PHP_EOL;
    }
    static public function echoTextGreen(string $text): void
    {
        echo "\033[0;32m $text \033[0m", ' ' , PHP_EOL;
    }
    static public function echoTextOrange(string $text): void
    {
        echo "\033[1;33m $text \033[0m", ' ' , PHP_EOL;
    }
}