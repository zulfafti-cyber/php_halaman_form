<?php

class User {
    private $firstname;
    private $lastname;
    private $phone;
    private $address;

    public function __construct($firstname, $lastname, $phone, $address)
    {
        $this->firstname = $firstname;
        $this->lastname  = $lastname;
        $this->phone     = $phone;
        $this->address   = $address;
    }

    public function getFirstname() { return $this->firstname; }
    public function getLastname()  { return $this->lastname; }
    public function getPhone()     { return $this->phone; }
    public function getAddress()   { return $this->address; }
}

$user = null;

if (isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $lastname  = $_POST['lastname'];
    $phone     = $_POST['phone'];
    $address   = $_POST['address'];

    $user = new User($firstname, $lastname, $phone, $address);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Form Sederhana</title>

<style>
    body {
        font-family: Arial;
        background-color: #f3f7fc;
        margin: 0;
        padding: 40px;
    }

    .container {
        width: 100%;
        max-width: 700px;
        margin: auto;
        background: white;
        padding: 50px;
        border-radius: 15px;
        box-shadow: 0 0 20px rgba(0,0,0,0.1);
    }

    h2, h3 {
        margin-bottom: 20px;
    }

    input, textarea {
        width: 96%;
        padding: 11px;
        margin: 12px 0 22px 0;
        border: 1px solid #cbd5e0;
        border-radius: 6px;
        font-size: 15px;
    }

    textarea {
        height: 120px;
        resize: none;
    }

    button {
        width: 100%;
        padding: 14px;
        background: #4e9cff;
        border: none;
        color: white;
        cursor: pointer;
        border-radius: 8px;
        font-size: 17px;
        font-weight: bold;
    }

    button:hover {
        background: #2f7be5;
    }

    .result p {
        font-size: 15px;
        margin: 5px 0;
    }
</style>

</head>

<body>

<div class="container">
    <h2>Form Input Data</h2>

    <form method="POST">
        <input type="text" name="firstname" placeholder="First name" required>
        <input type="text" name="lastname" placeholder="Last name" required>
        <input type="text" name="phone" placeholder="Phone Number" required>
        <textarea name="address" placeholder="Address" required></textarea>

        <button type="submit" name="submit">Submit</button>
    </form>
</div>

<?php if ($user): ?>
<div class="container" style="margin-top: 25px;">

    <h3>Your Data</h3>

    <p><strong>Hi, my name is</strong> 
        <strong><?= $user->getFirstname(); ?> <?= $user->getLastname(); ?></strong>
    </p>

    <p><strong>Phone Number :</strong> <?= $user->getPhone(); ?></p>

    <p><strong>Address :</strong> <?= $user->getAddress(); ?></p>

    <br>
    <a href="" style="font-size:14px; color:#333;">Reset</a>

</div>
<?php endif; ?>

</body>
</html>