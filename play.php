<?php
require (__DIR__ . '/NameGenerator.php');

for ($i=1;$i<26;$i++) {
	$name = NameGenerator::generateName();

	echo "$i. $name\n";
}

return 0;