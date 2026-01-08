<?php
include "db.php";

if (isset($_POST['add_voter'])) {
    $name = $_POST['voter_name'];
    $email = $_POST['voter_email'];

    mysqli_query($conn, "INSERT INTO voters (full_name, email) VALUES ('$name', '$email')");
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Voter</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>
<div class="container">
    <h2>Add Voter</h2>
    <form method="POST" onsubmit="return validateVoterForm();">
        <input type="text" id="voter_name" name="voter_name" placeholder="Voter Name">
        <input type="email" id="voter_email" name="voter_email" placeholder="Email">
        <button type="submit" name="add_voter">Add Voter</button>
    </form>
</div>
</body>
</html>
