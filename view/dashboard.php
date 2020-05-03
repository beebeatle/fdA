<?php
$displayName=$member->getMemberById($_SESSION["userId"]);

?>

<html>
<head>
    <title>User Login</title>
    <link href="./view/css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div>
    <div class="dashboard">
        <div class="member-dashboard">Welcome <b><?php echo $displayName; ?></b>, You have successfully logged in
            <br>	<a href="./?page=add">Add</a>
            <br>	<a href="./?page=view">View</a>
            <br>	<a href="./logout.php" class="logout-button">Logout</a>
        </div>
    </div>
</div>
</body>
</html>