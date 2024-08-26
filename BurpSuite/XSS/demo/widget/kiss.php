<?php
require 'cutes.php';
$id = $_GET["id"];
$cute = query("SELECT * FROM blog WHERE ID = $id")[0];
if (isset($_POST["submit"])) {
	if (kiss($_POST) > 0) {
		echo " 
	<script>
	alert('Cool.. your post is update 😍 😘');
	document.location.href ='cuteblog.php';
	</script>
	";
	} else {
		echo "
	<script>
	alert('Oops.. cant update data 😭');
	document.location.href ='cuteblog.php';
	</script>
	";
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Cute Blog 🥳</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link href="https://axcora.my.id/pico/cuteblog/themes/cuteblogs/css/styles.css" rel="stylesheet" />
</head>

<body>
	<main class="container">
		<nav class="navbar p-3">
			<p><a class="nav-link" href="../index.php">🧸 Home</a></p>
			<a class="nav-link btn btn-dark text-white" href="https://github.com/kienzx203/WEB_SEC">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-github"
					viewBox="0 0 16 16">
					<path
						d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z">
					</path>
				</svg> Github</a>
		</nav>
		<div class="col-12 p-3">
			<div class="card p-3 p-md-5">
				<h3>Update Post 🥳</h3>
				<form action="" method="post">
					<input type="hidden" name="id" value="<?= $cute["id"]; ?>">
					<label for="title">Title </label>
					<input class="form-control" type="text" name="title" id="title" required
						value="<?= $cute["title"]; ?>">
					<label for="description">Description </label>
					<input class="form-control" type="text" name="description" id="description" required
						value="<?= $cute["description"]; ?>">
					<label for="cover">Cover </label>
					<input class="form-control" type="url" name="cover" id="cover" value="<?= $cute["cover"]; ?>">
					<label for="content">Content </label>
					<textarea class="form-control" rows="5" type="text" name="content"
						id="content"><?= $cute["content"]; ?></textarea>
					<br />
					<div class="p-1"><button type="submit" class="float-end col-12 col-md-4 btn btn-lg btn-dark"
							name="submit">Update Post</button></div>
				</form>
			</div>
		</div>
		<?php include 'footer.php' ?>