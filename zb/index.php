<?php include "inc/conn.php";?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0"/>
<meta name="apple-mobile-web-app-capable" content="yes" />
<title><?php echo $title;?></title>
<script type="text/javascript" src="inc/js/ajax_wap.js"></script>
<link href="inc/css/wap.css" rel="stylesheet" type="text/css" />
<body onLoad="inst();">
<div class="sub_bod"></div>
<div class="sub_top">
	<div class="title"><?php echo $title;?></div>
	<div class="back" id="pageback"><a href="?b=back" class="d">����</a></div>  
</div><div class="main">
<?php
$stime=microtime(true); 
$codes = trim($_POST['code']);
$shujus = trim($_POST['time']);
$shuru1 = trim($_POST['name']);

if(!$shujus){
?>
<form name="queryForm" method="post" class="" action="" onsubmit="return startRequest(0);">
<div class="select" id="10">
<select name="time" id="time" onBlur="startRequest(1)" />
<?php traverse($UpDir."/");?></select>
</div>
<div class="so_box" id="11">
<input name="name" type="text" class="txts" id="name" value="" onfocus="this.value=''" onBlur="startRequest(2)" />
</div>
<div class="so_box" id="33">
<input name="code" type="text" class="txts" id="code" onfocus="this.value=''" onBlur="startRequest(3)" />
<div class="more" id="clearkey">
<img src="inc/code.php?t=<?php echo date("Y-m-d-H-i-s",time());?>" id="Codes" onClick="this.src='inc/code.php?t='+new Date();"/>
</div></div>
<div class="so_boxes">
<input type="submit" name="button" class="buts" id="sub" value="������ѯ" />
</div>
<div class="so_boxed" id="tishi">˵��:��<?php echo $tiaojian1;?>+��֤�롿��������ȷ����ʾ��Ӧ�����</div>
<div id="tishi1" style="display:none;">�������������ռ����<?php echo $tiaojian1;?></div>
<div id="tishi4" style="display:none;">����4������֤��</div>
</form>
<?php
}else{

session_start();
if($codes!=$_SESSION['PHP_M2T']){
 webalert("����ȷ������֤�룡");
}

if(!$shuru1){
 webalert("������$tiaojian1!");
}
$files = $UpDir."/".$shujus.".dat";

if(!file_exists($files)){
 webalert('�������ݿ��ļ�');
}
$file = fopen($files,'r'); 
while ($data = fgetcsv($file)){
$arra[] = $data;
}
//print_r($arra);
echo '<!--startprint-->';
echo ''; 
foreach($arra as $keyx=>$valx) 
{ 
 $ii++;
    if($ii=="1"){
 $val1=$valx;
 //echo '<tr class="tt">';
      $io=0; 
      $iaa=""; 
 foreach($valx as $keyy=>$valy) 
 { 
 //echo '<td class="r">['.$keyx.']['.$keyy.']</td>';
 //echo '<td class="span">'.$valy.'</td>';
      $io++; 
    if($valy==$tiaojian1){
      $iaa=$io-1; 
    }
 } 
    if(strlen($iaa)<1){   //if($iaa){
 webalert('����Excel���ݵ�1���Ƿ���ڡ�'.$tiaojian1.'���ֶ�!');
    }
 //echo '</tr>';
    }else{
//	����1:ֱ��ͨ���趨�ģ�1-3������ѯ������ѯ

if("_".$shuru1=="_".$valx[$iaa]){
echo "<!-- $shuru1=='.$valx[$iaa].' <br>\r\n--> ";
 $iae++;
echo '<table cellspacing="0">';
echo "<caption align='center'>��ѯ���$iae</caption>";
 foreach($valx as $keyy=>$valy) 
 { 
 echo '<tr>';
 echo "<td class='r'>".$arra[0][$keyy]."</td>";
 echo '<td class="span">'.$valy.'</td>';
 echo '</tr>';
 } 
  echo '</table>';
 }
 }
fclose($file);
}

if($iae<1){
echo '<table cellspacing="0">';
echo '<tr>';
 echo "<td colspan='2'>û�в�ѯ��$shujus $tiaojian1 = $shuru1 �������ϢŶ</td>";
echo '</tr></table>';
}

echo '<!--endprint-->';
fclose($filer);
?><div class="so_boxes"><input type="button" value="�� ��" class="buts" onclick="location.href='index.php';" id="reset"></div>
<?php 
}
$etime=microtime(true);//��ȡ����ִ�н�����ʱ��
$total=$etime-$stime;   //�����ֵ
echo "<!----ҳ��ִ��ʱ�䣺{$total} ]��--->";
?></div>
<div class="foot">
  <div class="title">
    <span>&copy;<?php echo date('Y');?>  <a href="<?php echo $copyu;?>" target="_blank"><?php echo $copyr;?></a>&nbsp;



</span>

  </div>
</div>
</body>
</html><script type="text/javascript" src="../index_cha.js?v=ADA_A1T"></script>