<?php
include_once "../config/config.php";
if(!isset($_SESSION['account'])){
    redirect('login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Outbox | <?= PROJECT_NAME;?></title>
</head>
<body class="bg-slate-100">
<?php 
include_once "mail_header.php";
include_once "side.php";
?>

<div class="w-9/12">
    <header class="bg-white shadow-md p-4">
        <div class="container mx-auto">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-semibold">Outbox (Sent Mail)</h1>
                <div class="flex items-center space-x-4">
                    <button class="text-gray-600 hover:text-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                    <button class="text-gray-600 hover:text-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                    </button>
                    <button class="text-gray-600 hover:text-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </header>

            <!-- Email List -->
        <div class="container mx-auto mt-4">
            <!-- Sample Email Item -->
            <?php
                $myuserid = $getuserdata['user_id'];
                $callingOutbox = mysqli_query($connect,"SELECT * FROM mail JOIN accounts ON mail.user_to = accounts.user_id WHERE user_by = '$myuserid' and isDraft='0'");
                while($row = mysqli_fetch_array($callingOutbox)):
            ?>

            <div class="bg-white rounded-lg shadow-md p-4 my-2">
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-4 flex-1">
                        <input type="checkbox" class="form-checkbox text-blue-500 h-6 w-6">
                        <img src="../dp.png" class="w-10 h-10 rounded-full" alt="Sender">
                    <div>
                        <h2 class="text-lg font-semibold mx-3 mt-2"><?=$row['fname']." ".$row['lname'];?></h2>
                        <p class="text-gray-600 mt-2"><?=$row['subject'];?>-<?=substr($row['content'],0,50);?>...</p>
                    </div>
                </div>
             <div class="flex gap-3">
                <p class="text-gray-600">2 days ago</p> 

                <?php
                $callingAttachment = mysqli_query($connect,"SELECT * FROM attachments WHERE mail_id='".$row['mail_id']."'");
                $countAttachment = mysqli_num_rows($callingAttachment);
                if($countAttachment > 0):
                ?>
                <p class="text-gray-600"><img src="../attachment.png" alt=""></p>  
               <?php endif;?>
             </div> 
            </div>
            </div>
            <?php endwhile;?>
        </div>
        
</div>

    
</body>
</html>