<?php
session_start();
include_once("config/config.php");
$file = $_GET['dir'].$_GET['file'];

if($_POST){
	$new = $_GET['dir'].$_POST['new'];

	$result = ftp_rename($link, $file, $new);
	if($result)
	{
		echo '<script>alert("�ļ�'.$_GET['file'].'\n����Ϊ\n'.$_POST['new'].'\n�ɹ�");window.close();</script>';
	}
	else{
		echo '<script>alert("�ļ�'.$_GET['file'].'\n����Ϊ\n'.$_POST['new'].'\nʧ��");history.back()";</script>';
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>FTP����</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #FFFFFF;
}
.STYLE1 {
	font-size: 12px;
	color: #000000;
}
-->
</style></head>
<script src="js/check.js"></script>
<body>
<table border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td background=""><table border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td  colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td width="163" align="center" valign="top"><table border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table>
          </td>
        <td width="770" align="center"><table  border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td align="center" class="STYLE1"><form id="form1" name="form1" method="post" action="edit.php?dir=<?php echo $_GET['dir'].'&file='.$_GET['file'] ?>" onSubmit="return chkamend();">
              <p>ԭ�ļ���Ϊ��<?php echo $_GET['file']; ?></p>
              <p>�����ļ�����
			   <input id="news" type="text" name="new" />
                &nbsp;
                <input type="submit" name="Submit" value="����" />
              </p>
              <p>ע�⣺Ҫ�����ļ���ȫ����������չ��</p>
            </form>
            </td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
