<html>
<body>

<?php
$students = array("Arun", "Beena", "Appu", "Radha", "Manu");
echo "<h3>Original Student List:</h3>";
print_r($students);
asort($students);
echo "<h3>Student List After asort() (Ascending):</h3>";
print_r($students);
arsort($students);
echo "<h3>Student List After arsort() (Descending):</h3>";
print_r($students)
?>

</body>
</html>

