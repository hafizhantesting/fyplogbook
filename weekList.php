<?php 
session_start(); 
$id = $_SESSION['id'];
if (!isset($_SESSION['id'])) {
   $_SESSION['msg'] = "You must log in first";
   header('location: login.php');
}
if (isset($_GET['logout'])) {
   session_destroy();
   unset($_SESSION['id']);
  header("location: login.php");
} 
include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Week List</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
  	<h2 style= width: 100%;">Logbook</h2>
	  
  </div>
  <div class="header">
  	<h3>Week List</h3>
  </div>
</div>
<form method="post">
  	<div style="text-align:center" class="input-group">  
     <?php
        $query = "SELECT progress FROM week1 WHERE id_stu='$id'";
        $query2 = "SELECT comment FROM week1 WHERE id_stu='$id'";
        $results = mysqli_query($db, $query);
        $results2 = mysqli_query($db, $query2);
        while($row=mysqli_fetch_array($results, MYSQLI_ASSOC)) {
         while($row2=mysqli_fetch_array($results2, MYSQLI_ASSOC)) {
         $gg = $row['progress'];
         $gg2 = $row2['comment'];
         if (($gg == 1)&&(!empty($gg2))) {
            echo ' <button type="week_1" style="background-color:blue;color:black;width:100%;height:50;font-size:100%; class="btn_week" name="week_1">WEEK 1 &check;</button><br><br> ';
           }
           elseif ($gg == 1) {
            echo ' <button type="week_1" style="background-color:green;color:black;width:100%;height:50;font-size:100%; class="btn_week" name="week_1">WEEK 1</button><br><br> ';
           }
           else {
            echo ' <button type="week_1" style="background-color:red;color:black;width:100%;height:50;font-size:100%; class="btn_week" name="week_1">WEEK 1</button><br><br> ';
         }
       }
      }

	$query = "SELECT progress FROM week2 WHERE id_stu='$id'";
        $query2 = "SELECT comment FROM week2 WHERE id_stu='$id'";
        $results = mysqli_query($db, $query);
        $results2 = mysqli_query($db, $query2);
        while($row=mysqli_fetch_array($results, MYSQLI_ASSOC)) {
         while($row2=mysqli_fetch_array($results2, MYSQLI_ASSOC)) {
         $gg = $row['progress'];
         $gg2 = $row2['comment'];
         if (($gg == 1)&&(!empty($gg2))) {
            echo ' <button type="week_2" style="background-color:blue;color:black;width:100%;height:50;font-size:100%; class="btn_week" name="week_2">WEEK 2 &check;</button><br><br> ';
           }
           elseif ($gg == 1) {
            echo ' <button type="week_2" style="background-color:green;color:black;width:100%;height:50;font-size:100%; class="btn_week" name="week_2">WEEK 2</button><br><br> ';
           }
           else {
            echo ' <button type="week_2" style="background-color:red;color:black;width:100%;height:50;font-size:100%; class="btn_week" name="week_2">WEEK 2</button><br><br> ';
         }
       }
      }
	$query = "SELECT progress FROM week3 WHERE id_stu='$id'";
        $query2 = "SELECT comment FROM week3 WHERE id_stu='$id'";
        $results = mysqli_query($db, $query);
        $results2 = mysqli_query($db, $query2);
        while($row=mysqli_fetch_array($results, MYSQLI_ASSOC)) {
         while($row2=mysqli_fetch_array($results2, MYSQLI_ASSOC)) {
         $gg = $row['progress'];
         $gg2 = $row2['comment'];
         if (($gg == 1)&&(!empty($gg2))) {
            echo ' <button type="week_3" style="background-color:blue;color:black;width:100%;height:50;font-size:100%; class="btn_week" name="week_3">WEEK 3 &check;</button><br><br> ';
           }
           elseif ($gg == 1) {
            echo ' <button type="week_3" style="background-color:green;color:black;width:100%;height:50;font-size:100%; class="btn_week" name="week_3">WEEK 3</button><br><br> ';
           }
           else {
            echo ' <button type="week_3" style="background-color:red;color:black;width:100%;height:50;font-size:100%; class="btn_week" name="week_3">WEEK 3</button><br><br> ';
         }
       }
      }
	$query = "SELECT progress FROM week4 WHERE id_stu='$id'";
        $query2 = "SELECT comment FROM week4 WHERE id_stu='$id'";
        $results = mysqli_query($db, $query);
        $results2 = mysqli_query($db, $query2);
        while($row=mysqli_fetch_array($results, MYSQLI_ASSOC)) {
         while($row2=mysqli_fetch_array($results2, MYSQLI_ASSOC)) {
         $gg = $row['progress'];
         $gg2 = $row2['comment'];
         if (($gg == 1)&&(!empty($gg2))) {
            echo ' <button type="week_4" style="background-color:blue;color:black;width:100%;height:50;font-size:100%; class="btn_week" name="week_4">WEEK 4 &check;</button><br><br> ';
           }
           elseif ($gg == 1) {
            echo ' <button type="week_4" style="background-color:green;color:black;width:100%;height:50;font-size:100%; class="btn_week" name="week_4">WEEK 4</button><br><br> ';
           }
           else {
            echo ' <button type="week_4" style="background-color:red;color:black;width:100%;height:50;font-size:100%; class="btn_week" name="week_4">WEEK 4</button><br><br> ';
         }
       }
      }
	$query = "SELECT progress FROM week5 WHERE id_stu='$id'";
        $query2 = "SELECT comment FROM week5 WHERE id_stu='$id'";
        $results = mysqli_query($db, $query);
        $results2 = mysqli_query($db, $query2);
        while($row=mysqli_fetch_array($results, MYSQLI_ASSOC)) {
         while($row2=mysqli_fetch_array($results2, MYSQLI_ASSOC)) {
         $gg = $row['progress'];
         $gg2 = $row2['comment'];
         if (($gg == 1)&&(!empty($gg2))) {
            echo ' <button type="week_5" style="background-color:blue;color:black;width:100%;height:50;font-size:100%; class="btn_week" name="week_5">WEEK 5 &check;</button><br><br> ';
           }
           elseif ($gg == 1) {
            echo ' <button type="week_5" style="background-color:green;color:black;width:100%;height:50;font-size:100%; class="btn_week" name="week_5">WEEK 5</button><br><br> ';
           }
           else {
            echo ' <button type="week_5" style="background-color:red;color:black;width:100%;height:50;font-size:100%; class="btn_week" name="week_5">WEEK 5</button><br><br> ';
         }
       }
      }
	$query = "SELECT progress FROM week6 WHERE id_stu='$id'";
        $query2 = "SELECT comment FROM week6 WHERE id_stu='$id'";
        $results = mysqli_query($db, $query);
        $results2 = mysqli_query($db, $query2);
        while($row=mysqli_fetch_array($results, MYSQLI_ASSOC)) {
         while($row2=mysqli_fetch_array($results2, MYSQLI_ASSOC)) {
         $gg = $row['progress'];
         $gg2 = $row2['comment'];
         if (($gg == 1)&&(!empty($gg2))) {
            echo ' <button type="week_6" style="background-color:blue;color:black;width:100%;height:50;font-size:100%; class="btn_week" name="week_6">WEEK 6 &check;</button><br><br> ';
           }
           elseif ($gg == 1) {
            echo ' <button type="week_6" style="background-color:green;color:black;width:100%;height:50;font-size:100%; class="btn_week" name="week_6">WEEK 6</button><br><br> ';
           }
           else {
            echo ' <button type="week_6" style="background-color:red;color:black;width:100%;height:50;font-size:100%; class="btn_week" name="week_6">WEEK 6</button><br><br> ';
         }
       }
      }
	$query = "SELECT progress FROM week7 WHERE id_stu='$id'";
        $query2 = "SELECT comment FROM week7 WHERE id_stu='$id'";
        $results = mysqli_query($db, $query);
        $results2 = mysqli_query($db, $query2);
        while($row=mysqli_fetch_array($results, MYSQLI_ASSOC)) {
         while($row2=mysqli_fetch_array($results2, MYSQLI_ASSOC)) {
         $gg = $row['progress'];
         $gg2 = $row2['comment'];
         if (($gg == 1)&&(!empty($gg2))) {
            echo ' <button type="week_7" style="background-color:blue;color:black;width:100%;height:50;font-size:100%; class="btn_week" name="week_7">WEEK 7 &check;</button><br><br> ';
           }
           elseif ($gg == 1) {
            echo ' <button type="week_7" style="background-color:green;color:black;width:100%;height:50;font-size:100%; class="btn_week" name="week_7">WEEK 7</button><br><br> ';
           }
           else {
            echo ' <button type="week_7" style="background-color:red;color:black;width:100%;height:50;font-size:100%; class="btn_week" name="week_7">WEEK 7</button><br><br> ';
         }
       }
      }
	$query = "SELECT progress FROM week8 WHERE id_stu='$id'";
        $query2 = "SELECT comment FROM week8 WHERE id_stu='$id'";
        $results = mysqli_query($db, $query);
        $results2 = mysqli_query($db, $query2);
        while($row=mysqli_fetch_array($results, MYSQLI_ASSOC)) {
         while($row2=mysqli_fetch_array($results2, MYSQLI_ASSOC)) {
         $gg = $row['progress'];
         $gg2 = $row2['comment'];
         if (($gg == 1)&&(!empty($gg2))) {
            echo ' <button type="week_8" style="background-color:blue;color:black;width:100%;height:50;font-size:100%; class="btn_week" name="week_8">WEEK 8 &check;</button><br><br> ';
           }
           elseif ($gg == 1) {
            echo ' <button type="week_8" style="background-color:green;color:black;width:100%;height:50;font-size:100%; class="btn_week" name="week_8">WEEK 8</button><br><br> ';
           }
           else {
            echo ' <button type="week_8" style="background-color:red;color:black;width:100%;height:50;font-size:100%; class="btn_week" name="week_8">WEEK 8</button><br><br> ';
         }
       }
      }
	$query = "SELECT progress FROM week9 WHERE id_stu='$id'";
        $query2 = "SELECT comment FROM week9 WHERE id_stu='$id'";
        $results = mysqli_query($db, $query);
        $results2 = mysqli_query($db, $query2);
        while($row=mysqli_fetch_array($results, MYSQLI_ASSOC)) {
         while($row2=mysqli_fetch_array($results2, MYSQLI_ASSOC)) {
         $gg = $row['progress'];
         $gg2 = $row2['comment'];
         if (($gg == 1)&&(!empty($gg2))) {
            echo ' <button type="week_9" style="background-color:blue;color:black;width:100%;height:50;font-size:100%; class="btn_week" name="week_9">WEEK 9 &check;</button><br><br> ';
           }
           elseif ($gg == 1) {
            echo ' <button type="week_9" style="background-color:green;color:black;width:100%;height:50;font-size:100%; class="btn_week" name="week_9">WEEK 9</button><br><br> ';
           }
           else {
            echo ' <button type="week_9" style="background-color:red;color:black;width:100%;height:50;font-size:100%; class="btn_week" name="week_9">WEEK 9</button><br><br> ';
         }
       }
      }
	$query = "SELECT progress FROM week10 WHERE id_stu='$id'";
        $query2 = "SELECT comment FROM week10 WHERE id_stu='$id'";
        $results = mysqli_query($db, $query);
        $results2 = mysqli_query($db, $query2);
        while($row=mysqli_fetch_array($results, MYSQLI_ASSOC)) {
         while($row2=mysqli_fetch_array($results2, MYSQLI_ASSOC)) {
         $gg = $row['progress'];
         $gg2 = $row2['comment'];
         if (($gg == 1)&&(!empty($gg2))) {
            echo ' <button type="week_10" style="background-color:blue;color:black;width:100%;height:50;font-size:100%; class="btn_week" name="week_10">WEEK 10 &check;</button><br><br> ';
           }
           elseif ($gg == 1) {
            echo ' <button type="week_10" style="background-color:green;color:black;width:100%;height:50;font-size:100%; class="btn_week" name="week_10">WEEK 10</button><br><br> ';
           }
           else {
            echo ' <button type="week_10" style="background-color:red;color:black;width:100%;height:50;font-size:100%; class="btn_week" name="week_10">WEEK 10</button><br><br> ';
         }
       }
      }
	$query = "SELECT progress FROM week11 WHERE id_stu='$id'";
        $query2 = "SELECT comment FROM week11 WHERE id_stu='$id'";
        $results = mysqli_query($db, $query);
        $results2 = mysqli_query($db, $query2);
        while($row=mysqli_fetch_array($results, MYSQLI_ASSOC)) {
         while($row2=mysqli_fetch_array($results2, MYSQLI_ASSOC)) {
         $gg = $row['progress'];
         $gg2 = $row2['comment'];
         if (($gg == 1)&&(!empty($gg2))) {
            echo ' <button type="week_11" style="background-color:blue;color:black;width:100%;height:50;font-size:100%; class="btn_week" name="week_11">WEEK 11 &check;</button><br><br> ';
           }
           elseif ($gg == 1) {
            echo ' <button type="week_11" style="background-color:green;color:black;width:100%;height:50;font-size:100%; class="btn_week" name="week_11">WEEK 11</button><br><br> ';
           }
           else {
            echo ' <button type="week_11" style="background-color:red;color:black;width:100%;height:50;font-size:100%; class="btn_week" name="week_11">WEEK 11</button><br><br> ';
         }
       }
      }
	$query = "SELECT progress FROM week12 WHERE id_stu='$id'";
        $query2 = "SELECT comment FROM week12 WHERE id_stu='$id'";
        $results = mysqli_query($db, $query);
        $results2 = mysqli_query($db, $query2);
        while($row=mysqli_fetch_array($results, MYSQLI_ASSOC)) {
         while($row2=mysqli_fetch_array($results2, MYSQLI_ASSOC)) {
         $gg = $row['progress'];
         $gg2 = $row2['comment'];
         if (($gg == 1)&&(!empty($gg2))) {
            echo ' <button type="week_12" style="background-color:blue;color:black;width:100%;height:50;font-size:100%; class="btn_week" name="week_12">WEEK 12 &check;</button><br><br> ';
           }
           elseif ($gg == 1) {
            echo ' <button type="week_12" style="background-color:green;color:black;width:100%;height:50;font-size:100%; class="btn_week" name="week_12">WEEK 12</button><br><br> ';
           }
           else {
            echo ' <button type="week_12" style="background-color:red;color:black;width:100%;height:50;font-size:100%; class="btn_week" name="week_12">WEEK 12</button><br><br> ';
         }
       }
      }
	$query = "SELECT progress FROM week13 WHERE id_stu='$id'";
        $query2 = "SELECT comment FROM week13 WHERE id_stu='$id'";
        $results = mysqli_query($db, $query);
        $results2 = mysqli_query($db, $query2);
        while($row=mysqli_fetch_array($results, MYSQLI_ASSOC)) {
         while($row2=mysqli_fetch_array($results2, MYSQLI_ASSOC)) {
         $gg = $row['progress'];
         $gg2 = $row2['comment'];
         if (($gg == 1)&&(!empty($gg2))) {
            echo ' <button type="week_13" style="background-color:blue;color:black;width:100%;height:50;font-size:100%; class="btn_week" name="week_13">WEEK 13 &check;</button><br><br> ';
           }
           elseif ($gg == 1) {
            echo ' <button type="week_13" style="background-color:green;color:black;width:100%;height:50;font-size:100%; class="btn_week" name="week_13">WEEK 13</button><br><br> ';
           }
           else {
            echo ' <button type="week_13" style="background-color:red;color:black;width:100%;height:50;font-size:100%; class="btn_week" name="week_13">WEEK 13</button><br><br> ';
         }
       }
      }
	$query = "SELECT progress FROM week14 WHERE id_stu='$id'";
        $query2 = "SELECT comment FROM week14 WHERE id_stu='$id'";
        $results = mysqli_query($db, $query);
        $results2 = mysqli_query($db, $query2);
        while($row=mysqli_fetch_array($results, MYSQLI_ASSOC)) {
         while($row2=mysqli_fetch_array($results2, MYSQLI_ASSOC)) {
         $gg = $row['progress'];
         $gg2 = $row2['comment'];
         if (($gg == 1)&&(!empty($gg2))) {
            echo ' <button type="week_14" style="background-color:blue;color:black;width:100%;height:50;font-size:100%; class="btn_week" name="week_14">WEEK 14 &check;</button><br><br> ';
           }
           elseif ($gg == 1) {
            echo ' <button type="week_14" style="background-color:green;color:black;width:100%;height:50;font-size:100%; class="btn_week" name="week_14">WEEK 14</button><br><br> ';
           }
           else {
            echo ' <button type="week_14" style="background-color:red;color:black;width:100%;height:50;font-size:100%; class="btn_week" name="week_14">WEEK 14</button><br><br> ';
         }
       }
      }
        ?>
            <?php  if (isset($_SESSION['id'])) : ?>
    	      <!-- <p>Welcome <strong><?php echo $_SESSION['id']; ?></strong></p> -->
    	      <p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
         <?php endif ?>
  	</div>
   </form>

</body>
</html>