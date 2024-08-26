<?php
require 'widget/cutes.php';
$id = $_GET["id"];
$cute = query("SELECT * FROM blog WHERE ID = $id")[0];
?>
<?php include 'widget/headpost.php' ?>
<div class="col-12 p-3">
    <div class="card p-1">
        <img class="img-fluid card" title="<?= $cute["title"]; ?>" src="<?= $cute["cover"]; ?>" />
        <div class="p-3 p-md-5">
            <h1><a href="blog.php?id=<?= $cute["id"]; ?>"><?= $cute["title"]; ?></a> ✏️</h1>
            <h3>📝
                <?= $cute["description"]; ?>
            </h3>
            <p class="dotted"></p>
            <p>
                <?= $cute["content"]; ?>
            </p>
        </div>
    </div>
</div>
<?php include 'widget/footer.php' ?>