<?php
require_once '__bootstrap.php';

$connected = false;
$_SESSION['password'] = [];

if(!empty($_GET['password']) && ($_GET['password']=='aze')){
    $connected = true;
}
if($_SESSION['password'] === 'aze'){
    $connected = true;
}
if(!$connected){
    exit('VOUS NE PASSEREZ PAS Mister CAAAAT!');
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
</head>
<body>
<h1>Admin</h1>

<ul class="list-group">
    <li class="list-group-item"><?php $rooms = RoomQuery::findAllWithTypes(); ?></li>

</ul>
</body>
</html>
