<?php
session_start();
$path=$_GET["dir"];
?>
<form action="path_upload_chk.php?dir=<?php echo $path; ?>" method="post" enctype="multipart/form-data">
<input type="file" name="file" />
<input type="submit" value="Ìá½»" />
</form>
