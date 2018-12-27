<link rel='stylesheet' href="{{ asset('/css/databaseform.css')}}">
@extends('app-base')
@section('base-content')
{!! Form::open(['url' => '/database','method' => 'post']) !!}
  表: {!! Form::select('zzcdb',[
'日志'=>['Schedule' => '日志', 'Thing'=>'事件类型'],
'文章' => ['Article'=>'文章'],
'Tiger' => ['buylog'=>'购买记录','usermessage'=>'用户','prizemessage'=>'奖品'],
'学生'=>['Students'=>'学生'],
]) !!}
  {!! Form::submit('查询') !!}
{!! Form::close() !!}
<?php
$table="Schedule";
if(isset($_POST['zzcdb']))
$table=$_POST['zzcdb'];
$link;
$link=mysqli_connect("119.23.207.135","root","123456") or die("Failed connect to mysql".mysqli_error());
mysqli_select_db($link,"zzcdb") or die("无法连接到zzcdb".mysqli_error($link));
$column=array("c"=>0,"w"=>250,"h"=>30);
$result = mysqli_query($link,"SELECT * FROM ".$table." limit 50");//limit 3
$column["c"]=mysqli_num_fields($result);
echo "<div class=\"dbform\">";
for($i=0;$i<$column["c"];$i++)echo "<div class=\"border_ver\"></div>";
echo "<div class=\"border_hor clear\"></div>";
for($i=0;$i<$column["c"];$i++)
{
	echo "<div class=\"title\">"
	.mysqli_fetch_field_direct($result,$i)->name
	."</div><div class=\"border_hor\"></div>";
}
echo "<div class=\"clear\"></div>";
for($i=0;$i<$column["c"];$i++)echo "<div class=\"border_ver\"></div>";
$classmark="content1";
$rowcount=0;
$column["c"]=0;
while($row =mysqli_fetch_row($result))
{
	if($rowcount++%2==0)$classmark="content1";
		else $classmark="content2";
	echo "<div class=\"clear\"></div>";
	for($i=0;$i<$column["c"];$i++)echo "<div class=\"border_ver\"></div>";
	echo "<div class=\"border_hor clear\"></div>";
	$column["c"]=mysqli_num_fields($result);
	for($i=0;$i<$column["c"];$i++)
	{
		echo "<div class=\"".$classmark."\">"
		.$row[$i]."</div><div class=\"border_hor\"></div>";
	}
}
echo "<div class=\"clear\"></div>";
for($i=0;$i<$column["c"];$i++)echo "<div class=\"border_ver\"></div>";
echo "</div>";
mysqli_free_result($result);
mysqli_close($link);
?>
@stop




