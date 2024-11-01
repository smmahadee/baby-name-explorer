<?php

declare(strict_types=1);
// LETTER SPECIFIC NAMES
function fetch_names_initial(string $letter, int $offset, int $limit): array
{

    global $pdo;
    $stmt = $pdo->prepare('SELECT DISTINCT `name` 
    FROM `names`
    WHERE `name` LIKE :letter 
    ORDER BY `year` limit :limit offset :offset
   ');

    $stmt->bindValue(':letter', "{$letter}%", PDO::PARAM_STR);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->execute();

    $namesResult = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $names = [];
    foreach ($namesResult as $name) {
        $names[] = $name['name'];
    }

    return $names;
}

// count total names
function count_names_initial(string $letter) {
    global $pdo;
    $stmt = $pdo->prepare('SELECT COUNT(DISTINCT `name`) as `total_names` FROM `names` WHERE `name` LIKE :letter');
    $stmt->bindValue(':letter', "{$letter}%", PDO::PARAM_STR);
    $stmt->execute();

    $result =  $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['total_names'];
}

// fetch by specific name
function fetch_by_name(string $name): array
{
    global $pdo;
    $stmt = $pdo->prepare('SELECT * from `names` where `name` = :name order by `year`');
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Top 10 names
function fetch_top_names(): array
{
    global $pdo;

    $stmt = $pdo->prepare('SELECT name, SUM(count) as total_count from names 
   GROUP BY name
   ORDER by total_count DESC
   limit 15');
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
