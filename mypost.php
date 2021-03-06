<?php
/**
 * Author: jay
 * Date: 3/3/15
 * Time: 4:51 PM
 */

require_once "inc/global.inc.php";

if(!isset($_SESSION['user'])) {
    header("Location: index.php");
}

$ph = new PostsHandler();
$user = unserialize($_SESSION['user']);
$uid = $user->id;
$posts = $ph->fetchUserPost($uid);

?>

<!doctype html>

<html>
<head>

    <meta charset="utf-8">
    <title>
        My Posts | Mippsy
    </title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script type="text/javascript" src="pp.js"></script>
</head>

<body>
<div id="wrapper">
    <div id="header">
        <?php
        $page = $_SERVER['PHP_SELF'];
        include "inc/menu.php";
        ?>
    </div>
    <div id="content">
        <br>
        <center>
            <h1>My Posts</h1>
            <table id="Posts">
                <?php
                    $len = sizeof($posts);
                    for ($i = 0; $i < $len; $i++) {
                        echo "<tr>";
                        echo "<td>".$i."</td>";
                        echo "<td>"."<a href='post.php?id=".$posts[$i]['id']."'>".$posts[$i]['fname']." ".$posts[$i]['lname']."</a>" ."</td>";
                        echo "<td>".$posts[$i]['age']."<td>";
                        echo "<td>".$posts[$i]['gender']."<td>";
                        echo "<td>".$posts[$i]['date']."<td>";
                        echo "</tr>";
                    }
                ?>
            </table>
        </center>
    </div>
    <div id="footer">
        <?php include "inc/footer.php"; ?>
    </div>
</div>
</body>

</html>
