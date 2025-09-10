<?php
session_start();
require_once('db_catering.php');
?>

<html>
<head>
    <title> Retrieve Users </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>


<?php
// display message from $_SESSION
if (isset($_SESSION['msg_create'])) {
    ?>
    <div class="alert alert-success">
    <strong>Success!</strong>
    <?php
    echo $_SESSION['msg_create'];
    unset($_SESSION['msg_create']); 
}

if (isset($_SESSION['msg_update'])) {
    ?>
    <div class="alert alert-success">
    <strong>Success!</strong>
    <?php
    echo $_SESSION['msg_update'];
    unset($_SESSION['msg_update']);
}

if (isset($_SESSION['msg_delete'])) {
    ?>
    <div class="alert alert-success">
    <strong>Success!</strong>
    <?php
    echo $_SESSION['msg_delete'];
    unset($_SESSION['msg_delete']);
}
?>
</div>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Retrieve Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            padding: 0;
            background-size: cover;
            background-image: url('images (4).jpeg');
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            overflow: hidden;
        }

        h2 {
            text-align: center;
            background-color: #de830b; 
            color: #fff;
            padding: 15px; /* Added padding for better visibility */
            margin-bottom: 20px; /* Added margin for separation from content */
            border-radius: 10px; /* Rounded corners for the title */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); /* Added text shadow for better visibility */
        }

        p {
            text-align: center;
            background-color: #343a40; /* Dark charcoal background color for the subtitle */
            color: #fff; /* White text color for the subtitle */
            font-weight: bold; /* Make the subtitle bold */
            font-size: 18px; /* Adjust the font size of the subtitle */
            margin-bottom: 20px;
            padding: 10px; /* Added padding for better visibility */
            border-radius: 5px; /* Rounded corners for the subtitle */
        }

        .btn-primary {
            background-color: #cf362b; /* Blue color for primary buttons */
            color: #fff;
        }

        .btn-success {
            background-color: #28a745; /* Green color for success buttons */
            color: #fff;
        }

        .btn-primary,
        .btn-success {
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse; /* Collapse borders to remove default spacing */
            margin-bottom: 20px; /* Added margin for better separation */
        }

        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd; /* Added border to separate each cell */
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Order Details</h2>
        <p>List of all Booking Catering</p><br>

        <a class="btn btn-primary" href="frontpage.php">Return to the front page</a><br><br>
        <a class="btn btn-primary" href="cateringform.php">Return to the registration form</a><br><br>

        <table class="table">
            <thead>
                <tr>
                    <th>order_id</th>
                    <th>contact_person</th>
                    <th>contact_no</th>
                    <th>num_pax</th>
                    <th>event_date</th>
                    <th>location</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM orders";
                $result = mysqli_query($connection, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <tr>
                            <td><?php echo $row['ID']; ?></td>
                            <td><?php echo $row['ContactPerson']; ?></td>
                            <td><?php echo $row['ContactNumber']; ?></td>
                            <td><?php echo $row['NumberOfPax']; ?></td>
                            <td><?php echo $row['EventDate']; ?></td>
                            <td><?php echo $row['Location']; ?></td>
                            <td>
                                <a class="btn btn-success" href="update_order.php?order_id=<?php echo $row['ID']; ?>">Update</a>
                                <a class="btn btn-primary" href="delete_order.php?order_id=<?php echo $row['ID']; ?>">Delete</a>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
