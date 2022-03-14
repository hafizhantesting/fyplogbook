<?php 
session_start(); 
$id = $_SESSION['id'];
$student = $_SESSION['test']; 
include('server.php') 
?>
<!DOCTYPE html>
<html>
<style>
	a {text-align: left;}
	</style>
<head>
  <title>Week 5</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <style>
	  textarea {
		  resize: none;
	  }
	  </style>
</head>
<body>
  <div class="header">
  	<h2 style="text-align: center; width: 100%;">Logbook</h2>
	  
  </div>
  <div class="header">
  	<h3 style="text-align: center;">Week 5</h3>
  </div>
  <form method="post" action="fac_week5.php">
  	<!-- <?php include('errors.php'); ?> -->
	  <table style="height: 20px; width: 473.288px;">
<tbody>
<tr>
<td style="width: 218px; text-align: left;">
<div class="input-group"><label>Date</label>
<?php 
		$query="SELECT date FROM week5 WHERE id_stu='$student'";
		$results = mysqli_query($db, $query);
		$row=mysqli_fetch_array($results, MYSQLI_ASSOC);
		$gg = $row['date'];
		?>
		<input readonly name="date" type="date" value=<?php echo $gg; ?>>
		</div>
</td>
<td style="width: 240.288px; text-align: left;">
<div class="input-group"><label>Course</label>
<?php 
		$query="SELECT courseCode FROM week5 WHERE id_stu='$student'";
		$results = mysqli_query($db, $query);
		$row=mysqli_fetch_array($results, MYSQLI_ASSOC);
		$gg = $row['courseCode'];
		?> 
		<input readonly name="course" type="text" value=<?php echo $gg; ?>>
		</div>
</td>
</tr>
</tbody>
</table>
  	<div class="input-group">
  		<label>Soft Skills</label><br>
		<?php 
		$query="SELECT softSkill FROM week5 WHERE id_stu='$student'";
		$results = mysqli_query($db, $query);
		$row=mysqli_fetch_array($results, MYSQLI_ASSOC);
		$gg = $row['softSkill'];
		?>
  		<textarea readonly input="text" name="softSkills" style=width:100%; rows="5";><?php echo $gg; ?></textarea>

  	</div>
  	<div class="input-group">
  		<label>Technical Skills</label><br>
  		<?php 
		$query="SELECT tecSkill FROM week5 WHERE id_stu='$student'";
		$results = mysqli_query($db, $query);
		$row=mysqli_fetch_array($results, MYSQLI_ASSOC);
		$gg = $row['tecSkill'];
		?>
  		<textarea readonly input="text" name="tecSkills" style=width:100%; rows="5";><?php echo $gg; ?></textarea>

    <div class="input-group">
  		<label>Weekly Conclusion</label><br>
  		<?php 
		$query="SELECT conc FROM week5 WHERE id_stu='$student'";
		$results = mysqli_query($db, $query);
		$row=mysqli_fetch_array($results, MYSQLI_ASSOC);
		$gg = $row['conc'];
		?>
  		<textarea readonly input="text" name="weekConc" style=width:100%; rows="5";><?php echo $gg; ?></textarea>

  	</div>
    <div class="input-group">
  		<label>Facilitator Feedback</label><br>
        <?php 
		$query="SELECT comment FROM week5 WHERE id_stu='$student'";
		$results = mysqli_query($db, $query);
		$row=mysqli_fetch_array($results, MYSQLI_ASSOC);
		$gg = $row['comment'];
		?>
  		<textarea input="text" name="faciFeed" style=width:100%; rows="5";><?php echo $gg; ?></textarea>
  	</div>
  	<div style="text-align:right" class="input-group">
	  	<button style="background-color:grey;" class="btn" name="back">Back</button>
  		<button type="submit" class="btn" name="okay">OK</button>
  	</div>
	  <?php
	  if (isset($_POST['okay'])) {
			$_SESSION['id'] = $id;
            $_SESSION['test'] = $student; 
			$ff = mysqli_real_escape_string($db, $_POST['faciFeed']);
	
			$query1 = "UPDATE week5 SET comment='$ff' WHERE id_stu='$student'";
			if (mysqli_query($db, $query1)) {
				header('location: fac_week5.php');	
			  echo "Record updated successfully";
			} else {
			  echo "Error updating record";
			}
		  }
	    elseif (isset($_POST['back'])) {
			$_SESSION['id'] = $id;
            $_SESSION['test'] = $student; 
			header("location: fac_weekList.php");	
		  }
		  
		
	  ?>
  	
  </form>
</body>
</html>