<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<?php
		$paragraf1 = "Hello, my name is Eleanor. I am 13 years old. Everyone has a family and I have also. I love my family very much. I live with my family. Today I will share something about my family. There are 4 people in total in our family. My parents, my sister, and me. We are a very small family.";
		$paragraf2 = "My father is an engineer and my mother is a doctor, but after their work, they spend so much time with us. They both love us a lot. They work really hard to make our future better. It is a very happy family. If we face any bad time, my parents handle it with care.";

		echo "<h4>Menggabungkan dua paragfaf menjadi satu variabel</h4>";

		$story = "$paragraf1 $paragraf2";
		echo "$story <br>";

		echo "<h4>Mengganti angka menjadi huruf </h4>";

		$story = str_replace("13", "thirteen", $story);
		$story = str_replace("4", "four", $story);
		echo "$story <br>";

		echo "<h4>Mencari jumlah karakter dan kata</h4>";

		echo "Jumlah kata dalam paragraf : ". str_word_count($story) ."<br>";
		echo "Jumlah karakter dalam paragraf : ". strlen($story);

	?>
</body>
</html>