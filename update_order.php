<?php
session_start();
require_once('db_catering.php');

if (isset($_GET['order_id'])) {
    $order_id = $_GET["order_id"];

    $sql = "SELECT * FROM orders WHERE ID='$order_id'";
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $order_id = $row['ID'];
            $occasion = $row['Occasion'];
            $event_date = $row['EventDate'];
            $event_time = $row['EventTime'];
            $event_budget = $row['BudgetPerPax'];
            $no_of_pax = $row['NumberOfPax'];
            $total_budget = $row['TotalBudget'];
            $event_address = $row['EventAddress'];
            $location = $row['Location'];
            $contact_person = $row['ContactPerson'];
            $company_name = $row['CompanyName'];
            $contact_number = $row['ContactNumber'];
            $email = $row['Email'];
            $special_request = $row['SpecialRequests'];
            $promo_code = $row['PromoCode'];
        }
    }
}

if (isset($_POST['btn_update'])) {
    $order_id = $_POST['order_id'];
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

    $sql = "UPDATE orders 
            SET ID='$order_id',
                Occasion='$occasion',
                EventDate='$event_date',
                EventTime='$event_time', 
                BudgetPerPax='$event_budget',
                NumberOfPax='$no_of_pax', 
                TotalBudget='$total_budget', 
                EventAddress='$event_address', 
                Location='$location',
                ContactPerson='$contact_person', 
                CompanyName='$company_name', 
                ContactNumber='$contact_number', 
                Email='$email', 
                SpecialRequests='$special_request', 
                PromoCode='$promo_code'
                WHERE ID='$order_id'";

    if (mysqli_query($connection, $sql)) {
        $_SESSION['msg_update'] = "Success! Order details have been updated";
        header('Location: show_order.php');
        exit();
    } else {
        echo "Something went wrong... ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            padding: 0;
            background-size: cover;
            background-image: url('images.jpeg');
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 15px;
            text-align: center;
        }

        .logo {
            width: 50px;
            height: auto;
        }

        .navigation-1 {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .navigation-1 li {
            display: inline-block;
            margin-right: 20px;
        }

        .navigation-1 a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            font-size: 16px;
        }

        .cta {
            margin-left: 20px;
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

        button {
            background-color: #c22f3d;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            font-size: 16px;
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

        .form-title {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .form-segment {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        .form-segment h3 {
            margin-bottom: 10px;
        }

        .form-buttons {
            text-align: center;
        }

        input[type="submit"],
        input[type="reset"] {
            margin-right: 10px;
        }
    </style>
    <script>
    function checkOther(select) {
        var otherInput = document.getElementById("otherOccasion");
        if (select.value == "Other") {
            otherInput.style.display = "block";
        } else {
            otherInput.style.display = "none";
        }
    }

    function updateTotalBudget() {
        var budgetPerPerson = parseFloat(document.getElementById("event_budget").value) || 0;
        var numberOfPeople = parseInt(document.getElementById("no_of_pax").value) || 0;
        var totalBudget = budgetPerPerson * numberOfPeople;
    
        // Update the total budget field
        document.getElementById("total_budget").value = totalBudget.toFixed(2);
    }
    </script>
</head>

<body>
    <div class="container">
        <h2>Order Catering update Form</h2>
        <p>Please update your order</p><br>

        <form action="" method="post">

            <div class="form-group">
                <label for="occasion">Occasion</label>
                <select id="occasion" name="occasion" onchange="checkOther(this)">
                    <option value="Wedding" <?php if ($occasion == 'Wedding') echo 'selected'; ?>>Wedding</option>
                    <option value="Reunion" <?php if ($occasion == 'Reunion') echo 'selected'; ?>>Reunion</option>
                    <option value="Birthday" <?php if ($occasion == 'Birthday') echo 'selected'; ?>>Birthday</option>
                    <option value="Aqiqah" <?php if ($occasion == 'Aqiqah') echo 'selected'; ?>>Aqiqah</option>
                    <option value="Cukur Bayi" <?php if ($occasion == 'Cukur Bayi') echo 'selected'; ?>>Cukur Bayi</option>
                    <option value="Anniversaries" <?php if ($occasion == 'Anniversaries') echo 'selected'; ?>>Anniversaries</option>
                    <option value="FamilyDay" <?php if ($occasion == 'FamilyDay') echo 'selected'; ?>>Family Day</option>
                    <option value="Engagement" <?php if ($occasion == 'Engagement') echo 'selected'; ?>>Engagement</option>
                    <option value="Holiday Parties" <?php if ($occasion == 'Holiday Parties') echo 'selected'; ?>>Holiday Parties</option>
                    <option value="Funerals" <?php if ($occasion == 'Funerals') echo 'selected'; ?>>Funerals</option>
                    <option value="Other" <?php if ($occasion == 'Other') echo 'selected'; ?>>Other</option>
                </select>
                <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
            </div>

            <div class="form-group">
                <label for="event_date">Event Date</label>
                <input type="date" id="event_date" name="event_date" required value="<?php echo $event_date; ?>">
            </div>

            <div class="form-group">
                <label for="event_time">Event Time</label>
                <input type="time" id="event_time" name="event_time" required value="<?php echo $event_time; ?>">
            </div>

            <div class="form-group">
                <label for="event_budget">Budget/Pax (RM)</label>
                <input type="text" id="event_budget" name="event_budget" oninput="updateTotalBudget()" required value="<?php echo $event_budget; ?>">
            </div>

            <div class="form-group">
                <label for="no_of_pax">Number of Pax</label>
                <input type="text" id="no_of_pax" name="no_of_pax" oninput="updateTotalBudget()" required value="<?php echo $no_of_pax; ?>">
            </div>

            <div class="form-group">
                <label for="total_budget">Total budget</label>
                <input type="text" id="total_budget" name="total_budget" readonly required value="<?php echo $total_budget; ?>">
            </div>

            <div class="form-group">
                 <label for="event_address">Event Address</label>
                 <textarea type="text" id="event_address" name="event_address" rows="3" cols="10" required><?php echo $event_address; ?></textarea>
            </div>

            <div class="form-group">
                <label for="location">Location</label>
                <?php
                $locations = array('Kuala Lumpur' => 'Kuala Lumpur', 'Selangor' => 'Selangor');
                echo '<select name="location">';
                foreach ($locations as $key => $value) {
                    echo "<option value=\"$key\"";
                    if ($location == $key) echo ' selected';
                    echo ">$value</option>\n";
                }
                echo '</select>';
                ?>
            </div>

            <div class="form-group">
                <label for="contact_person">Contact Person</label>
                <input type="text" id="contact_person" name="contact_person" required value="<?php echo $contact_person; ?>">
            </div>

            <div class="form-group">
                <label for="contact_number">Contact Number</label>
                <input type="tel" id="contact_number" name="contact_number" required value="<?php echo $contact_number; ?>">
            </div>

            <div class="form-group">
                <label for="company_name">Company Name</label>
                <input type="text" id="company_name" name="company_name" value="<?php echo $company_name; ?>">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required value="<?php echo $email; ?>">
            </div>

            <br>

            <button type="submit" name="btn_update" class="btn btn-primary">Update </button>
            <button type="reset" name="btn_reset" class="btn btn-primary">Reset </button>
            <a class="btn btn-primary" href="show_order.php"> Show Order </a>
        </form>
    </div>
</body>
</html>
