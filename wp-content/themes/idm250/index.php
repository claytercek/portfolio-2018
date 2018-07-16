<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<h1>Example 1</h1>
	<?php 

		$characters = ['Paul','Mark','Jane'];

		for ($i = 0; $i < 3; $i++) {
			$string = "${i} is the key and ${characters[$i]} is the value in the \$characters array<br/>";
			echo ($string);
		}

	?>

	<h1>Example 1</h1>
	<?php 
	
		$schools = [
    'Drexel University' => [
        'type' => 'University',
        'url'  => 'https://drexel.edu'
    ],
    'Temple University'  => [
        'type' => 'University',
        'url'  => 'https://www.temple.edu/'
    ],
    'University of Pennsylvania' => [
        'type' => 'University',
        'url'  => 'https://www.upenn.edu/'
    ]
	];
		foreach ($schools as $school) {
			$string = "$school is a ${school["type"]} and the website is ${school["url"]} <br/>";
			echo ($string);
		}

	?>
</body>
</html>
