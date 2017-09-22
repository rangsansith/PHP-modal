<?php
	include_once '../conn/conn.php';
?>
<script language="javascript" src="../js/query.js"></script>
<table border="0" cellpadding="0" cellspacing="0" align="center">
<form id="queryfm" name="queryfm" method="post" action="article.php?act=query" onSubmit="return chkquery()">
	<tr>
		<td width="50" height="25">查询：</td>
		<td width="100">
		<select id="querymem" name="querymem" onChange="return changequery()">
			<option value="id">文章id</option>
			<option value="typename">文章类别</option>
			<option value="title">文章标题</option>
			<option value="author">文章作者</option>
			<option value="examine">审核状态</option>
			<option value="firsttime">发表时间</option>
			<option value="hitnum">点击率</option>
			<option value="renum">回复率</option>
		</select>
		</td>
		<td width="50" align="center" valign="middle"><div id="sign">
		<select id="signslt" name="signslt">
			<Option value="&gt;">大于</Option>
			<option value="=">等于</option>
			<option value="&lt;">小于</option>
		</select>
		</div></td>
		<td width="100"><div id="input"><input id="cont" name="cont" type="text" size="30" /></div></td>
		<td><input id="querybt" name="querybt" type="submit" value="查询"></td>
	</tr>
</form>
</table>