<?php
require __DIR__ . '/inc/all.inc.php';

$top_names = fetch_top_names();
?>

<?php require __DIR__ . '/views/header.view.php'; ?>

<ul>
    <?php foreach ($top_names as $name) : ?>
        <li><a href="name.php?name=<?= e($name['name']) ?>"><?= e($name['name']) ?> (<?= e($name['total_count']) ?>)</a></li>
    <?php endforeach; ?>
</ul>



<?php require __DIR__ . '/views/footer.view.php'; ?>