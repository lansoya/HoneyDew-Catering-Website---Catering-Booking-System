<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HoneyDew Cater</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            padding: 0;
            background-size: cover;
            background-image: url('depositphotos_466180204-stock-photo-image-blur-people-buffet-catering.jpg');
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 15px;
            text-align: center;
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

        h3 {
            text-align: center;
            background-color: #343a40; /* Dark charcoal background color for the subtitle */
            color: #fff; /* White text color for the subtitle */
            font-weight: bold; /* Make the subtitle bold */
            font-size: 18px; /* Adjust the font size of the subtitle */
            margin-bottom: 20px;
            padding: 10px; /* Added padding for better visibility */
            border-radius: 5px; /* Rounded corners for the subtitle */
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

        button {
            background-color: #de830b;
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
</head>
<body style="background-image: url('depositphotos_466180204-stock-photo-image-blur-people-buffet-catering.jpg');">

<header>
    <div class="logo-1"> 
        <img class="logo" src="honeydewlogo.png" alt="Honeydew Catering Logo">
        <h1>Honeydew Catering</h1>
    </div>    
    <nav>
        <ul class="navigation-1">
            <li><a href="frontpage.php#home">Home</a></li>
            <li><a href="frontpage.php#about">About</a></li>
            <li><a href="frontpage.php#quote">Quotes</a></li>
            <li><a href="frontpage.php#ocassion">Occasion</a></li>
        </ul>
    </nav>
    <a class="cta" href="cateringform.php"><button>Booking Now!</button></a>
    <a class="cta" href="show_order.php"><button>Show Order</button></a>
</header>

<div class="container">
    <h2 class="form-title">Catering Service Booking Form</h2>

    <form action="reg_catering.php" method="POST" class="booking-form">

        <div class="form-segment">
            <h3>Event Details</h3>
             <label for="occasion">Occasion</label>
            <select id="occasion" name="occasion" onchange="checkOther(this)">
                <option value="Wedding">Wedding</option>
                <option value="Reunion">Reunion</option>
                <option value="Birthday">Birthday</option>
                <option value="Aqiqah">Aqiqah</option>
                <option value="Cukur Bayi">Cukur Bayi</option>
                <option value="Anniversaries">Anniversaries</option>
                <option value="FamilyDay">Family Day</option>
                <option value="Engagement">Engagement</option>
                <option value="Holiday Parties">Holiday Parties</option>
                <option value="Funerals">Funerals</option>
                <option value="Other">Other</option>
            </select>
            
            <input type="text" id="otherOccasion" name="otherOccasion" style="display: none;" placeholder="Please specify">

            <label for="event_date">Event Date</label>
            <input type="date" id="event_date" name="event_date" required>

            <label for="event_time">Event Time</label>
            <input type="time" id="event_time" name="event_time" required>

            <label for="event_budget">Budget/Pax (RM)</label>
            <input type="text" id="event_budget" name="event_budget" oninput="updateTotalBudget()" required>

            <label for="no_of_pax">Number of Pax</label>
            <input type="text" id="no_of_pax" name="no_of_pax" oninput="updateTotalBudget()" required>
            <br>

            <label for="total_budget">Total budget</label>
            <input type="text" id="total_budget" name="total_budget" readonly required>

            <label for="event_address">Event Address</label>
            <textarea type="text" id="event_address" name="event_address" rows="3" cols="10" required></textarea>

            <label for="location">Location</label>
            <?php
            $location = array('Kuala Lumpur' => 'Kuala Lumpur', 'Selangor' => 'Selangor');
            echo '<select name="location">';
            foreach ($location as $key => $value) {
                echo "<option value=\"$key\">$value</option>\n";
            }
            echo '</select>';
            ?>

            <h3>Contact Details</h3>
            <label for="contact_person">Contact Person</label>
            <input type="text" id="contact_person" name="contact_person" required>

            <label for="contact_number">Contact Number</label>
            <input type="tel" id="contact_number" name="contact_number" required>

            <label for="company_name">Company Name</label>
            <input type="text" id="company_name" name="company_name" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>

        <!-- Other Details -->
        <div class="form-segment">
            <h3>Other Details</h3
            <label for="special_request">Special Requests</label><br>
            <textarea id="special_request" name="special_request" rows="4" cols="50"></textarea><br>

            <label for="promo_code">Promo Code</label>
            <input type="text" id="promo_code" name="promo_code">

            <!-- Subscribe to Newsletter -->
            <label for="subscribe">Subscribe to our newsletter
                <input type="checkbox" id="subscribe" name="subscribe" value="newsletter" checked>
            </label>
            <br>

            <p style="color: black;">Note: In the event your chosen caterer is not available, we will assist in forwarding your request to other caterers.</p>
        </div> 

        <input type="submit" name="btn_submit" value="Submit for FREE Quote">
        <input type="reset" name="btn_reset" value="Reset">
    </form>
</div>
        </div>

        </div>

    

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

</body>
</html>
