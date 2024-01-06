<?php 
    require("templates/config/db_connection.php");
    if(isset($_GET["id"])) {
        $id  = mysqli_real_escape_string($connection,$_GET["id"]);
        //make query
        $sqlQuery = "SELECT * FROM pizzas WHERE id = $id";
        //get data 
        $res = mysqli_query($connection,$sqlQuery);
        //fetch data in array format
        $data = mysqli_fetch_assoc($res);
        print_r($data);
        mysqli_free_result($res);

        mysqli_close($connection);
    }
?>

<!DOCTYPE html>
<html lang="en">
    <?php include("templates/header.php") ?>
    <h2>Details</h2>
    <?php include("templates/footer.php") ?>
</html>