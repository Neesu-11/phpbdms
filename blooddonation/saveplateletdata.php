<?php
$name = $_POST['fullname'];
$number = $_POST['mobileno'];
$email = $_POST['emailid'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$blood_group = $_POST['blood'];
$address = $_POST['address'];

// Check for platelets and plasma donation criteria
$weight = $_POST['weight'];
$hemoglobin_level = $_POST['hemoglobin'];
$interval = $_POST['interval'];
$health_conditions = $_POST['health_conditions'];
$medication = $_POST['medication'];
$platelet_count = $_POST['platelet_count'];

$eligible = true; // Initialize the eligibility flag

// Check criteria for platelets and plasma donation
if ($weight < 55 || $hemoglobin_level < 12.5 || $age < 18 || $age > 65 || $interval < 3 || empty($health_conditions) || empty($medication)|| $platelet_count <= 1.5) {
    $eligible = false;
}

if (!$eligible) {
    // Display a JavaScript popup message and redirect back to the form
    echo '<script>alert("You are not eligible to donate platelets."); window.location.href = "http://localhost/blooddonation/platelet_form.php";</script>';
} else {
    // Continue processing the form data and saving it to the platelet donor table in the database
    $conn = mysqli_connect("localhost", "root", "", "blood_donation") or die("Connection error");

    // Save platelet donor information
    $sql = "INSERT INTO platelet_donor_details(donor_name, donor_number, donor_mail, donor_age, donor_gender, donor_blood, donor_address, weight, hemoglobin_level, interval_time, health_condition, medication,plat_count) VALUES ('{$name}', '{$number}', '{$email}', '{$age}', '{$gender}', '{$blood_group}', '{$address}', '{$weight}', '{$hemoglobin_level}', '{$interval}', '{$health_conditions}', '{$medication}','{$platelet_count}')";
    $result = mysqli_query($conn, $sql) or die("Query unsuccessful.");
    
    // You can add any additional processing or redirection as needed
}
?>
