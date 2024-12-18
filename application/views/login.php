<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Login CMS</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('template/assets/img/favicon.jpg') ?>">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('template/assets/css/bootstrap.min.css') ?>">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="<?= base_url('template/assets/plugins/fontawesome/css/fontawesome.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('template/assets/plugins/fontawesome/css/all.min.css') ?>">

    <!-- Main CSS -->
    <link rel="stylesheet" href="<?= base_url('template/assets/css/style.css') ?>">
</head>

<body class="account-page">
    <div class="main-wrapper">
        <div class="account-content">
            <div class="login-wrapper">
                <div class="login-content">
                    <div class="login-userset">
                        <div class="login-logo">
                            <img src="<?= base_url('template/assets/img/logo.png') ?>" alt="logo">
                        </div>
                        <div class="login-userheading">
                            <!-- Flashdata Alert -->
                            <?php if ($this->session->flashdata('alert')): ?>
                                <?= $this->session->flashdata('alert') ?>
                            <?php endif; ?>
                            <h3>Sign In</h3>
                            <h4>Please login to your account</h4>
                        </div>

                        <!-- Form Login -->
                        <form action="<?= base_url('auth/login') ?>" method="post">
                            <div class="form-login">
                                <label>Username</label>
                                <div class="form-addons">
                                    <input type="text" name="username" placeholder="Enter your Username" required>
                                    <img src="<?= base_url('template/assets/img/icons/mail.svg') ?>" alt="icon">
                                </div>
                            </div>
                            <div class="form-login">
                                <label>Password</label>
                                <div class="pass-group">
                                    <input type="password" class="pass-input" name="password" placeholder="Enter your password" required>
                                    <span class="fas toggle-password fa-eye-slash"></span>
                                </div>
                            </div>
                            <div class="form-login">
                                <button type="submit" class="btn btn-login">Sign In</button>
                            </div>
                        </form>
                        <!-- End Form Login -->
                    </div>
                </div>
                <div class="login-img">
                    <img src="<?= base_url('template/assets/img/login.jpg') ?>" alt="background image">
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?= base_url('template/assets/js/jquery-3.6.0.min.js') ?>"></script>

    <!-- Bootstrap JS -->
    <script src="<?= base_url('template/assets/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- Main JS -->
    <script src="<?= base_url('template/assets/js/script.js') ?>"></script>

    <!-- Fade Out Alert -->
    <script>
        $(document).ready(function () {
            setTimeout(function () {
                $(".alert").fadeOut("slow");
            }, 5000); // 5 detik
        });
    </script>
</body>

</html>
