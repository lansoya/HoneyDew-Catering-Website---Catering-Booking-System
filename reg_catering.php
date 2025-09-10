<?php
session_start();

// 1. connect to database
require_once('db_catering.php');

echo "Dadadadda";

// register button
if(isset($_POST['btn_submit'])) {

	$occasion = $_POST['occasion'];
	$event_date = $_POST['event_date'];
	$event_time = $_POST['event_time'];
	$event_budget = $_POST['event_budget'];
	$no_of_pax = $_POST['no_of_pax'];
	$total_budget = $_POST['total_budget'];
	$event_address = $_POST['event_address'];
	$location = $_POST['location'];
	$contact_person = $_POST['contact_person'];
	$company_name = $_POST['company_name'];
	$contact_number = $_POST['contact_number'];
	$email = $_POST['email'];
	$special_request = $_POST['special_request'];
	$promo_code = $_POST['promo_code'];

	// 2. insert the data into the table users - using SQL statement
	$sql = "INSERT INTO orders(Occasion, EventDate, EventTime, BudgetPerPax, NumberOfPax, TotalBudget, EventAddress, Location, ContactPerson, ContactNumber, CompanyName, Email, SpecialRequests, PromoCode) VALUES ('$occasion', '$event_date', '$event_time', '$event_budget', '$no_of_pax', '$total_budget', '$event_address', '$location', '$contact_person', '$contact_number', '$company_name', '$email', '$special_request', '$promo_code')";

	// 3. execute/run the sql statement
	if (mysqli_query($connection, $sql)) {
		// if no error
		// echo "New record has been succesfully created";
		$_SESSION['msg_create'] = "New order has been succesfully placed.";
		header("Location:show_order.php");
		echo "New order has been succesfully created";
	} else {
		echo "Failed to saved the order".mysqli_error($connection);
	}

	// 3. close the db connection
	mysqli_close($connection);

}

?>