<?php
    $conn = mysqli_connect('localhost:3306', 'root', '');
    if( !$conn ){
        die('Could not connect:'. mysqli_error());
    }
    echo 'Connected Successfully!';
    mysqli_select_db($conn, 'test_db_connection');
    $query = "SELECT * FROM posts";
    $result = mysqli_query($conn, $query);
    mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    Hello World
    <?php if(mysqli_num_rows($result) > 0): ?>
        <ul>
            <?php while($row= mysqli_fetch_object($result)): ?>
                <li>
                    <?php echo $row->name; ?>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php else: ?>
        <p>No Posts</p>
    <?php endif; ?>
</body>
</html>