<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test RECAPTCHA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="bg-light p-3 rounded mt-5">
            <div>
                <h2 class="text-center">Test RECAPTCHA</h2>
            </div>
            <div class="rounded mt-5 p-5 card login-card-custom w-50 m-auto mb-5 text-center">
                <form action="process.php" method="post">
                    <?php if (isset($_SESSION['error'])) : ?>
                        <div class="alert alert-danger alert-custom" role="alert">
                            <?php echo $_SESSION['error']; ?>
                        </div>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['success'])) : ?>
                        <div class="alert alert-success alert-custom" role="alert">
                            <?php echo $_SESSION['success']; ?>
                        </div>
                    <?php endif; ?>
                    <div class="mb-3">
                        <input class="form-control" name="firstname" type="text" placeholder="enter ..." required>
                    </div>
                    <div class="mb-3">
                        <input class="form-control" name="lastname" type="text" placeholder="enter ..." required>
                    </div>
                    <div class="g-recaptcha" data-sitekey="site-key"></div>
                    <button type="submit" name="submit" class="btn btn-success text-white w-100">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://google.com/recaptcha/api.js" async defer></script>
</body>
</html>

<?php 

    if (isset($_SESSION['error']) || isset($_SESSION['success'])){

        unset($_SESSION['error']);
        unset($_SESSION['success']);

    }
?>