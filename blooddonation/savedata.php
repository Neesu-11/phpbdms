<?php
$name = $_POST['fullname'];
$number = $_POST['mobileno'];
$email = $_POST['emailid'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$blood_group = $_POST['blood'];
$address = $_POST['address'];

// Check for disqualifying conditions
$disqualifications = array(
    'cancer', 'heart_condition', 'blood_products_after_1980',
    'HIV_positive', 'organ_transplant', 'hepatitis_B', 'hepatitis_C'
);

$disqualified = false; // Initialize the disqualified flag

foreach ($disqualifications as $condition) {
    if (isset($_POST[$condition]) && $_POST[$condition] === 'on') {
        $disqualified = true;
        break; // If any disqualification condition is met, exit the loop
    }
}

if ($disqualified) {
    // Display a JavaScript popup message and redirect back to the form
    echo '<script>alert("You are not eligible to donate blood."); window.location.href = "http://localhost/blooddonation/home.php";</script>';
} else {
    // Continue processing the form data and saving it to the database
    $conn = mysqli_connect("localhost", "root", "", "blood_donation") or die("Connection error");

    // Save basic donor information
    $sql = "INSERT INTO donor_details(donor_name, donor_number, donor_mail, donor_age, donor_gender, donor_blood, donor_address) VALUES ('{$name}', '{$number}', '{$email}', '{$age}', '{$gender}', '{$blood_group}', '{$address}')";
    $result = mysqli_query($conn, $sql) or die("Query unsuccessful.");
   
}