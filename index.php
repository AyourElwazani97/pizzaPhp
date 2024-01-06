<?php 
//connect to database
$connection = mysqli_connect("localhost" /*host*/,"ayoub"  /*username*/,"ayoub123" /*password*/,"ninjapizza" /*dbname*/);

//check connection
if(!$connection) {
    //mysqli_connect_error() => to display error of database
    echo "connection error : " . mysqli_connect_error();
}

//write query for all pizzas
$sql = "SELECT title,id,ingredients FROM pizzas ORDER BY created_at"; // SELECT * used to select all from our table pizzas
//OREDER BY its for ordering data 
//make query and get results

$res = mysqli_query($connection, $sql);

//fetch results as an array

$pizzas = mysqli_fetch_all($res ,MYSQLI_ASSOC);

mysqli_free_result($res);

//close connection
mysqli_close($connection);

print_r($pizzas);


?>

<!DOCTYPE html>
<html lang="en">

<?php 
    @include("./templates/header.php");
    @include("./templates/footer.php");
?>
</html>