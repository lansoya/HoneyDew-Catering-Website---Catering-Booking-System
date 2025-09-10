<?php 

session_start();

require_once('db_catering.php');

// retrieve the value of user_id from show_user.php
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    // create sql statement
    $sql = "DELETE FROM orders WHERE ID='$order_id'";

    // execute the sql
    if(mysqli_query($connection, $sql)) {
        // display a message to users
            $_SESSION['msg_delete'] = "Successfully deleted Order details!";
            //echo "Successfully updated user details!";
            header('Location:show_order.php');
        }else {
            $_SESSION['msg_delete'] = "Something went wrong! Delete order was not successful";
        }
    }


?>