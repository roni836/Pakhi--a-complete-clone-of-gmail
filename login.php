<?php
include_once "config/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title><?= PROJECT_NAME;?></title>
</head>
<body class="bg-slate-100">
<?php include_once "include/header.php";?>

<div class="container mt-6">
    <div class="flex justify-center">
        <div class="w-4/12">
        <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                  Sign in to your account
              </h1>
              <form class="space-y-4 md:space-y-6" action="" method="post">
                  <div>
                      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                      <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@pakhi.com" required="">
                  </div>
                  <div>
                      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                      <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                  </div>
                  <div class="flex items-center justify-between">
                      <a href="#" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">Forgot password?</a>
                  </div>
                  <button type="submit" name="login" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Sign in</button>
                  <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                      Don't have an account yet? <a href="index.php" class="font-medium text-blue-600 hover:underline dark:text-blue-500">Sign up</a>
                  </p>
              </form>

              <?php
                if(isset($_POST['login'])){
                    $email = $_POST['email'];
                    $password = md5($_POST['password']);

                    $check_email = mysqli_query($connect,"SELECT * FROM accounts WHERE email='$email'");
                    $count_check_email = mysqli_num_rows($check_email);
                    $getuser = mysqli_fetch_array($check_email);

                    if($count_check_email > 0){
                        // Login forward
                            if($getuser['password']== $password){
                                $_SESSION['account'] = $email;
                                redirect('mail/inbox.php');
                            }
                            else{
                                alert('Invalid Email Or Password');
                                redirect('login.php');
                            }
                    }
                    else{
                        alert('Email does not exists');
                    }
                }
              ?>
          </div>
      </div>
        </div>
    </div>
</div>

    
</body>
</html>