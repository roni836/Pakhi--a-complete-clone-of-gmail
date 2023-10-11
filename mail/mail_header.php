<div class="flex-1 py-4 shadow-lg px-10 flex bg-white">
  <a href="index.php"><img src="../logo.png" class="w-20" alt=""></a>

  <div class="flex flex-1 justify-end gap-3 items-center">
    <a href="settings.php" class="flex items-center gap-3">
      <?php if($getuserdata['dp']):?>
        <img src="dp/<?=$getuserdata['dp'];?>"
         class="w-10 h-10 rounded-full">
         <?php else: ?>
         <img src="../dp.png"
         class="w-10 h-10 rounded-full">
         <?php endif;?>
    <span class="text-slate-600 font-semibold capitalize"><?=$getuserdata['fname'];?></span></a>
    <a href="../logout.php" class="text-red-700 hover:text-red-900 font-semibold">Sign Out</a>
  </div>
</div>