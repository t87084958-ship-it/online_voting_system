<?php
include "db.php";

if (isset($_POST['add_candidate'])) {
    $name = $_POST['candidate_name'];
    $party = $_POST['candidate_party'];

    mysqli_query($conn, "INSERT INTO candidates (name, party) VALUES ('$name', '$party')");
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Candidate</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>
<div class="container">
    <h2>Add Candidate</h2>
    <form method="POST" onsubmit="return validateCandidateForm();">
        <input type="text" id="candidate_name" name="candidate_name" placeholder="Candidate Name">
        <input type="text" id="candidate_party" name="candidate_party" placeholder="Party">
        <button type="submit" name="add_candidate">Add Candidate</button>
    </form>
</div>
</body>
</html>
