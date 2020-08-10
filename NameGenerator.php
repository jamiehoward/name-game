<?php

class NameGenerator
{
    public static function addTitle($name, $prefix = true)
    {
    	$file = file_get_contents(__DIR__ . '/descriptors.list', 'r');
        $descriptors = explode("\n", $file);

        $descriptor = ucwords($descriptors[rand(0,count($descriptors) - 1)]);

    	if ($prefix) {
    		return "The $descriptor $name";
    	} else {
    		return "$name the $descriptor";
    	}
    }

    public static function getRandomNameFromList()
    {
        $file = file_get_contents(__DIR__ . '/names.list', 'r');
        $names = explode("\n", $file);

        return $names[rand(0,count($names) - 1)];
    }

    public static function generateName($titlePercentage = 60)
    {
        $firstName = self::getRandomNameFromList();
        
        $lastName = self::getRandomNameFromList();

    	$name = ucwords("$firstName $lastName");

    	$getsTitle = rand(1,100) >= (100-$titlePercentage);

    	if ($getsTitle) {
    		$prefix = rand(0,1) == 1;

    		$name = self::addTitle($name, $prefix);
    	}

    	return trim($name);
    }
}