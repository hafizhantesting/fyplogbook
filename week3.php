<?php 
session_start(); 
$id = $_SESSION['id'];
include('server.php') ?>
<!DOCTYPE html>
<html>
<style>
	a {text-align: left;}
	</style>
<head>
  <title>Week 3</title>
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
  	<h3 style="text-align: center;">Week 3</h3>
  </div>
  <form method="post" action="week3.php">
  	<?php include('errors.php'); ?>
	  <table style="height: 20px; width: 100%;">
<tbody>
<tr>
<td style="width: 50%; text-align: left;">
<div class="input-group"><label>Date</label>
<?php 
		$query="SELECT date FROM week3 WHERE id_stu='$id'";
		$results = mysqli_query($db, $query);
		$row=mysqli_fetch_array($results, MYSQLI_ASSOC);
		$gg = $row['date'];
		?>
		<input style="width: 100%;" name="date" type="date" value=<?php echo $gg; ?>>
		</div>
</td>
<td style="width: 50%; text-align: left;">
<div class="input-group"><label>Course</label>
<?php 
		$query="SELECT courseCode FROM week3 WHERE id_stu='$id'";
		$results = mysqli_query($db, $query);
		$row=mysqli_fetch_array($results, MYSQLI_ASSOC);
		$gg = $row['courseCode'];
		?> 
		<input style="width: 100%;" name="course" type="text" value=<?php echo $gg; ?>>
		</div>
</td>
</tr>
</tbody>
</table>
  	<div class="input-group">
  		<label>Soft Skills</label><br>
		<?php 
		$query="SELECT softSkill FROM week3 WHERE id_stu='$id'";
		$results = mysqli_query($db, $query);
		$row=mysqli_fetch_array($results, MYSQLI_ASSOC);
		$gg = $row['softSkill'];
		?>
  		<textarea input="text" name="softSkills" style=width:100%; rows="5";><?php echo $gg;?></textarea>

  	</div>
  	<div class="input-group">
  		<label>Technical Skills</label><br>
  		<?php 
		$query="SELECT tecSkill FROM week3 WHERE id_stu='$id'";
		$results = mysqli_query($db, $query);
		$row=mysqli_fetch_array($results, MYSQLI_ASSOC);
		$gg = $row['tecSkill'];
		?>
  		<textarea input="text" name="tecSkills" style=width:100%; rows="5";><?php echo $gg; ?></textarea>

    <div class="input-group">
  		<label>Weekly Conclusion</label><br>
  		<?php 
		$query="SELECT conc FROM week3 WHERE id_stu='$id'";
		$results = mysqli_query($db, $query);
		$row=mysqli_fetch_array($results, MYSQLI_ASSOC);
		$gg = $row['conc'];
		?>
  		<textarea input="text" name="weekConc" style=width:100%; rows="5";><?php echo $gg; ?></textarea>

  	</div>
    <div class="input-group">
  		<label>Facilitator Feedback</label><br>
		<?php 
		$query="SELECT comment FROM week3 WHERE id_stu='$id'";
		$results = mysqli_query($db, $query);
		$row=mysqli_fetch_array($results, MYSQLI_ASSOC);
		$gg = $row['comment'];
		?>
  		<textarea readonly input="text" name="faciFeed" style=width:100%; rows="5";>
		  <?php echo $gg; ?>
		</textarea>
  	</div>
  	<div style="text-align:right" class="input-group">
	  	<button style="background-color:grey;" class="btn" name="previous">Back</button>
        <button style="background-color:red;" class="btn" type="clear" class="btn" name="clear_week3">Clear</button>
  		<button type="submit" class="btn" name="submit_week3">Submit</button>
  	</div>
	  <?php
	  if (isset($_POST['clear_week3'])) {
		   $_SESSION['id'] = $id;
		   $query = "UPDATE week3 SET comment=null, courseCode=null, date=null, softSkill=null, tecSkill=null, progress=null, date=null, conc=null, comment=null WHERE id_stu='$id'";
		   if (mysqli_query($db, $query)) {
			header('location: week3.php');
		     echo "Record deleted successfully";
		   } else {
		     echo "Error deleting record";
		   }
		 }
		elseif (isset($_POST['submit_week3'])) {
			$_SESSION['id'] = $id;
			$ss = mysqli_real_escape_string($db, $_POST['softSkills']);
			$ts = mysqli_real_escape_string($db, $_POST['tecSkills']);
			$wc = mysqli_real_escape_string($db, $_POST['weekConc']);
			$cc = mysqli_real_escape_string($db, $_POST['course']);
			$dt = mysqli_real_escape_string($db, $_POST['date']);
			
			if (!empty($ss)&&empty($ts)&&empty($wc)&&empty($cc)&&empty($dt)) {

			$query1 = "UPDATE week3 SET courseCode = '$cc', date = '$dt', softSkill='$ss', tecSkill='$ts', conc='$wc', progress='1' WHERE id_stu='$id'";
			if (mysqli_query($db, $query1)) {
				header('location: week3.php');	
			  echo "Record updated successfully";
			} else {
			  echo "Error updating record";
			}
			} else {echo "Please fill all the information";}
		  }
		  elseif (isset($_POST['previous'])) {
			$_SESSION['id'] = $id;
			header('location: weekList.php');	
		  }
		  
		
	  ?>
  	
  </form>
</body>
</html>