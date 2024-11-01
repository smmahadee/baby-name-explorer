<?php if (!empty($names)) : ?>
    <ul>
        <?php foreach ($names as $name) : ?>
            <li><a href="name.php?<?= http_build_query(['name' => $name]) ?>"><?= htmlspecialchars($name) ?></a></li>
        <?php endforeach; ?>
    </ul>
<?php else : ?>
    <p>We didn't find any names matching this query.</p>
<?php endif; ?>

<div class="pagination_box">
<?php if($page > 1) : ?>
    <a  href="letter.php?<?php echo http_build_query(['letter' => $letter, 'page' => $page - 1]) ?>">Prev</a>
<?php endif;?>

<?php for ($i = 1; $i <= $totalPages; $i++) : ?>
    <a class="pagination_btn <?php if($i === $page) echo 'active' ?>" href="letter.php?<?php echo http_build_query(['letter' => $letter, 'page' => $i]) ?>"><?= $i ?></a>
<?php endfor; ?>

<?php if($page < $totalPages) : ?>
    <a  href="letter.php?<?php echo http_build_query(['letter' => $letter, 'page' => $page + 1]) ?>">Next</a>
<?php endif;?>
</div>