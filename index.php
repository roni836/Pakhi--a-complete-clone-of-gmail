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

<div class="container mt-3 px-16">
    <div class="flex flex-1">
        <div class="w-7/12 p-10">
            <h1 class="text-7xl text-teal-800 font-black text-sans ">Welcome in <?=PROJECT_NAME;?></h1>
            <p class="text-lg leading-4 mt-6">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consequatur ea veritatis molestias eaque expedita minus at voluptates. Ipsum ullam perferendis distinctio odit, veniam aperiam facere.</p>
        </div>
        <div class="w-5/12 p-5">
           <div class="bg-white shadow p-5 border-slate-400 border rounded">
            <div class="w-full">
                <h2 class="font-bold my-5">Create an Account 100% free </h2>
            </div>           
                <form action="" method="post">
                    <div class="flex gap-3">
                        <div class="flex-1">
                            <div class="mb-4">
                                <label for="fname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                                <input type="text" id="fname" name="fname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="e.g Roni" required>
                            </div>
                        </div>
                        <div class="flex-1">
                            <div class="mb-4">
                                <label for="lname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
                                <input type="text" id="lname" name="lname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="e.g Saha" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="e.g username@pakhi.com" required>
                    </div>
                    <div class="mb-4">
                        <label for="contact" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contact</label>
                        <input type="tel" id="contact" name="contact" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="e.g 0123456789" required>
                    </div>
                    <div class="flex gap-3">
                        <div class="mb-4 flex-1">
                            <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender</label>
                            <select id="gender" name="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"require>
                                <option value="">Select Gender Here</option>
                                <option value="m">Male</option>
                                <option value="f">Female</option>
                                <option value="o">Others</option>
                            </select>
                        </div>
                        <div class="mb-4 flex-1">
                            <label for="dob" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date of Birth</label>
                            <input type="date" id="dob" name="dob" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"require>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
                        <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"placeholder="••••••••" required>
                    </div>
                        <div class="flex justify-end flex-1">
                            <button type="submit" name="create" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create An Account</button>
                        </div>
                </form>

                <?php
                // create account work
                if(isset($_POST['create'])){
                    $fname = $_POST['fname'];
                    $lname = $_POST['lname'];
                    $dob = $_POST['dob'];
                    $email = $_POST['email'];
                    $contact = $_POST['contact'];
                    $gender = $_POST['gender'];
                    $password = md5( $_POST['password']);

                    $q = mysqli_query($connect,"INSERT INTO accounts(fname,lname,dob,email,contact,gender,password)value('$fname','$lname','$dob','$email','$contact','$gender','$password')");

                    if($q){
                        $_SESSION['account'] = $email;
                        redirect('mail/inbox.php');
                    }
                    else{
                        alert('fail to Create an account');
                        redirect('index.php');
                    }
                }
                ?>
               </div>
           </div>
    </div>
</div>


    
</body>
</html>