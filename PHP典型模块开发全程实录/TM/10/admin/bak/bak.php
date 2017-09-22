<?php
	session_start();
	header("Content-type:text/html; charset=gb2312");
	include_once '../conn/conn.php';
	include_once '../../config.php';
	include_once '../inc/func.php';
?>
<link rel="stylesheet" href="../css/style.css" />
<link rel="stylesheet" href="../css/table.css" />
<script language="javascript" src="../js/bak.js"></script>
<style>
	body{
		background-image:url(../images/abg.gif);
		background-position:top;
		background-repeat: repeat-x;
		width:100%;
		height:27px;
	}

</style>
<p>&nbsp;</p>
<table border="0" cellpadding="0" cellspacing="0" align="center" class="tbl">
<tr><td align="center" valign="middle">
<a href="del_bak.php" onClick="return del_chk()">删除旧备份</a>
<form name="bak" id="bak" method="post" action="bak_chk.php">
	<input id="butt" type="submit" value="备份数据">&nbsp;
	<input type="text" name="b_name" value="<?php echo date("YmdHis"); ?>.sql" readonly="readonly" size="25">
</form>
<form name="rebak" id="rebak" method="post" action="rebak_chk.php">
<input id="butt" type="submit" value="恢复备份" onclick="return re_bak();"/>&nbsp;
<select name="r_name" style="width:190;">
		<?php
			$filename = show_file(PATH.ROOT.ADMIN.BAK);
			for($num = 2;$num<count($filename);$num++){
		?>
			<option value="<?php echo $filename[$num]; ?>"><?php echo $filename[$num]; ?></option>
		<?php
			}
		?>
		</select>
</form>
</td></tr></table>