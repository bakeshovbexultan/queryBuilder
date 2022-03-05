<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<?php

	require 'QueryBuilder.php';

	$pdo = new PDO('mysql:host=localhost;dbname=marlinpractice;charset=utf8', 'root', '');

	$qb = new QueryBuilder($pdo);

	$qb->deleteById('users', '87');
	echo '<pre>';
		var_dump($users);
	echo '</pre>';















	?>
</body>
</html>