<?php

include_once __ROOT__ . "/MODEL/UserDB.php";

$smth = new UserDB();
$users = $smth->selectAll();

?>

<html lang="en">
<head>
    <title>Users</title>

</head>
<body>
<table border="true">
    <thead>
    <tr>
        <th>User name</th>
        <th>Image</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>

        <?php
    session_start();
    echo "Welcome, " . $_SESSION['user'] . "!";

    foreach ($users as $row) :

        ?>
    <br>
    <tr>

        <td>
            <?php echo $row['user_name'] ?>
        </td>

        <td>
            <img width="100" src="<?php if($row['image']){
                echo '../../uploads/'. $row['image'];
            }else {
                echo '../../uploads/default.png';
            }  ?>" alt="">
        </td>

        <td>
            <button id=<?php echo $row['id'] ?> class="deleter" > DELETE  </button>
            <a href="/index.php/users/update?id=<?php echo $row['id'] ?>"><button id=<?php echo $row['id'] ?> class="updater" > EDIT </button></a>
            <?php $check = new UserDB(); if(!$check -> checkadmin($row['user_name'])){
                echo "<button id='".$row['id']." 'class='adminmaker'> GIVE ADMIN PRIVILEGES </button>";
            } ?>

        </td>



    </tr>


<?php endforeach; ?>
    </tbody>
</table>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="../../VIEW/JS/actionScript.js"></script>
</body>

</html>

