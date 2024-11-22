<?php
include("dburl.php");
?>






<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo "LAPAK JORIP"; ?></title>
        <link rel="stylesheet" href="mainpage.css">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
    <?php
session_start();
echo '<pre>';
print_r($_SESSION);
echo '</pre>';
?>
    <header>
    <a href="/" class="title"><?php echo "LAPAK JORIP"; ?></a>
    <nav>
        <ul>
            <li><a href="#home">BERANDA</a></li>
            <li><a href="#populer">PRODUK</a></li>
            <li><a href="#tentang">TENTANG</a></li>
            <li><a href="#sosmed">KONTAK</a></li>
            <?php if (isset($_SESSION['email'])): ?>
                <li><a href="logout.php">LOGOUT</a></li>
                <div class="welcome">
                <li><span>Welcome, <?php echo htmlspecialchars($_SESSION['name']); ?>!</span></li> 
                <?php else: ?>
                <li><a href="./login/">LOGIN</a></li> 
                <li><a href="signup.php">SIGN UP</a></li>
            <?php endif; ?>
        </ul>
    </nav>
    </nav>
</header>

        <div id="home" class="slider">
            <h4>Klik Disini Untuk Slide Gambar</h4>
            <input type="radio" name="choose" id="" class="choose_1">
            <input type="radio" name="choose" id="" class="choose_2">
            <input type="radio" name="choose" id="" class="choose_3">
            
            <div class="slides">
                <a href="http://www.mobilelegends.com" target="_blank" rel="noopener noreferrer" class="slide s1">
                    <img src="images/slide-1.jpg" alt="">
                </a>
                <a href="https://ff.garena.com/id/" target="_blank" rel="noopener noreferrer" class="slide s2">
                    <img src="images/slide-2.jpg" alt="">
                </a>
                <a href="https://pubg.com/en/main"target="_blank" rel="noopener noreferrer" class="slide s3">
                    <img src="images/slide-3.jpg" alt="">
                </a>
            </div>
        </div>

        <h1 class="title-p"><?php echo "POPULER"; ?></h1>
        <section id="populer" class="populer">
            <?php
$products = [
    "Free Fire" => [
        "image" => "./images/ff.png",
        "prices" => [
            "70 Diamonds" => "Rp 10.000",
            "140 Diamonds" => "Rp 20.000",
            "210 Diamonds" => "Rp 30.000",
            "280 Diamonds" => "Rp 40.000",
            "355 Diamonds" => "Rp 50.000",
            "500 Diamonds" => "Rp 70.000",
            "720 Diamonds" => "Rp 100.000",
            "1000 Diamonds" => "Rp 130.000",
            "M. Mingguan" => "Rp 30.000",
            "M. Bulanan" => "Rp 150.000"
        ]
    ],
    "Mobile Legends" => [
        "image" => "./images/mlbb.jpg",
        "prices" => [
            "50 Diamonds" => "Rp 25.000",
            "86 Diamonds" => "Rp 30.000",
            "224 Diamonds" => "Rp 84.000",
            "371 Diamonds" => "Rp 123.000",
            "478 Diamonds" => "Rp 152.000",
            "562 Diamonds" => "Rp 179.000",
            "720 Diamonds" => "Rp 240.000",
            "1000 Diamonds" => "Rp 300.000",
            "M. Mingguan" => "Rp 30.000",
            "M. Bulanan" => "Rp 150.000"
        ]
    ],
    "PUBG Mobile" => [
        "image" => "./images/pubgm.jpg",
        "prices" => [
            "70 Diamonds" => "Rp 10.000",
            "140 Diamonds" => "Rp 20.000",
            "210 Diamonds" => "Rp 30.000",
            "280 Diamonds" => "Rp 40.000",
            "355 Diamonds" => "Rp 50.000",
            "500 Diamonds" => "Rp 70.000",
            "720 Diamonds" => "Rp 100.000",
            "1000 Diamonds" => "Rp 130.000",
            "M. Mingguan" => "Rp 30.000",
            "M. Bulanan" => "Rp 150.000"
        ]
    ]
];
?>

<section class="populer">
    <?php foreach ($products as $name => $details): ?>
        <div class="<?= strtolower(str_replace(' ', '', $name)); ?>">
            <div class="link">
                <a href="#harga-<?= strtolower(str_replace(' ', '', $name)); ?>">
                    <img src="<?= $details['image']; ?>" alt="<?= $name; ?>">
                    <div class="judul-produk"><?= $name; ?></div>
                </a>
            </div>
            <div class="overlay" id="harga-<?= strtolower(str_replace(' ', '', $name)); ?>">
                <div class="popup">
                    <h2>HARGA <?= strtoupper($name); ?></h2>
                    <a class="close" href="#populer">&times;</a>
                    <br>
                    <div class="content">
                        <?php foreach ($details['prices'] as $item => $price): ?>
                            <?= $item; ?>:
                            <br>
                            <span class="harga"><?= $price; ?></span>
                            <br>
                        <?php endforeach; ?>
                        <a class="pesan" href="https://api.whatsapp.com/send?phone=6281259892921&text=Halo%20min%2C%20mau%20pesen%20nih%F0%9F%98%80%F0%9F%92%B8%0A%0AGame%20%20%20%20%20%3A%0AID%20game%20%3A%0AProduk%20%20%20%3A%0AVariants%20%20%3A%0AHarga%20%20%20%20%20%3A%0APayment%20%3A%20%0A%0ALangsung%20di%20proses%20ya%20min%F0%9F%98%81" target="_blank" rel="noopener noreferrer">
                            <img src="./images/whatsapp.png" alt="">Pesan Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</section>



        </section>

        <section class="tentang" id="tentang">
            <div class="card">
                <h1><?php echo "TENTANG KAMI"; ?></h1>
                <br>
                <p>
                    <a href="" class="title"><?php echo "LAPAK JORIP"; ?></a> adalah website yang menyediakan layanan top up game.
                </p>
            </div>
        </section>
         
        <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
</head>
    </body>
    <footer>
            <section class="sosmed" id="sosmed">
                <div class="sosmed">
                    <h1><?php echo "SOSIAL MEDIA"; ?></h1>
                    <a href="https://instagram.com/zorivuu" target="_blank" rel="noopener noreferrer"><img src="./images/ig.png" alt=""></a>
                    <a href="http://facebook.com/zhorif.zaidaan" target="_blank" rel="noopener noreferrer"><img src="./images/fb.png" alt=""></a>
                    <a href="http://github.com/zorifff" target="_blank" rel="noopener noreferrer"><img src="./images/github.png" alt=""></a>
                </div>
            </section>
        </footer>
</html>


