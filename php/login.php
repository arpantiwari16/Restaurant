<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../js/jquery.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</head>
<style>
    * {
        text-transform: capitalize;
    }

    .col1 {
        background-image: url(../imgs/pexels-lisa-fotios-3197390.jpg);
        background-size: cover;
        height: 1000px;
    }

    /* .col2 {} */
</style>

<script>

</script>

<body>

    <section class="container m-5 ms-0 mt-0">
        <div class="row">
            <div class="col col1 "></div>
            <div class="w-50 mx-auto col col2 mt-3 ps-3">
                <form action="loginchk.php" class="p-5" method="post">
                    <h2 class="text-primary text-uppercase mx-auto text-center">login page</h2>
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" value="aditya@gmail.com" id="email" required minlength="9" maxlength="22" placeholder="Enter email" name="email">
                        <label for="email">Email</label>
                    </div>

                    <div class="form-floating mt-3 mb-3">
                        <input type="password" class="form-control" value="karan123" required minlength="6" maxlength="20" id="pwd" placeholder="Enter password" name="pswd">
                        <label for="pwd">Password</label>
                    </div>
                    <div class="text-danger mb-2">
                        <?php
                        if (isset($_GET['msg']))
                            echo urldecode($_GET['msg']); ?>
                    </div>
                    <input type="submit" class="btn btn-primary" value="submit" name="submit">
                </form>

            </div>
        </div>

    </section>

</body>

</html>