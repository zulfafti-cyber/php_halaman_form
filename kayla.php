<?php

// CLASS
class Biodata
{
    private $firstname;
    private $lastname;
    private $phone;
    private $address;

    public function __construct($firstname, $lastname, $phone, $address)
    {
        $this->firstname = htmlspecialchars(trim($firstname));
        $this->lastname  = htmlspecialchars(trim($lastname));
        $this->phone     = htmlspecialchars(trim($phone));
        $this->address   = htmlspecialchars(trim($address));
    }

    public function getFullName()
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    public function getFormattedData()
    {
        return [
            'nama'    => "Hi, my name is " . $this->getFullName(),
            'phone'   => "Phone Number : " . $this->phone,
            'address' => "Address : " . $this->address
        ];
    }
}

// LOGIC
$hasil = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = $_POST['firstname'] ?? '';
    $lastname  = $_POST['lastname'] ?? '';
    $phone     = $_POST['phone'] ?? '';
    $address   = $_POST['address'] ?? '';

    $biodata = new Biodata($firstname, $lastname, $phone, $address);
    $hasil = $biodata->getFormattedData();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Input Form PHP</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f7fb;
            padding: 40px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        button {
            padding: 10px 15px;
            background: #4a90e2;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .result {
            margin-top: 20px;
            padding: 15px;
            background: #eef5ff;
            border-left: 4px solid #4a90e2;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Input Form PHP</h1>

    <form method="POST">
        <input type="text" name="firstname" placeholder="Firstname" required>
        <input type="text" name="lastname" placeholder="Lastname" required>
        <input type="text" name="phone" placeholder="Phone Number" required>
        <textarea name="address" placeholder="Address" required></textarea>

        <button type="submit">Submit</button>
    </form>

    <?php if ($hasil): ?>
        <div class="result">
            <p><?= $hasil['nama']; ?></p>
            <p><?= $hasil['phone']; ?></p>
            <p><?= $hasil['address']; ?></p>
        </div>
    <?php endif; ?>
</div>

</body>
</html>