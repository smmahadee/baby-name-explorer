<?php
require __DIR__ . '/inc/all.inc.php';

$name = null;
if(!empty($_GET['name'])) {
    $name = $_GET['name'];
}

if(empty($name)) {
    header('Location: index.php');
    exit;  // Exit the script to prevent further processing.
}

$specificName = fetch_by_name($name);

?>

<?php require __DIR__ . '/views/header.view.php'; ?>

<h2>Statistics for specific name: <?php echo e($name) ?></h2>
<?php if(!empty($specificName)) : ?>
    <table>
        <tr>
            <th>Year</th>
            <th>Count</th>
        </tr>
        <?php foreach($specificName as $name) :?>
            <tr>

                <td><?php echo $name['year']?></td>
                <td><?php echo $name['count']?></td>
            </tr>
        <?php endforeach;?>
    </table>
 <?php else :  ?>
        <p>No data found for the given name.</p>
<?php endif;?>

<?php require __DIR__ . '/views/footer.view.php'; ?>