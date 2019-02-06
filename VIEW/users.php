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

    <?php foreach ($users as $row) :?>

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

        </td>
    </tr>


<?php endforeach; ?>
    </tbody>
</table>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="../../VIEW/JS/deleteScript.js"></script>
</body>

</html>

