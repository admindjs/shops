<?php
$id=$_GET['id'];
 // $id=1;
$db=include './pdo.php';
 $catch =include './demo1.php';
$data=[];
	if($catch->get($id)){
$num=$catch->autos($id);
	echo $num;
}else{
	echo '1';
		$sql= "select * from area_copy where id=$id";
	$data=$db->query($sql)->fetch(PDO::FETCH_ASSOC);
	// $catch->data($data);
	$catch->sets($id,$data);

}

?>