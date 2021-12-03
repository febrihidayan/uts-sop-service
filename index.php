<?php

require_once 'connect.php';

if (!isset($_SESSION['username'])) {
    return header('Location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halo <?= $_SESSION['name'] ?></title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css' integrity='sha512-IgmDkwzs96t4SrChW29No3NXBIBv8baW490zk5aXvhCD8vuZM3yUSkbyTBcXohkySecyzIrUwiF/qV0cuPcL3Q==' crossorigin='anonymous'/>
</head>
<body>
    <nav class="navbar is-transparent is-light">
        <div class="container">
            <div class="navbar-brand">
                <a href="index.php" class="navbar-item"><?= $_SESSION['name']; ?></a>
            </div>
            
            <div class="navbar-menu">
                <div class="navbar-start">
                    <a href="#" class="navbar-item">Web Developer</a>
                </div>
                <div class="navbar-end">
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link"><?= $_SESSION['name']; ?></a>

                        <div class="navbar-dropdown">
                            <a href="logout.php" onclick="return confirm('Apakah Anda yakin ingin keluar?');" class="navbar-item">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </nav>

    <section class="hero">
        <div class="hero-body">
            <section class="container">
                <h1 class="title">Nama Lengkap: <?= $_SESSION['name'] ?></h1>
                <h1 class="subtitle">Nama Pengguna: <?= $_SESSION['username'] ?></h1>
                <h1 class="subtitle">Level Akses: <?= $_SESSION['level'] ?></h1>
            </section>
        </div>
    </section>
    
</body>
</html>