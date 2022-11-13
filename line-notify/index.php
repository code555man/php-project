<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Send Line Notify</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <h1>Line-Notify</h1>
            <form action="send.php" method="post">

                <?php if(isset($_SESSION['success'])){ ?>
                    <div class="alert alert-success">
                        <?php 
                            echo $_SESSION['success'];
                            unset($_SESSION['success']);
                        ?>
                    </div>
                <?php } ?>

                <?php if(isset($_SESSION['error'])){ ?>
                    <div class="alert alert-danger">
                        <?php 
                            echo $_SESSION['error']; 
                            unset($_SESSION['error']);
                        ?>
                    </div>
                <?php } ?>

                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="email">
                </div>
                <div class="mb-3">
                    <label for="fullname" class="form-label">Name</label>
                    <input type="text" name="fullname" class="form-control" id="fullname">
                </div>
                <button type="submit" class="btn btn-success" name="submit">Send</button>
            </form>
        </div>
    </div>
</body>
</html>