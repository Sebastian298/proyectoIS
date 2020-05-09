<?php
try {
    include 'db_data.php';
    $pdo= new PDO("mysql:host={$db_dom};dbname={$db_name}",$db_user,$db_pass);
    
    
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>