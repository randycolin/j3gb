<?php
error_reporting(0);
header("content-Type: text/html; charset=Gb2312");//�������GBK

//���ú����������ѯ����,�ö�����
$tiaojian1="����";			//��ѯ����1�б��⣬��excel��ͷһ�£�ע���޿ո�;

$UpDir="liuyao";			//�������ݿ�����Ŀ¼(�ļ�������)���޸ģ��޸ĺ������Ӧ�ļ��С�
$title="������[����]ռ��ϵͳ";			//���ò�ѯ����,�����㶮�ġ�
$copyr="Ц������[����]���";				//���õײ���Ȩ����,�����㶮�ġ�
$copyu="http://www.j3gb.com/";			//���õײ���Ȩ����,�����㶮�ġ�





function webalert($Key){
 $html="<script>\r\n";
 $html.="alert('".$Key."');\r\n";
 $html.="history.go(-1);\r\n";
 $html.="</script>";
 exit($html);
}

function traverse($path = '.') {
 $current_dir = opendir($path);    //opendir()����һ��Ŀ¼���,ʧ�ܷ���false
 while(($file = readdir($current_dir)) !== false) {    //readdir()���ش�Ŀ¼����е�һ����Ŀ
 $sub_dir = $path . DIRECTORY_SEPARATOR . $file;    //������Ŀ¼·��
 if($file == '.' || $file == '..') {
 //continue;
 } else if(is_dir($sub_dir)) {    //�����Ŀ¼,���еݹ�
 //echo 'Directory ' . $file . ':<br>';
 //traverse($sub_dir);
 } else {    //������ļ�,ֱ�����
 
 $file = str_replace(".dat","",$file);    //�ļ������˺�׺����Ҫ����.dat
 echo '<option value="'.$file.'">' . $file . '</option>';
 }
 }
}
//	����1:ֱ��ͨ���趨�ģ�1-3������ѯ������ѯ

function fileline1($path = '.') {
   $a_content = file_get_contents($path);
   $str = strtok($a_content,"\r");
   return $str;
}

//	����1��ֱ��ͨ���趨�ģ�1-3������ѯ������ѯ

function get_file_line( $file_name, $line ){
  $n = 0;
  $handle = fopen($file_name,'r');
  if ($handle) {
    while (!feof($handle)) {
        ++$n;
        $out = fgets($handle, 4096);
        if($line==$n) break;
    }
    fclose($handle);
  }
  if( $line==$n) return $out;
  return false;
}

?>