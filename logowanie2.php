<?php
	include 'konfiguracja.php';
	
	$haslo = hash("sha256",$_GET["pwd"]);
	$connect = mysqli_connect($bazaAdres,$bazaLogin,$bazaHaslo,$bazaNazwa);
	$sql = "SELECT id FROM uzytkownicy WHERE login='".$_GET["lgn"]."' AND haslo='".$haslo."'";
	$rezultat = mysqli_query($connect,$sql);
	if(mysql_num_rows($rezultat) == 1){
		mysqli_close($connect);
		setcookie('login', $_GET["lgn"], time()+3600*24);
		setcookie('haslo', $haslo, time()+3600*24);
		header("Location: menu.php");
		die();
	};
	mysqli_close($connect);
	header("Location: logowanie.php");
	die();
?>