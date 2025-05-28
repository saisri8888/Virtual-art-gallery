<?php
session_start();
if (!isset($_SESSION['student'])) {
    header("Location: index.php");
    exit;
}

$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = $_POST['fullname'];
    $roll_number = $_POST['roll_number'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $father_name = $_POST['father_name'];
    $father_phone = $_POST['father_phone'];
    $address = $_POST['address'];
    $purpose = $_POST['purpose'];

    $conn = new PDO("mysql:host=localhost;dbname=leavemanagement", "root", "");

    $stmt = $conn->prepare("INSERT INTO outpass_requests (fullname, roll_number, email, phone_number, father_name, father_phone, address, purpose) 
                            VALUES (:fullname, :roll_number, :email, :phone_number, :father_name, :father_phone, :address, :purpose)");
    $stmt->execute([
        'fullname' => $fullname,
        'roll_number' => $roll_number,
        'email' => $email,
        'phone_number' => $phone_number,
        'father_name' => $father_name,
        'father_phone' => $father_phone,
        'address' => $address,
        'purpose' => $purpose
    ]);

    $message = "Outpass request submitted successfully.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Outpass Request</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="outpass-container">
        <h1>Outpass Request</h1>
        <p style="color: green;"><?= htmlspecialchars($message) ?></p>
        <form method="POST">
            <label for="fullname">Full Name:</label>
            <input type="text" id="fullname" name="fullname" required>

            <label for="roll_number">Roll Number:</label>
            <input type="text" id="roll_number" name="roll_number" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone_number">Phone Number:</label>
            <input type="text" id="phone_number" name="phone_number" required>

            <label for="father_name">Father's Name:</label>
            <input type="text" id="father_name" name="father_name" required>

            <label for="father_phone">Father's Phone Number:</label>
            <input type="text" id="father_phone" name="father_phone" required>

            <label for="address">Address:</label>
            <textarea id="address" name="address" required></textarea>

            <label for="purpose">Purpose:</label>
            <select id="purpose" name="purpose">
                <option value="healthissues">Health Issues</option>
                <option value="occuasion">Occasion</option>
                <option value="casualouting">Casual Outing</option>
                <option value="necessaryworks">Necessary Works</option>
            </select>

            <button type="submit">Submit Request</button>
        </form>
    </div>
</body>
</html>
