<?php require 'widget/cutes.php';
$cute = query("SELECT * FROM blog"); ?>
<?php include 'widget/headhome.php' ?>
<div class="row">

    <?php foreach ($cute as $sweet): ?>
        <div class="col-md-4 p-3">
            <div class="card h-100 p-1">
                <a href="blog.php?id=<?= $sweet['id']; ?>">
                    <img class="img-fluid card" alt="<?= $sweet['title']; ?>" src="<?= $sweet['cover']; ?>" />
                    <div class="card-content p-3">
                        <h3>
                            <?= $sweet["title"]; ?> ✏️
                        </h3>
                        <p>📝
                            <?= $sweet["description"]; ?>
                        </p>
                    </div>
                </a>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?php include 'widget/footer.php' ?>