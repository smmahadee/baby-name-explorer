<h1>Most Common Names:</h1>
<ul>
    <?php foreach ($top_names as $name) : ?>
        <li><a href="name.php?name=<?= e($name['name']) ?>"><?= e($name['name']) ?> (<?= e($name['total_count']) ?>)</a></li>
    <?php endforeach; ?>
</ul>