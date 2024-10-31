<?php
require __DIR__ . '/inc/all.inc.php';

$letter = null;
if (!empty($_GET['letter'])) {
    $letter = strtoupper($_GET['letter']);

    if (strlen($letter > 1)) {
        $letter = $letter[0];
    }
}

$names = fetch_names_initial($pdo, $letter);

$top_names = fetch_top_names($pdo);
?>

<?php require __DIR__ . '/views/header.view.php'; ?>

<?php if (!empty($letter)) : ?>
    <ul style="display: grid;grid-template-columns: 1fr 1fr 1fr;">
        <?php foreach ($names as $name) : ?>
            <li><?= e($name) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php if (empty($letter)) : ?>
    <ul>
        <?php foreach ($top_names as $name) : ?>
            <li><a href="?name=<?= e($name['name']) ?>"><?= e($name['name']) ?> (<?= e($name['total_count']) ?>)</a></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>


<?php require __DIR__ . '/views/footer.view.php'; ?>