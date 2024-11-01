<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./styles/simple.css" />
    <link rel="stylesheet" type="text/css" href="./styles/custom.css" />
    <title>Name explorer</title>
</head>

<body>
    <header>
        <h1><a href="index.php">Name explorer</a></h1>
        <p>Explore and find names</p>
        <nav>
            <?php foreach ($alphabets as $alphabet) : ?>
                <a style="background-color: <?php if(!empty($letter) && $alphabet === $letter) echo 'yellowgreen' ?>;" href="letter.php?<?php echo http_build_query(['letter' => $alphabet]) ?>"><?php echo e($alphabet) ?></a>
            <?php endforeach; ?>
        </nav>
    </header>

    <main>
        <?php echo $contents; ?>
    </main>
</body>

</html>