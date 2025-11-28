<?php
$name = $email = $password = $confirm_password = $phone = "";
$errors = [];

function clean($d){ return htmlspecialchars(trim($d)); }

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = clean($_POST["name"] ?? "");
    if (!$name) $errors['name'] = "Name is required";
    elseif (!preg_match("/^[a-zA-Z ]+$/", $name))
        $errors['name'] = "Only letters and spaces allowed";

    $email = clean($_POST["email"] ?? "");
    if (!$email) $errors['email'] = "Email is required";
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))
        $errors['email'] = "Invalid email format";

    $phone = clean($_POST["phone"] ?? "");
    if (!$phone) $errors['phone'] = "Phone is required";
    elseif (!preg_match("/^[0-9]{10,15}$/", $phone))
        $errors['phone'] = "Phone must be 10–15 digits";

    $password = clean($_POST["password"] ?? "");
    if (!$password) $errors['password'] = "Password required";
    elseif (strlen($password) < 6)
        $errors['password'] = "Min 6 characters";

    $confirm_password = clean($_POST["confirm_password"] ?? "");
    if ($confirm_password !== $password)
        $errors['confirm_password'] = "Passwords do not match";

    if (!$errors) {
        echo "<h2 style='color:green;text-align:center;'>Registration Successful!</h2>";

        // CLEAR FORM FIELDS
        $name = $email = $phone = $password = $confirm_password = "";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Registration Form</title>
<style>
    .error { color:red; }
    form { width:350px; margin:auto; }
    input { width:100%; padding:7px; margin:10px 0; }
</style>
</head>

<body>

<h2 style="text-align:center;color:blue;">Registration Form</h2>

<form method="POST">

<label>Name:</label>
<input type="text" name="name" value="<?= $name ?>">
<span class="error"><?= $errors['name'] ?? '' ?></span>

<label>Email:</label>
<input type="text" name="email" value="<?= $email ?>">
<span class="error"><?= $errors['email'] ?? '' ?></span>

<label>Phone:</label>
<input type="text" name="phone" value="<?= $phone ?>">
<span class="error"><?= $errors['phone'] ?? '' ?></span>

<label>Password:</label>
<input type="password" name="password">
<span class="error"><?= $errors['password'] ?? '' ?></span>

<label>Confirm Password:</label>
<input type="password" name="confirm_password">
<span class="error"><?= $errors['confirm_password'] ?? '' ?></span>

<input type="submit" value="Register" style="background:pink;">

</form>

</body>
</html>
