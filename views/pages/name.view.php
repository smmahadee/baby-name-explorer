<h2>Statistics for specific name: <?php echo e($name) ?></h2>
<?php if(!empty($specificName)) : ?>
    <table>
        <tr>
        <th>Year</th>
        <th>Number of Babies born</th>
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
