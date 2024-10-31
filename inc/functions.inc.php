<?php

function e($value) {
    return htmlspecialchars($value, ENT_NOQUOTES, 'UTF-8');
}


// generate a to z alphabetic characters
function gen_alphabet() {
    $A = ord('A');
    $Z = ord('Z');

    $letters = [];

    for ($i = $A; $i <= $Z; $i++) {
        $letters[] =  chr($i);
    }

    return $letters;
}

// LETTER SPECIFIC NAMES
function fetch_names_initial($pdo, $letter) {
    $nameStmt = $pdo->prepare('SELECT `name`, `year`, `count` from `names`
    where `name` LIKE :letter 
    group by `name` order by `year`');
   $nameStmt->bindValue(':letter', "{$letter}%", PDO::PARAM_STR);
   $nameStmt->execute();
   
   $namesResult = $nameStmt->fetchAll(PDO::FETCH_ASSOC);
   $names = [];
   foreach ($namesResult as $name) {
       $names[] = $name['name'];
   }

   return $names;
}

 // Top 10 names
 function fetch_top_names($pdo) {
   $topNameStmt = $pdo->prepare('SELECT name, SUM(count) as total_count from names 
   GROUP BY name
   ORDER by total_count DESC
   limit 10');
   $topNameStmt->execute();

    return $topNameStmt->fetchAll(PDO::FETCH_ASSOC);
}

