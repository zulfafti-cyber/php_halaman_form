<?php
class User {
    public $firstname;
    public $lastname;
    public $phone;
    public $address;

    public function __construct($firstname, $lastname, $phone, $address) {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->phone = $phone;
        $this->address = $address;
    }

    public function getFullName() {
        return $this->firstname . " " . $this->lastname;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getAddress() {
        return $this->address;
    }
}

$user = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = new User(
        $_POST["firstname"],
        $_POST["lastname"],
        $_POST["phone"],
        $_POST["address"]
    );
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Form OOP PHP</title>
<style>
    body {
        font-family: Arial;
        background: #f5f5f5;
    }
    .container {
        width: 500px;
        margin: 50px auto;
        background: white;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    input, textarea {
        width: 100%;
        padding: 12px;
        margin-bottom: 10px;
        border-radius: 8px;
        border: 1px solid #ccc;
    }
    button {
        display: block;
        margin: auto;
        padding: 10px 25px;
        border-radius: 20px;
        border: none;
        background: #4da3ff;
        color: white;
    }
</style>
</head>
<body>

<div class="container">
    <form method="POST">
        <input type="text" name="firstname" placeholder="Firstname" required>
        <input type="text" name="lastname" placeholder="Lastname" required>
        <input type="text" name="phone" placeholder="Phone Number" required>
        <textarea name="address" placeholder="Address" required></textarea>

        <button type="submit">Submit</button>
    </form>

    <?php if ($user): ?>
        <div style="margin-top:20px;">
            <p><strong>Hi, my name is <?= $user->getFullName(); ?></strong></p>
            <p>Phone Number : <?= $user->getPhone(); ?></p>
            <p>Address : <?= $user->getAddress(); ?></p>

            <a href="" style="display:inline-block; margin-top:10px; font-size:12px; color:gray;">
                Reset
            </a>
        </div>
    <?php endif; ?>
</div>

</body>
</html>