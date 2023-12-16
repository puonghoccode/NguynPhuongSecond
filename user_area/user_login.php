<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User - Login</title>
    <!-- boostrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- fontawesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css link -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">User Login</h2>
        <div class="row d-flex align-items-center justify-content-center mt-5">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- username field -->
                    <div class="form-outline mb-4">
                        <label for="user_username" class='form-label'>Username</label>
                        <input type="text" name="user_username" id="user_username" class='form-control' 
                        placeholder="Enter your username" autocomplete="off" required='required'>
                    </div>

                    <!-- password field -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class='form-label'>Password</label>
                        <input type="password" name="user_password" id="user_password" class='form-control' 
                        placeholder="Enter your password" autocomplete="off" required='required'>
                    </div>

                    <div class="mt-4 pt-2">
                        <input type="submit" name="user_login" id="" value="Login" class='bg-info py-2 px-3 border-0'>
                        <p class='small fw-bold mt-2 pt-1 mb-0'>Don't have an account? <a class="text-danger" href='user_registration.php'>Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>