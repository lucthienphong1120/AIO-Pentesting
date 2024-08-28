<?php
$conn = mysqli_connect("localhost", "root", "", "cuteblog");
function query($query)
{
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}
function insert($data)
{
	global $conn;
	$title = ($data["title"]); // sự khác biệt khi không encoded
	$description = htmlspecialchars($data["description"]);
	$cover = htmlspecialchars($data["cover"]);
	$content = htmlspecialchars($data["content"]);
	$query = "INSERT INTO blog
	VALUES
	('','$title','$description','$cover','$content')
	";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}
function broken($id)
{
	global $conn;
	mysqli_query($conn, "DELETE FROM blog WHERE id = $id");
	return mysqli_affected_rows($conn);
}

function kiss($data)
{
	global $conn;
	$id = $data["id"];
	$title = htmlspecialchars($data["title"]);
	$description = htmlspecialchars($data["description"]);
	$cover = htmlspecialchars($data["cover"]);
	$content = htmlspecialchars($data["content"]);
	$query = "UPDATE blog SET
	title = '$title',
	description = '$description',
	cover = '$cover',
	content = '$content'
	WHERE id = $id
";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

?>