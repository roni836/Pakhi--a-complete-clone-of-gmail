<?php
include_once "../config/config.php";
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
        <div class="container mx-auto mt-8 p-4">
            <h1 class="text-2xl font-semibold mb-4">Compose Email</h1>
        
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- Recipient -->
                        <div class="mb-4">
                            <label for="user_to" class="block text-gray-600 font-medium">To</label>
                            <input type="email" name="user_to" id="user_to" class="mt-2 p-2 border rounded w-full" required>
                        </div>

                    <!-- Subject -->
                        <div class="mb-4">
                            <label for="subject" class="block text-gray-600 font-medium">Subject</label>
                            <input type="text" name="subject" id="subject" class="mt-2 p-2 border rounded w-full" required>
                        </div>

                        <!-- Message Body -->
                        <div class="mb-4">
                            <label for="content" class="block text-gray-600 font-medium">Message</label>
                            <textarea name="content" id="content" class="mt-2 p-2 border rounded w-full h-32" required></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="attachment" class="block text-gray-600 font-medium">Attachment</label>
                            <input type="file" name="attachment" id="attachment" class="mt-2 p-2 border rounded w-full">
                        </div>

                        <input type="submit" name = "compose" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded" value="Send Mail">
                        <input type="submit" name = "save" class="bg-slate-600 hover:bg-slate-900 text-white font-semibold px-4 py-2 rounded" value="Save To Draft">
                </form>

                <?php
                if(isset($_POST['compose']) || isset($_POST['save'])){
                    $user_to = $_POST['user_to'];
                    $content = $_POST['content'];
                    $subject = $_POST['subject'];           
                    $user_by = $getuserdata['user_id'];


                    $checkuser = mysqli_query($connect,"SELECT * FROM accounts WHERE email='$user_to' AND user_id <> '$user_by'");
                    $count_checkuser = mysqli_num_rows($checkuser);

                    $gettouser = mysqli_fetch_array($checkuser);
                    $gettouserid = $gettouser['user_id'];
                    
                        if($count_checkuser < 1){
                            alert("Receviers Email not Found");
                        }
                        else{
                            $isDraft = 0;
                           if(isset($_POST['save'])){
                            $isDraft = 1;
                           }
        
                           $compose_mail = mysqli_query($connect,"INSERT INTO mail(user_to,user_by,subject,content,isDraft) value('$gettouserid','$user_by','$subject','$content','$isDraft')");

                           if($compose_mail){
                            if(count($_FILES) > 0):
                                // File Work
                                $attachment = $_FILES['attachment']['name'];
                                $tmp_attachment = $_FILES['attachment']['tmp_name'];
                                move_uploaded_file($tmp_attachment,"attach/$attachment");
                                
                                $currentMailId = mysqli_insert_id($connect);
                                $queryForInsertAttachment = mysqli_query($connect,"INSERT INTO attachments(attachment,mail_id) value('$attachment','$currentMailId')");
                            endif;

                            alert('Mail Sent Successfully');
                            redirect('inbox.php');
                           }
                           else{
                            alert('Fail To Sent Mail');
                            redirect('inbox.php');
                           }
                        }
                    }
                ?>
        </div>
    </div>    
</body>
</html>