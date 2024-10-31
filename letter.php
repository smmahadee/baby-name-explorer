<?php
require __DIR__ . '/inc/all.inc.php';

$letter = null;
if (!empty($_GET['letter'])) {
    $letter = strtoupper($_GET['letter']);

    if (strlen($letter > 1)) {
        $letter = $letter[0];
    }
}

if(strlen($letter) === 0) {
    header('Location: index.php');
}


$names = [];
if(!empty($letter)) {
   $names =  fetch_names_initial($letter);
}

$top_names = fetch_top_names();
?>

<?php require __DIR__ . '/views/header.view.php'; ?>

<?php if (!empty($names)) : ?>
    <ul style="display: grid; grid-template-columns: repeat(3, 1fr);">
        <?php foreach ($names as $name) : ?>
            <li><a href="name.php?<?= http_build_query(['name' => $name]) ?>"><?= htmlspecialchars($name) ?></a></li>
        <?php endforeach; ?>
    </ul>
<?php else : ?>
    <p>We didn't find any names matching this query.</p>
<?php endif; ?>


<?php if (empty($letter)) : ?>
    <ul>
        <?php foreach ($top_names as $name) : ?>
            <li><a href="name.php?name=<?= e($name['name']) ?>"><?= e($name['name']) ?> (<?= e($name['total_count']) ?>)</a></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>


<?php require __DIR__ . '/views/footer.view.php'; ?>