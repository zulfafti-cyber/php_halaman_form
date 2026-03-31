<?php

class Character {
    public $nama;
    public $deskripsi;
    public $gambar;
    public $warna;
    public $link;

    public function __construct($nama, $deskripsi, $gambar, $warna, $link) {
        $this->nama = $nama;
        $this->deskripsi = $deskripsi;
        $this->gambar = $gambar;
        $this->warna = $warna;
        $this->link = $link;
    }

    public function render() {
        return '
        <a href="'.$this->link.'" class="card-link">
            <div class="card" style="background: '.$this->warna.'">
                <img src="'.$this->gambar.'" alt="'.$this->nama.'">
                <h2>'.$this->nama.'</h2>
                <p>'.$this->deskripsi.'</p>
            </div>
        </a>';
    }
}

class Menu {
    private $characters = [];

    public function addCharacter($char) {
        $this->characters[] = $char;
    }

    public function render() {
        echo '
        <!DOCTYPE html>
        <html lang="id">
        <head>
        <meta charset="UTF-8">
        <title>Menu Pilih Form</title>

        <style>
        body {
            margin: 0;
            font-family: Arial;
            background: linear-gradient(135deg, #6ea2b3, #49769f, #0a4174);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h1 {
            margin-bottom: 40px;
            color: white;
        }

        .container {
            display: flex;
            gap: 35px;
            padding: 35px 45px;
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
            border-radius: 50px;
        }

        .card-link {
            text-decoration: none;
            cursor: pointer;
        }

        .card {
            width: 190px;
            height: 110px;
            border-radius: 20px;
            padding: 20px;
            color: white;
            text-align: center;
            box-shadow: 0 10px 25px rgba(0,0,0,0.3);
            transition: 0.4s ease;
            position: relative;
            padding-top: 118px;
            overflow: visible;  
        }

        .card::before {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(255,255,255,0.15);
            opacity: 0;
            transition: 0.4s;
        }

        .card:hover::before {
            opacity: 1;
        }

        .card:hover {
            transform: translateY(-12px) scale(1.05) rotate(-1deg);
        }

        .card img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            position: absolute;
            top: -25px;          
            left: 50%;
            transform: translateX(-50%);
            border-radius: 30%;
            border: 4px solid white;
            box-shadow: 0 10px 20px rgba(0,0,0,0.3);
            animation: float 3s ease-in-out infinite;
            transition: 0.4s;
        }

        .card:hover img {
            transform: translateX(-50%) translateY(-5px) scale(1.1) rotate(3deg);
        }

        @keyframes float {
            0% { transform: translateX(-50%) translateY(0px); }
            50% { transform: translateX(-50%) translateY(-6px); }
            100% { transform: translateX(-50%) translateY(0px); }
        }

        h2 {
            margin: 10px 0 5px;
        }

        p {
            font-size: 13px;
            opacity: 0.9;
        }
        </style>

        </head>
        <body>

        <h1>Menu Pilih Form</h1>

        <div class="container">';
        
        foreach ($this->characters as $char) {
            echo $char->render();
        }

        echo '
        </div>

        </body>
        </html>';
    }
}

$menu = new Menu();

$menu->addCharacter(new Character(
    "Zulfa Fitri",
    "253140700111055",
    "img/zulfa.png",
    "linear-gradient(135deg, #eec6c7, #db88a4)",
    "zulfa.php"
));

$menu->addCharacter(new Character(
    "Keisya Lanika",
    "253140701111001",
    "img/lanika.png",
    "linear-gradient(135deg, #eec6c7, #db88a4)",
    "lanika.php"
));

$menu->addCharacter(new Character(
    "Kayla Rihadatul Haniyah",
    "253140700111002",
    "img/kayla.png",
    "linear-gradient(135deg, #eec6c7, #db88a4)",
    "kayla.php"
));

$menu->render();

?>