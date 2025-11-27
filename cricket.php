<html>
<body bgcolor="lavender">
<h2><u>STARTING XI</u></h2>

<?php
$name = ["ROHIT SHARMA","MS DHONI","VIRAT KOHLI","BUMRAH","DINESH","RISHAB"];
$position = ["BATSMAN","WICKET-KEEPER","BATSMAN","BOWLER","ALL-ROUNDER","ALL-ROUNDER"];

echo "<table border='2' cellpadding='5'>
<tr>
    <th>Sl No.</th>
    <th>Player</th>
    <th>Position</th>
</tr>";

for ($i = 0; $i < count($name); $i++) {
    $sl = $i + 1;
    echo "<tr>
            <td>$sl</td>
            <td>{$name[$i]}</td>
            <td>{$position[$i]}</td>
          </tr>";
}

echo "</table>";
?>
</body>
</html>

