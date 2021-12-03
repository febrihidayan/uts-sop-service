<?php 

session_start();

if (isset($_POST['login'])) {

    $url = "http://localhost:8000/service.php?username={$_POST['username']}&password={$_POST['password']}";
    // $url = "https://febrihidayan.sekolahprogram.com/uts/service.php?username={$_POST['username']}&password={$_POST['password']}";

    $data = simplexml_load_file($url);
    

    if ($data->response == 'TRUE') {
        $_SESSION['name'] = (string)$data->name;
        $_SESSION['username'] = (string)$data->username;
        $_SESSION['level'] = (string)$data->level;

        return header('Location:index.php');
    }

    else {
        $errUsername = 'Username atau Password salah.';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css' integrity='sha512-IgmDkwzs96t4SrChW29No3NXBIBv8baW490zk5aXvhCD8vuZM3yUSkbyTBcXohkySecyzIrUwiF/qV0cuPcL3Q==' crossorigin='anonymous'/>
</head>
<body>
    <section class="hero">
        <div class="hero-body">
            <div class="columns is-centered">
                <div class="column is-6">
                    <div class="card">
                        <div class="card-content">
                            <h1 class="title">Login</h1>

                            <form action="" method="post">
                                <div class="field">
                                    <label for="username" class="label">Username</label>
                                    <div class="control">
                                        <input type="text" name="username" id="username" value="<?= $_POST['username'] ?? '' ?>" class="input" placeholder="your username" required>
                                    </div>
                                    <?php if (isset($errUsername)): ?>
                                        <span class="help is-danger"><?= $errUsername; ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="field">
                                    <label for="password" class="label">Password</label>
                                    <div class="control">
                                        <input type="password" name="password" id="password" class="input" placeholder="******" required>
                                    </div>
                                    <?php if (isset($errPassword)): ?>
                                        <span class="help is-danger"><?= $errPassword; ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="field">
                                    <button type="submit" name="login" class="button is-primary">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>