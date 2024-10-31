<?php if (!empty($names)) : ?>
    <ul style="display: grid; grid-template-columns: repeat(3, 1fr);">
        <?php foreach ($names as $name) : ?>
            <li><a href="name.php?<?= http_build_query(['name' => $name]) ?>"><?= htmlspecialchars($name) ?></a></li>
        <?php endforeach; ?>
    </ul>
<?php else : ?>
    <p>We didn't find any names matching this query.</p>
<?php endif; ?>
