<!DOCTYPE html>
<html>
<head>
<title>KSEB Bill</title>
</head>
<body>

<form method="post">
    <H3>KSEB BILL GENERATOR</H3>
    Name: <input type="text" name="name" required><br>
    Consumer ID: <input type="text" name="consumerId" required><br>
    Unit Consumed: <input type="number" name="currentReading" required><br>
    <input type="submit" value="Generate">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $consumerId = $_POST["consumerId"];
    $unit = $_POST["currentReading"];

    if ($unit <= 300)       $energy = $unit * 6.40;
    elseif ($unit <= 350)  $energy = $unit * 7.25;
    elseif ($unit <= 400)  $energy = $unit * 7.60;
    elseif ($unit <= 500)  $energy = $unit * 7.90;
    else                   $energy = $unit * 8.80;

    $other = 60;
    $total = $energy + $other;

    $issued = date("d/m/Y");
    $due = date("d/m/Y", strtotime("+15 days"));
    $from = date("d/m/Y", strtotime("-2 months"));

    echo "<h3>GENERATED BILL INFO</h3>";
    echo "Name: $name<br>";
    echo "Consumer ID: $consumerId<br>";
    echo "Bill Period: $from to $issued<br>";
    echo "Issued Date: $issued<br>";
    echo "Due Date: <strong>$due</strong><br><br>";
    echo "------NA------<br>";
    echo "Units Consumed: $unit<br>";
    echo "Energy Charge: ₹" . number_format($energy, 2) . "<br>";
    echo "Other Charges: ₹" . number_format($other, 2) . "<br>";
    echo "<strong>Total Payable: ₹" . number_format($total, 2) . "</strong>";
}
?>

</body>
</html>