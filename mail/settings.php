<?php
include_once "../config/config.php";
$myuserid = $getuserdata['user_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Inbox | <?= PROJECT_NAME;?></title>
</head>
<body class="bg-slate-100 font-sans">
<?php include_once "mail_header.php";?>

<div class="container mt-5 px-10">
<h1 class="text-2xl font-semibold mb-4">Settings</h1>
    <div class="container mx-auto mt-8 p-4 bg-white rounded-lg shadow-md">    
        <div class="flex flex-1 gap-3">
            <div class="w-3/12">
                <div class="bg-white">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-2 p-5 flex justify-center">
                        </div>
                        <div class="mb-2 p-2">
                            <label for="dp" class="text-black font-semibold flex justify-center">

    <?php if($getuserdata['dp']):?>
        <img src="dp/<?=$getuserdata['dp'];?>"
         class="w-48 h-48 rounded-full">
         <?php else: ?>
         <img src="../dp.png"
         class="w-48 h-48 rounded-full">
    <?php endif;?>

                            <input type="file" style="display:none" name="dp" onchange="this.form.submit()" id="dp" accept="image/*" class="mt-5 p-5 border rounded w-full">
                            </label>
                        </div>
                    </form>
                    <h2 class="text-center font-bold text-xl">Roni Saha</h2>
                <?php
                if(isset($_FILES['dp'])){
                $dp = $_FILES['dp']['name'];
                $tmp_dp = $_FILES['dp']['tmp_name'];
                move_uploaded_file($tmp_dp,"dp/$dp");

                $query = mysqli_query($connect,"UPDATE accounts SET dp ='$dp' WHERE user_id ='".$getuserdata['user_id']."'");
                if($query){
                    redirect('settings.php');
            }
                }
                ?>
                </div>
            </div>

        <div class="w-9/12 ">
            <form action="update_settings.php" method="post" enctype="multipart/form-data">

            <!-- First Name -->
            <div class="mb-4">
                <label for="fname" class="block text-black-600 font-semibold">First Name</label>
                <input type="text" name="fname" id="fname" class="mt-2 p-2 border rounded w-full" value="John">
            </div>

            <!-- Last Name -->
            <div class="mb-4">
                <label for="lname" class="block text-black-600 font-semibold">Last Name</label>
                <input type="text" name="lname" id="lname" class="mt-2 p-2 border rounded w-full" value="Doe">
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-black-600 font-semibold">Email</label>
                <input type="email" name="email" id="email" class="mt-2 p-2 border rounded w-full" value="johndoe@example.com">
            </div>

            <!-- Date of Birth (DOB) -->
            <div class="mb-4">
                <label for="dob" class="block text-black-600 font-semibold">Date of Birth (DOB)</label>
                <input type="date" name="dob" id="dob" class="mt-2 p-2 border rounded w-full" value="1990-01-01">
            </div>

            <!-- Gender -->
            <div class="mb-4">
                <label class="block text-black-600 font-semibold">Gender</label>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" name="m" value="male" class="form-radio" checked>
                        <span class="ml-2">Male</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" name="f" value="female" class="form-radio">
                        <span class="ml-2">Female</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" name="o" value="female" class="form-radio">
                        <span class="ml-2">Others</span>
                    </label>
                </div>
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded w-full">Save Changes</button>
        </form>
            </div>
        </div>


        
    </div>
</div>
</body>
</html>