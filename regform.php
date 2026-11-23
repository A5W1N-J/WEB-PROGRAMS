
<?php
$name = $email = $phone = "";
$errors = [];
$success = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $phone = trim($_POST["phone"] ?? "");
    $password = $_POST["password"] ?? "";
    $confirm = $_POST["confirm"] ?? "";

    if ($name === "") {
        $errors[] = "Name is required";
    } elseif (!preg_match("/^[a-zA-Z ]+$/", $name)) {
        $errors[] = "Name should contain only letters and spaces";
    }

    if ($email === "") {
        $errors[] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    if ($phone === "") {
        $errors[] = "Phone number is required";
    } elseif (!preg_match("/^[0-9]{10}$/", $phone)) {
        $errors[] = "Phone number must contain exactly 10 digits";
    }

    if ($password === "") {
        $errors[] = "Password is required";
    } elseif (strlen($password) < 8) {
        $errors[] = "Password must contain at least 8 characters";
    }

    if ($password !== $confirm) {
        $errors[] = "Passwords do not match";
    }

    if (empty($errors)) {
        $success = "Registration Successful!";
        $name = $email = $phone = "";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Registration Form</title>
</head>
<body>

<h2>Student Registration Form</h2>

<form method="POST" action="">
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>">
    <br><br>

    <label for="email">Email:</label><br>
    <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
    <br><br>
    <label for="phone">Phone Number:</label><br>
    <input type="text" id="phone" name="phone"
    value="<?php echo htmlspecialchars($phone); ?>">
    <br><br>

    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password">
    <br><br>

    <label for="confirm">Confirm Password:</label><br>
    <input type="password" id="confirm" name="confirm">
    <br><br>

    <input type="submit" value="Register">
</form>

<?php
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo "<p style='color:red;'>$error</p>";
    }
}

if ($success !== "") {
    echo "<p style='color:green;'>$success</p>";
}
?>

</body>
</html>


