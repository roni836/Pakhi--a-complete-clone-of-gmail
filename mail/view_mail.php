<?php
include_once "../config/config.php";
if(!isset($_SESSION['account'])){
    redirect('login.php');
}

if(isset($_GET['mail_id'])){
    
    $mail = $_GET['mail_id'];
    $myuserid = $getuserdata['user_id'];
    $callinginbox = mysqli_query($connect,"SELECT * FROM mail JOIN accounts ON mail.user_by = accounts.user_id WHERE mail_id='$mail'");
    $row = mysqli_fetch_array($callinginbox);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Inbox | <?= PROJECT_NAME;?></title>
</head>
<body class="bg-slate-100">
<?php 
include_once "mail_header.php";
include_once "side.php";
?>

<div class="w-9/12">
    <header class="bg-white shadow-md p-4">
        <div class="container mx-auto">
            <div class="flex items-center gap-3">
                <a href="inbox.php"> <img src="../back.png" alt=""> </a>
               <?php $myuserid = $getuserdata['user_id']; ?>
                <h1 class="text-2xl font-semibold">View <?=$row['fname'];?>'s Mail</h1>
            </div>
        </div>
    </header>
<?php
   
?>
            <!-- view Email  -->
    <div class="container mx-auto mt-8 p-4">        
        <div class="bg-white rounded-lg shadow-md p-4">
            <div class="mb-3">
                <div class="font-medium">To: You &lt; <?= $row['email'];?> &gt;</div>
            </div>
            <div class="mb-3">
                <div class="font-medium">From: <?=$getuserdata['fname']." ".$getuserdata['lname'];?> &lt; <?=$getuserdata['email'];?> &gt;</div>
            </div>
            <div class="mb-3">
                <div class="font-semibold text-lg">Subject: <?=$row['subject'];?></div>
            </div>
            <div>
                <div class="mb-4">
                    <p class="font-medium text-lg">Message:</p>
                </div>
            <div class="p-4 border rounded-lg bg-gray-200 mb-4">
                    <p>
                        <?= $row['content'];?>
                    </p>
            </div>

            <div class="mb-4">
                <?php
                    $callingAttachment = mysqli_query($connect,"SELECT * FROM attachments WHERE mail_id='".$row['mail_id']."'");
                    $countAttachment = mysqli_num_rows($callingAttachment);
                    if($countAttachment > 0):
                ?>
                    <p class="text-gray-700 font-semibold">Attachments: </p>
                    <ul class="list-disc ml-4">
                <?php  
                    while($attach = mysqli_fetch_array($callingAttachment)):
                ?>
                    <li><a href="attach/<?=$attach['attachment'];?>" target="_blank"><?= $attach['attachment'];?></a></li>
                <?php endwhile; endif; ?>
                </ul>
            </div>
        </div>
    </div>
<?php };?>
</div>
    
</body>
</html>