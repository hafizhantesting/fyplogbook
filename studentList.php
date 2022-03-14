<?php 
session_start(); 
$id = $_SESSION['id'];
include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Week List</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
  	<h2 style="text-align: center; width: 100%;">Logbook</h2>
	  
  </div>
  <div class="header">
  	<h3 style="text-align: center;">Student List</h3>
  </div>
</div>
<form style="text-align: center;" method="post">
<?php include('errors.php'); ?>
Select Student
<select style="width: 100px"; name="test" class="form-control">
<option value="pick"></option>
<?php
$sql = mysqli_query($db, "SELECT id_stu From relationship WHERE id_fac = '$id'");
$row = mysqli_num_rows($sql);
while ($row = mysqli_fetch_array($sql)){
echo "<option value='". $row['id_stu'] ."'>" .$row['id_stu'] ."</option>" ;
}
?>
</select> 
<input type="submit" value="Select" name="submit"/><br><br>


<div >
Add Student 	  
<textarea input="text" name="add" style=width:20%; rows="1";></textarea>
<button style="background-color:grey;" class="button" name="add_stu">Add</button><br><br>
<!-- //<input type="submit" value="Add" name="add_stu"/> -->
</div>

Remove Student
<select style="width: 100px"; name="remove" class="form-control">
<option value="pick"></option>
<?php
$sql = mysqli_query($db, "SELECT id_stu From relationship WHERE id_fac = '$id'");
$row = mysqli_num_rows($sql);
while ($row = mysqli_fetch_array($sql)){
echo "<option value='". $row['id_stu'] ."'>" .$row['id_stu'] ."</option>" ;
}
?>
</select> 
<input type="submit" value="Remove" name="remove_stu"/><br><br>
<?php  if (isset($_SESSION['id'])) : ?>
    	<!-- <p>Welcome <strong><?php echo $_SESSION['id']; ?></strong></p> -->
    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>

   <?php
    if(isset($_POST['submit'])){
        if(isset($_POST['test'])){
        $_SESSION['test']= $_POST['test'];
        header('location: fac_weekList.php');
    }
    }
    if(isset($_POST['add_stu'])){
      $new_student = mysqli_real_escape_string($db, $_POST['add']);
      $query = "SELECT * FROM relationship WHERE id_stu = '$new_student' AND id_fac is null";
      $results = mysqli_query($db, $query);
      while($row=mysqli_fetch_array($results, MYSQLI_ASSOC)) {
       //$gg = $row['id_stu'];
        
        if (mysqli_num_rows($results) == 1) {
          $sql = mysqli_query($db, "UPDATE relationship SET id_fac = '$id' WHERE id_stu = '$new_student'");
          header('location: studentList.php');
          }
        else {
          header('location: index.php');
            echo "Student not found";
        }
      }
    }
    
  if(isset($_POST['remove'])){
    if(isset($_POST['remove_stu'])){
    $remove_student = $_POST['remove'];

    $sql = mysqli_query($db, "DELETE from relationship WHERE id_stu = '$remove_student'");
    $sql = mysqli_query($db, "INSERT INTO relationship (id_stu) VALUES ('$remove_student')");    
    header('location: studentList.php');
  }
}

    ?>
       </form>
</body>
</html>