<?php
try {
    $dbh = new PDO('mysql:host=localhost;dbname=hotel', 'Soyz_admin', 'Soyz144166188');
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

function addNewApplication($dbh, $direction, $arrivel, $departure, $room, $adult, $children) {
    $sql = 'INSERT INTO application (direction, arrivel, departure, room, adult, children) VALUES(:dbh, :direction, :arrivel, :departure, :room, :adult, :children)';
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(":direction", $direction, PDO::PARAM_STR);
    $stmt->bindValue(":arrivel", $arrivel, PDO::PARAM_STR);
    $stmt->bindValue(":departure", $departure, PDO::PARAM_STR);
    $stmt->bindValue(":room", $room, PDO::PARAM_INT);
    $stmt->bindValue(":adult", $adult, PDO::PARAM_INT);
    $stmt->bindValue(":children", $children, PDO::PARAM_INT);
    $stmt->execute();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $direction = strip_tags(trim($_POST['data'][0]['value']));
    $arrivel = strip_tags(trim($_POST['data'][1]['value']));
    $departure = strip_tags(trim($_POST['data'][2]['value']));
    $room = strip_tags(trim($_POST['data'][3]['value']));
    $adult = strip_tags(trim($_POST['data'][4]['value']));
    $children = strip_tags(trim($_POST['data'][5]['value']));
    addNewApplication($dbh, $direction, $arrivel, $departure, $room, $adult, $children);
}
