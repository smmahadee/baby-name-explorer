<?php

declare(strict_types = 1);
// LETTER SPECIFIC NAMES
function fetch_names_initial(string $letter) : array {
    global $pdo;
    $stmt = $pdo->prepare('SELECT `name`, `year`, `count` from `names`
    where `name` LIKE :letter 
    group by `name` order by `year`');
   $stmt->bindValue(':letter', "{$letter}%", PDO::PARAM_STR);
   $stmt->execute();
   
   $namesResult = $stmt->fetchAll(PDO::FETCH_ASSOC);
   $names = [];
   foreach ($namesResult as $name) {
       $names[] = $name['name'];
   }

   return $names;
}

// fetch by specific name
function fetch_by_name(string $name) : array {
    global $pdo;
    $stmt = $pdo->prepare('SELECT * from `names` where `name` = :name order by `year`');
    $stmt->bindValue(':name', $name , PDO::PARAM_STR);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

 // Top 10 names
 function fetch_top_names() : array {
    global $pdo; 
    
   $stmt = $pdo->prepare('SELECT name, SUM(count) as total_count from names 
   GROUP BY name
   ORDER by total_count DESC
   limit 15');
   $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

