<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Platelet Donation Form</title>
    <!-- Add your CSS links if needed -->
</head>

<body>
    <h1>Platelets Donation Form</h1>

    <form name="platelet_donor" action="saveplateletdata.php" method="post">
        <label for="fullname">Full Name<span style="color:red">*</span></label>
        <input type="text" name="fullname" required><br>

        <label for="mobileno">Mobile Number<span style="color:red">*</span></label>
        <input type="text" name="mobileno" required><br>

        <label for="emailid">Email Id</label>
        <input type="email" name="emailid"><br>

        <label for="age">Age<span style="color:red">*</span></label>
        <input type="text" name="age" required><br>

        <label for="gender">Gender<span style="color:red">*</span></label>
        <select name="gender" required>
            <option value="">Select</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select><br>

        <label for="blood">Blood Group<span style="color:red">*</span></label>
        <select name="blood" required>
            <option value="" selected disabled>Select</option>
            <?php
            // Include the connection file
            include 'conn.php';

            $sql = "select * from blood";
            $result = mysqli_query($conn, $sql) or die("query unsuccessful.");

            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <option value=" <?php echo $row['blood_id'] ?>"> <?php echo $row['blood_group'] ?> </option>
            <?php } ?>
        </select><br>

        <label for="address">Address<span style="color:red">*</span></label>
        <textarea name="address" required></textarea><br>

        <label for="weight">Weight (kg)<span style="color:red">*</span></label>
        <input type="text" name="weight" required><br>

        <label for="hemoglobin">Hemoglobin Level<span style="color:red">*</span></label>
        <input type="text" name="hemoglobin" required><br>

        <label for="interval">Time Interval (months)<span style="color:red">*</span></label>
        <input type="text" name="interval" required><br>

        <label for="health_conditions">Health Conditions<span style="color:red">*</span></label>
        <input type="text" name="health_conditions" required><br>

        <label for="medication">Medication<span style="color:red">*</span></label>
        <input type="text" name="medication" required><br>
        <label for="platelet_count">Platelet Count (lakh per microliter)<span style="color:red">*</span></label>
            <input type="text" name="platelet_count" required><br>

        <input type="submit" name="submit" value="Submit">
    </form>
</body>

</html>
