<?php
	session_start();
	header('content-type:text/html;charset=gb2312');
?>
<style type="text/css">
<!--
body,td,th {
	font-size: 12px;
}
body {
	margin-left: 12px;
	margin-top: 12px;
}
-->
</style>
<script language="javascript" src="js/UBBCode.JS"></script>
<script language="javascript">
	function $(id){
		return document.getElementById(id);
	}
	function chk(){
		if($('file').value==""){
			alert("�������ݲ�����Ϊ�գ�");
			$('file').focus();
			return false;
		}
	}
</script>
<?php
	include_once 'conn/conn.php';
	if($_GET['act'] == 'mod'){
		$sql = "update tb_article set typename = '".$_POST['articletype']."', content = '".$_POST['file']."' where id = ".$_POST['artid'];
		$num = $conne->uidRst($sql);
		if($num == 1){
			echo "<script>top.opener.location.reload();alert('���³ɹ�');window.close();</script>";
			exit();
		}else{
			echo $sql;
		}
	}
	$sql = "select * from tb_article where id = ".$_GET['artid'];
	$arr = $conne->getRowsArray($sql);
?>
<table width="500" border="0" cellpadding="0" cellspacing="0" align="center">
<form id="modartfm" method="post" action="?act=mod">
                <tr>
                  <td>
				  <table width="630" border="1" cellpadding="3" cellspacing="1">
                      <tr>
                        <td class="i_table" colspan="2" align="center" valign="middle">&nbsp;�޸Ĳ�������</td>
                      </tr>
                      <tr>
                        <td valign="top" align="right" width="14%">���±��⣺<br></td>
                        <td width="86%"><input name="txt_title" type="text" id="txt_title" size="68" value="<?php echo $arr[0]['title']; ?>" readonly="readonly"></td>
                      </tr>
					   <tr>
                        <td valign="top" align="right" width="14%">�������<br></td>
                        <td width="86%">
						<select id="articletype" name="articletype">
						<?php
							$typesql = "select arttype from tb_member where name = '".$_SESSION['name']."'";
							$typefields = $conne->getFields($typesql,0);
							$typearr = explode(',',$typefields);
							foreach($typearr as $value){
								if($value != $arr[0][typename]){
						?>
							<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
						<?php
								}else{
						?>
							<option value="<?php echo $value; ?>" select><?php echo $value; ?></option>
						<?php	
								}
							}
						?>
						</select>
						</td>
                      </tr>
                      <tr>
                        <td align="right" width="14%">���ֱ������</td>
                        <td width="86%"><img src="images/UBB/B.gif" width="21" height="20" onClick="bold()">&nbsp;<img src="images/UBB/I.gif" width="21" height="20" onClick="italicize()">&nbsp;<img src="images/UBB/U.gif" width="21" height="20" onClick="underline()">
						����
                            <select name="font" class="wenbenkuang" id="font" onChange="showfont(this.options[this.selectedIndex].value)">
                              <option value="����" selected>����</option>
                              <option value="����">����</option>
                              <option value="����">����</option>
                              <option value="����">����</option>
                            </select>
�ֺ�<span class="pt9">
<select 
      name=size class="wenbenkuang" onChange="showsize(this.options[this.selectedIndex].value)">
  <option value=1>1</option>
  <option value=2>2</option>
  <option 
        value=3 selected>3</option>
  <option value=4>4</option>
  <option value="5">5</option>
  <option value="6">6</option>
  <option value="7">7</option>
</select>
��ɫ
<select onChange="showcolor(this.options[this.selectedIndex].value)" name="color" size="1" class="wenbenkuang" id="select">
  <option selected>Ĭ����ɫ</option>
  <option style="color:#FF0000" value="#FF0000">��ɫ����</option>
  <option style="color:#0000FF" value="#0000ff">��ɫ����</option>
  <option style="color:#ff00ff" value="#ff00ff">��ɫ����</option>
  <option style="color:#009900" value="#009900">��ɫ�ഺ</option>
  <option style="color:#009999" value="#009999">��ɫ��ˬ</option>
  <option style="color:#990099" value="#990099">��ɫ�н�</option>
  <option style="color:#990000" value="#990000">��ҹ�˷�</option>
  <option style="color:#000099" value="#000099">��������</option>
  <option style="color:#999900" value="#999900">�����Ʒ�</option>
  <option style="color:#ff9900" value="#ff9900">�ֽ�����</option>
  <option style="color:#0099ff" value="#0099ff">��������</option>
  <option style="color:#9900ff" value="#9900ff">��������</option>
  <option style="color:#ff0099" value="#ff0099">���İ�ʾ</option>
  <option style="color:#006600" value="#006600">ī�����</option>
  <option style="color:#999999" value="#999999">��������</option>
</select>
</span></td>
                      </tr>
                      <tr>
                        <td align="right" width="14%">�������ݣ�</td>
                        <td width="86%">
						   <div class="file">						  
						     <textarea name="file" cols="75" rows="20" id="file" style="border:0px;width:520px;"><?php echo $arr[0]['content']; ?></textarea>
						   </div>						</td>
                      </tr>
                      <tr align="center">
                        <td colspan="2">&nbsp;<input id="artid" name="artid" type="hidden" value="<?php echo $_GET['artid']; ?>" /><input id="modbtn" type="submit"  value="�޸�" style="border:1px #000000 solid;" onclick="return chk()"/></td></tr>
                  </table>
				  </form>
				  </td>
                </tr>
              </table>