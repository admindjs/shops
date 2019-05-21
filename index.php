<?php
$db=include './pdo.php';
 $catch =include './demo1.php';
 // $catch=new Cache();
$data=[];
$key='id_____';
if($catch->get($key)){
echo '有缓存';

	$data=$catch->get($key);
		$num=$catch->auto();

		
		if($num>10){
			$catch->del($key);
		}


}else{
	echo '没有';
	$sql= 'select * from area_copy limit 10';
	$data=$db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
	// $catch->data($data);
	$catch->set($key,$data);

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>区域</title>
</head>
<body>
	<ul>
	<?php foreach($data as $k=>$y): ?>
		<?php echo  $y['id'] ?>
		<li>
			<a href="demo2.php?id=<?php echo  $y['id'] ?>" ><?php echo $y['name'] ?></a>
		</li>
		<?php endforeach; ?>
	</ul>
</body>
</html>