<?php
session_start();
include("header.php");
include("Config.php");
$eid= $_SESSION['employee_id'];
?>
<div id="tooplate_middle">
	<div id="mid_title">Project Detail</div>
	<div class="cleaner"></div>
</div> <!-- end of middle -->
		
<div id="tooplate_main_top"></div>
<div id="tooplate_main">
	<div id="gallery">
	
	<?php
	if(isset($_REQUEST['pid']))
				{		$p=$_REQUEST['pid'];
				}
?>
<form method="post"  enctype="multipart/form-data">
	<table width="100%" border="2">				
	<?php
	$result=mysql_query("select * from prjtbl where p_id=".$p,$con)or die("Error in Select Query1");
	if(mysql_num_rows($result)>0)
	{
		while($r=mysql_fetch_array($result))
		{ 
	?>
	<tr>
		<td>Project Name</td>
		<td align="center" width="10%">:</td>
		<td align="left"><?php echo $r[2]; ?></td></tr>
		<tr><td>Details</td><td align="center" width="10%">:</td><td align="left"><?php echo $r[5]; ?></td></tr>
<?php 
						$result1=mysql_query("select * from skilltbl where skill_id=".$r[4]);
						if(mysql_num_rows($result1)>0)
				{
					while($r1=mysql_fetch_array($result1))
					{ 
						?>
						<tr><td>Skill</td><td align="center" width="10%">:</td><td align="left"><input type="hidden" name="e_id" value="<?php echo $r1[0];?>" /><?php echo $r1[1]; ?></td></tr>
				<?php } } ?>
									
		<?php 
				$result2=mysql_query("select employee_id from completeprj where p_id=".$p);
						if(mysql_num_rows($result2)>0)
				{
					while($r2=mysql_fetch_array($result2))
					{ 
						$result3=mysql_query("select * from employee_regitbl where employee_id=".$r2[0]);
						if(mysql_num_rows($result3)>0)
				{
					while($r3=mysql_fetch_array($result3))
					{ 
						?>
						<tr><td>Completed by</td><td align="center" width="10%">:</td>
						<td align="left">
						<input type="hidden" name="e_id" value="<?php echo $r3[0];?>" />
						<?php echo $r3[4]; ?></td></tr>
				<?php } } } }?>
						<?php 
						$result4=mysql_query("select * from completeprj where p_id=".$p);
						if(mysql_num_rows($result4)>0)
				{
					while($r4=mysql_fetch_array($result4))
					{ 
						?>
					<tr><td>Date of Completation</td><td align="center" width="10%">:</td>
					<td align="left"><?php echo $r4[6]; ?></td></tr>
				<?php	
					}
				}
				}
				}
				?>
				</table>
				</form>
<?php
include("footer.php");
?>