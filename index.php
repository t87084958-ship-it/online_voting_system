<?php
include "db.php";

// Record a vote
if (isset($_POST['vote'])) {
    $voter_id = $_POST['voter_id'];
    $candidate_id = $_POST['candidate_id'];

    // Check if voter has already voted
    $check = mysqli_query($conn, "SELECT * FROM votes WHERE voter_id='$voter_id'");
    if (mysqli_num_rows($check) == 0) {
        mysqli_query($conn, "INSERT INTO votes (voter_id, candidate_id) VALUES ('$voter_id','$candidate_id')");
        $message = "Vote recorded successfully!";
    } else {
        $message = "Voter has already voted!";
    }
}

// Fetch candidates
$candidates = mysqli_query($conn, "SELECT * FROM candidates");

// Fetch voters
$voters = mysqli_query($conn, "SELECT * FROM voters");

// Fetch vote tally
$votes = mysqli_query($conn, "SELECT c.id, c.name, c.party, COUNT(v.id) as vote_count 
    FROM candidates c LEFT JOIN votes v ON c.id = v.candidate_id 
    GROUP BY c.id");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Online Voting System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Online Voting System</h2>

    <?php if(isset($message)) { echo "<p style='color:green;'>$message</p>"; } ?>

    <!-- Voting Form -->
    <form method="POST">
        <select name="voter_id" required>
            <option value="">Select Voter</option>
            <?php while($v = mysqli_fetch_assoc($voters)) { ?>
                <option value="<?php echo $v['id']; ?>"><?php echo $v['full_name']; ?></option>
            <?php } ?>
        </select>

        <select name="candidate_id" required>
            <option value="">Select Candidate</option>
            <?php while($c = mysqli_fetch_assoc($candidates)) { ?>
                <option value="<?php echo $c['id']; ?>"><?php echo $c['name'] . " (" . $c['party'] . ")"; ?></option>
            <?php } ?>
        </select>

        <button type="submit" name="vote">Vote</button>
    </form>

    <!-- Vote Results -->
    <h3>Vote Results</h3>
    <table>
        <tr>
            <th>Candidate</th>
            <th>Party</th>
            <th>Votes</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($votes)) { ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['party']; ?></td>
            <td><?php echo $row['vote_count']; ?></td>
        </tr>
        <?php } ?>
    </table>

    <h3>Manage Candidates & Voters</h3>
    <a href="add_candidate.php">Add Candidate</a> | 
    <a href="add_voter.php">Add Voter</a>
</div>
</body>
</html>
