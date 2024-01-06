<?php
//connect to database
$connection = mysqli_connect("localhost" /*host*/, "ayoub"  /*username*/, "ayoub123" /*password*/, "ninjapizza" /*dbname*/);

//check connection
if (!$connection) {
    //mysqli_connect_error() => to display error of database
    echo "connection error : " . mysqli_connect_error();
}

//write query for all pizzas
$sql = "SELECT title,id,ingredients FROM pizzas ORDER BY created_at"; // SELECT * used to select all from our table pizzas
//OREDER BY its for ordering data 
//make query and get results

$res = mysqli_query($connection, $sql);

//fetch results as an array

$pizzas = mysqli_fetch_all($res, MYSQLI_ASSOC);

mysqli_free_result($res);

//close connection
mysqli_close($connection);

//we are going to use 3XPLOSE method to convert ingredients to array
$exp = explode(",", $pizzas[0]["ingredients"]);
//print_r($exp)

?>

<!DOCTYPE html>
<html lang="en">

<?php @include("./templates/header.php"); ?>
<h4 class="center grey-text">Pizzas !</h4>
<div class="container">
    <?php foreach ($pizzas as $pizza) { ?>
        <div class="col s2 md3">
            <div class="card z-depth-0">
                <div class="card-content center">
                    <h6>
                        <?php echo htmlspecialchars($pizza["title"]); ?>
                    </h6>
                    <div>
                        <ul>
                            <?php  foreach (explode("," , $pizza["ingredients"]) as $ing); {?>
                                <li>
                                    <?php echo htmlspecialchars($ing); ?>
                                </li>
                            <?php }?>
                        </ul>
                    </div>
                </div>
                <div class="card-action right-align">
                    <a href="#" class="brand-text">more info</a>
                </div>
            </div>
        </div>
    <?php } ?>

</div>
<?php @include("./templates/footer.php"); ?>

</html>