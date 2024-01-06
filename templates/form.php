<?php
include("config/db_connection.php");
/*
$errors = array("email"=>"","title"=>"","ingredients"=>"");
   if(isset($_GET["submit"])) {
        echo $_GET["email"];
        echo $_GET["title"];
        echo $_GET["ingredients"];
    }
    */
//using POST method
$errors = array("email" => "", "title" => "", "ingredients" => "");
if (isset($_POST["submit"])) {
    echo $_POST["email"];
    echo $_POST["title"];
    //echo htmlspecialchars($_POST["ingredients"]); //htmlspec... is used to prevent XSS attacks
    //form validation
    if (empty($_POST["email"]) || empty($_POST["title"])) {
        echo "please fill all the fields";
    } else {
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            //echo "invalid mail";
            $errors["email"] = "ooops something went wrong" . "<br/>";
            //FILTER_VALIDATE_EMAIL its a filter for email
        }
        if (array_filter($errors)) {
            echo "there is errors";
        } else {
            //redirect user => header('location:index.php');
            //submitting data
            $email = mysqli_escape_string($connection, $_POST["email"]);
            $title = mysqli_escape_string($connection, $_POST["title"]);
            $ingredients = mysqli_escape_string($connection, $_POST["ingredients"]);
        
            //create sql
            $sql = "INSERT INTO pizzas(title,email,ingredients) VALUES('$title','$email','$ingredients')";
        
            //save todb and check
            if (mysqli_query($connection, $sql)) {
            header('location:index.php');
            } else {
                echo "connection error : " . mysqli_error($connection);
            }
        }
    }
}
//if success and no error let's redirect the user
//array_filter($errors) this method is for checking if there is no erros in our array since array if empty is good


?>
<section class="container grey-text">
    <h4 class="center">
        Add a pizza
    </h4>
    <form action="add.php" class="white" method="POST">
        <div class="red-text">
            <?php
            echo $errors["email"]
            ?>
        </div>
        <label>Email : </label>
        <input type="text" name="email">
        <label>Pizza Title : </label>
        <input type="text" name="title">
        <label>Ingredients : </label>
        <input type="text" name="ingredients">
        <div class="center">
            <input type="submit" value="submit" name="submit" class="btn brand z-depth-0">
        </div>
    </form>
</section>