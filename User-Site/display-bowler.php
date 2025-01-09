<?php
include '../connect.php';

$sql = "SELECT bowler.player_id, player.player_name, bowler.bowler_style 
        FROM bowler
        INNER JOIN player ON bowler.player_id = player.player_id";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.14/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Bowler Details</title>
</head>

<?php include('partials/header.php'); ?>

<body>

    <h1 class="text-center text-3xl font-extrabold p-6">Bowler Details</h1>

    <div class="overflow-x-auto">
        <table class="table w-full">
            <thead>
                <tr>
                    <th class="text-center">Player ID</th>
                    <th class="text-center">Player Name</th>
                    <th class="text-center">Bowling Style</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $player_id = $row['player_id'];
                        $player_name = $row['player_name'];
                        $bowing_style = $row['bowler_style'];  // Updated to match column name
                
                        echo "
                            <tr>
                                <td class='text-center'>$player_id</td>
                                <td class='text-center'>$player_name</td>
                                <td class='text-center'>$bowing_style</td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3' class='text-center'>No bowler data found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>