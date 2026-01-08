<?php
include "db.php";

if (isset($_GET['type']) && isset($_GET['id'])) {
    $id = $_GET['id'];
    $type = $_GET['type'];

    if ($type == "candidate") {
        mysqli_query($conn, "DELETE FROM candidates WHERE id=$id");
    } elseif ($type == "voter") {
        mysqli_query($conn, "DELETE FROM voters WHERE id=$id");
    }
}

header("Location: index.php");
exit;
?>
