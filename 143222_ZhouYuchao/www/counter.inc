<?php
function get_hitcount($counter_file)
{
/* ������������
���������������δ��ʹ�ã���ʼֵ����1
�㵱ȻҲ���԰ѳ�ʼֵ���20000��ƭ�˿�
*/
$count=0;
// �����ż������ļ��Ѿ����ڣ���ȡ���е�����
if ( file_exists($counter_file) )
{
$fp=fopen($counter_file,"r");
// ����ֻȡ��ǰ20λ��ϣ�����վ�㲻Ҫ̫�ܻ�ӭ��
$count=0+fgets($fp,20);
// ���ں���fgets()�����ַ��������ǿ���ͨ����0�ķ��������Զ�ת��Ϊ����
fclose($fp);
// ���ļ��������
}
// ����һ�μ���ֵ
$count++;
// ���µļ���ֵд���ļ�
$fp=fopen($counter_file,"w");
fputs($fp,$count);
fclose($fp);
# ���ؼ���ֵ
return ($count);
}
?>