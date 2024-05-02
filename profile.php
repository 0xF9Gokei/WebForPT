<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Кузьмин Д.В.</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css” />

	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<header>
		<h1>Мой личный сайт... ой, Здравствуй <?php echo $_COOKIE['User']; ?> !</h1>
	</header>
		<div class = "wrapper">
		<div class = "UpperBlock">
			<div class="myText"><h1> Я Кузьмин Данил Владимирович. Раньше я хотел стать котенком поваренком. Мне казалось, если я буду слушать плейлисты, то стану им. А нет, по итогу попал cюда. Теперь мне приходится постоянно чиать статьи, учиться и вообще делать дела...А вот как я хочу выглядеть. Красифо?...  Снизу пост можно составить, кстати</h1></div>
			<div class="smallImage"><img class = "BucketImg_size" src="img/bucket.jpg" width = "250" height = "150" alt=""> </div>
		</div>
		<div class="mainBlock"><img class = "CatImg_size" height = "35%" width = "35%" src="img/catImg.jpeg" alt="#"></div>
		<div class="Posting">
			<form class="form_align" method="POST" action="profile.php" enctype="multipart/form-data" name="upload">
				<input type="text" class="form" name="title" placeholder="Заголовок поста">
				<textarea name="text" cols="30" rows="10" placeholder="Введите текст вашего поста..."></textarea>
				<input type="file" name="file" /> <br> 
				<button type="submit" class="btn_red" name="submit">Сохранить!</button>
			</form>
		</div>
		</div>
	<footer>
		<p>
		Пишите в лс, в телегу, на почту, куда угодно просто напишите пж, умаляю
		</p>
	</footer>
</body>
</html>

<?php
require_once('db.php');


$link = mysqli_connect('db', 'root', 'kali', 'first');

if (isset($_POST['submit'])) {
	$title = $_POST['title'];
	$main_text = $_POST['text'];

	if(!$title || !$main_text) die("Заполните все поля");

	$sql = "INSERT INTO posts (title, main_text) VALUES ('$title', '$main_text')";

	if(!mysqli_query($link, $sql)) {
		echo "Не удалось добавить пост";
		if(!empty($_FILES["file"])) {
        if (((@$_FILES["file"]["type"] == "image/gif") || (@$_FILES["file"]["type"] == "image/jpeg")
        || (@$_FILES["file"]["type"] == "image/jpg") || (@$_FILES["file"]["type"] == "image/pjpeg")
        || (@$_FILES["file"]["type"] == "image/x-png") || (@$_FILES["file"]["type"] == "image/png"))
        && (@$_FILES["file"]["size"] < 102400))
        {
            move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
            echo "Load in:  " . "upload/" . $_FILES["file"]["name"];
        }
        else
        {
            echo "upload failed!";
        }
    }
	}
}
?>

