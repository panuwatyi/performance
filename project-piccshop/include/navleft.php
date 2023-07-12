<?php
$sql1 ="SELECT * FROM tb_type ORDER BY type_id asc";
$result1 = mysqli_query($con,$sql1);
?>
<ul class="nav nav-pills nav-stacked">
	<?php 
	while($row1 = mysqli_fetch_array($result1)){
	?>
	<li><a href="type.php?type_name=<?php echo $row1['type_name']; ?>"><?php echo $row1['type_name']; ?></a></li>
    <?php } ?>
</ul>