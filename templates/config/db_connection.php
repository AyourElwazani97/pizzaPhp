<?php 
$connection = mysqli_connect("localhost" /*host*/, "ayoub"  /*username*/, "ayoub123" /*password*/, "ninjapizza" /*dbname*/);

//check connection
if (!$connection) {
    //mysqli_connect_error() => to display error of database
    echo "connection error : " . mysqli_connect_error();
}
?>