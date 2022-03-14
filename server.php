<?php
session_start();

// initializing variables
// $id = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost:3306', 'root', '1234', 'logbook');

// register
if (isset($_POST['reg_user'])) {
  $role_type= $_POST ['role'];
  // receive all input values from the form
  $id = mysqli_real_escape_string($db, $_POST['username']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($id)) { array_push($errors, "Username is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }
  if (empty($role_type)) {  array_push($errors, "Role is not selected");
  }

  // first check the database to make sure 
  // a user does not already exist with the same id and/or email
  $user_check_query = "SELECT * FROM users WHERE id='$id' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['id'] === $id) {
      array_push($errors, "ID already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {

  	$query = "INSERT INTO users(id, password, role) VALUES('$id', '$password_1', '$role_type')";
    if ($role_type == 1) {
    $w1="INSERT INTO week1(id_stu) VALUES ('$id')";
    $w2="INSERT INTO week2(id_stu) VALUES ('$id')";
    $w3="INSERT INTO week3(id_stu) VALUES ('$id')";
    $w4="INSERT INTO week4(id_stu) VALUES ('$id')";
    $w5="INSERT INTO week5(id_stu) VALUES ('$id')";
    $w6="INSERT INTO week6(id_stu) VALUES ('$id')";
    $w7="INSERT INTO week7(id_stu) VALUES ('$id')";
    $w8="INSERT INTO week8(id_stu) VALUES ('$id')";
    $w9="INSERT INTO week9(id_stu) VALUES ('$id')";
    $w10="INSERT INTO week10(id_stu) VALUES ('$id')";
    $w11="INSERT INTO week11(id_stu) VALUES ('$id')";
    $w12="INSERT INTO week12(id_stu) VALUES ('$id')";
    $w13="INSERT INTO week13(id_stu) VALUES ('$id')";
    $w14="INSERT INTO week14(id_stu) VALUES ('$id')";
    $rel="INSERT INTO relationship(id_stu) VALUES ('$id')";
    
  	mysqli_query($db, $query);

    mysqli_query($db, $w1);
    mysqli_query($db, $w2);
    mysqli_query($db, $w3);
    mysqli_query($db, $w4);
    mysqli_query($db, $w5);
    mysqli_query($db, $w6);
    mysqli_query($db, $w7);
    mysqli_query($db, $w8);
    mysqli_query($db, $w9);
    mysqli_query($db, $w10);
    mysqli_query($db, $w11);
    mysqli_query($db, $w12);
    mysqli_query($db, $w13);
    mysqli_query($db, $w14);
    mysqli_query($db, $rel);
    }
    elseif ($role_type == 2) {
      $w1="INSERT INTO week1(id_fac) VALUES ('$id')";
      $w2="INSERT INTO week2(id_fac) VALUES ('$id')";
      $w3="INSERT INTO week3(id_fac) VALUES ('$id')";
      $w4="INSERT INTO week4(id_fac) VALUES ('$id')";
      $w5="INSERT INTO week5(id_fac) VALUES ('$id')";
      $w6="INSERT INTO week6(id_fac) VALUES ('$id')";
      $w7="INSERT INTO week7(id_fac) VALUES ('$id')";
      $w8="INSERT INTO week8(id_fac) VALUES ('$id')";
      $w9="INSERT INTO week9(id_fac) VALUES ('$id')";
      $w10="INSERT INTO week10(id_fac) VALUES ('$id')";
      $w11="INSERT INTO week11(id_fac) VALUES ('$id')";
      $w12="INSERT INTO week12(id_fac) VALUES ('$id')";
      $w13="INSERT INTO week13(id_fac) VALUES ('$id')";
      $w14="INSERT INTO week14(id_fac) VALUES ('$id')";
      
      mysqli_query($db, $query);
  
      mysqli_query($db, $w1);
      mysqli_query($db, $w2);
      mysqli_query($db, $w3);
      mysqli_query($db, $w4);
      mysqli_query($db, $w5);
      mysqli_query($db, $w6);
      mysqli_query($db, $w7);
      mysqli_query($db, $w8);
      mysqli_query($db, $w9);
      mysqli_query($db, $w10);
      mysqli_query($db, $w11);
      mysqli_query($db, $w12);
      mysqli_query($db, $w13);
      mysqli_query($db, $w14);  
    }
  	$_SESSION['id'] = $id;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: login.php');
  }
}





// login to the system
if (isset($_POST['login_user'])) {
    $id = mysqli_real_escape_string($db, $_POST['id']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($id)) {
        array_push($errors, "ID is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        //$password = md5($password);
        $query = "SELECT * FROM users WHERE id='$id' AND password='$password'";
        $role_assign = "SELECT role FROM users WHERE id='$id' AND password='$password'";

        $results = mysqli_query($db, $query);
        $results2 = mysqli_query($db, $role_assign);

        while($row=mysqli_fetch_array($results2, MYSQLI_ASSOC)) {
          $gg = $row['role'];
          
          if (($gg == 1) && (mysqli_num_rows($results) == 1)) {
            $_SESSION['id'] = $id;
            $_SESSION['success'] = "You are now logged in";
            header('location: weekList.php');
            }
            elseif (($gg == 2) && (mysqli_num_rows($results) == 1)) {
              $_SESSION['id'] = $id;
              $_SESSION['success'] = "You are now logged in";
              header('location: studentList.php');}
            else {
              array_push($errors, "Wrong ID/password combination");
          }
        }

      
    }
  }
// enter specified week
elseif (isset($_POST['week_1'])) {
  $_SESSION['id'] = $id;
  //$_SESSION['success'] = "You are now logged in";
  header('location: week1.php');
}
elseif (isset($_POST['week_2'])) {
  $_SESSION['id'] = $id;
  //$_SESSION['success'] = "You are now logged in";
  header('location: week2.php');
}
elseif (isset($_POST['week_3'])) {
  $_SESSION['id'] = $id;
  //$_SESSION['success'] = "You are now logged in";
  header('location: week3.php');
}
elseif (isset($_POST['week_4'])) {
  $_SESSION['id'] = $id;
  //$_SESSION['success'] = "You are now logged in";
  header('location: week4.php');
}
elseif (isset($_POST['week_5'])) {
  $_SESSION['id'] = $id;
  //$_SESSION['success'] = "You are now logged in";
  header('location: week5.php');
}
elseif (isset($_POST['week_6'])) {
  $_SESSION['id'] = $id;
  //$_SESSION['success'] = "You are now logged in";
  header('location: week6.php');
}
elseif (isset($_POST['week_7'])) {
  $_SESSION['id'] = $id;
  //$_SESSION['success'] = "You are now logged in";
  header('location: week7.php');
}
elseif (isset($_POST['week_8'])) {
  $_SESSION['id'] = $id;
  //$_SESSION['success'] = "You are now logged in";
  header('location: week8.php');
}
elseif (isset($_POST['week_9'])) {
  $_SESSION['id'] = $id;
  //$_SESSION['success'] = "You are now logged in";
  header('location: week9.php');
}
elseif (isset($_POST['week_10'])) {
  $_SESSION['id'] = $id;
  //$_SESSION['success'] = "You are now logged in";
  header('location: week10.php');
}
elseif (isset($_POST['week_11'])) {
  $_SESSION['id'] = $id;
  //$_SESSION['success'] = "You are now logged in";
  header('location: week11.php');
}
elseif (isset($_POST['week_12'])) {
  $_SESSION['id'] = $id;
  //$_SESSION['success'] = "You are now logged in";
  header('location: week12.php');
}
elseif (isset($_POST['week_13'])) {
  $_SESSION['id'] = $id;
  //$_SESSION['success'] = "You are now logged in";
  header('location: week13.php');
}
elseif (isset($_POST['week_14'])) {
  $_SESSION['id'] = $id;
  //$_SESSION['success'] = "You are now logged in";
  header('location: week14.php');
}







elseif (isset($_POST['fac_week_1'])) {
  $_SESSION['id'] = $id;
  $_SESSION['test'] = $student;
  //$_SESSION['success'] = "You are now logged in";
  header('location: fac_week1.php');
}
elseif (isset($_POST['fac_week_2'])) {
  $_SESSION['id'] = $id;
  //$_SESSION['success'] = "You are now logged in";
  header('location: fac_week2.php');
}
elseif (isset($_POST['fac_week_3'])) {
  $_SESSION['id'] = $id;
  //$_SESSION['success'] = "You are now logged in";
  header('location: fac_week3.php');
}
elseif (isset($_POST['fac_week_4'])) {
  $_SESSION['id'] = $id;
  //$_SESSION['success'] = "You are now logged in";
  header('location: fac_week4.php');
}
elseif (isset($_POST['fac_week_5'])) {
  $_SESSION['id'] = $id;
  //$_SESSION['success'] = "You are now logged in";
  header('location: fac_week5.php');
}
elseif (isset($_POST['fac_week_6'])) {
  $_SESSION['id'] = $id;
  //$_SESSION['success'] = "You are now logged in";
  header('location: fac_week6.php');
}
elseif (isset($_POST['fac_week_7'])) {
  $_SESSION['id'] = $id;
  //$_SESSION['success'] = "You are now logged in";
  header('location: fac_week7.php');
}
elseif (isset($_POST['fac_week_8'])) {
  $_SESSION['id'] = $id;
  //$_SESSION['success'] = "You are now logged in";
  header('location: fac_week8.php');
}
elseif (isset($_POST['fac_week_9'])) {
  $_SESSION['id'] = $id;
  //$_SESSION['success'] = "You are now logged in";
  header('location: fac_week9.php');
}
elseif (isset($_POST['fac_week_10'])) {
  $_SESSION['id'] = $id;
  //$_SESSION['success'] = "You are now logged in";
  header('location: fac_week10.php');
}
elseif (isset($_POST['fac_week_11'])) {
  $_SESSION['id'] = $id;
  //$_SESSION['success'] = "You are now logged in";
  header('location: fac_week11.php');
}
elseif (isset($_POST['fac_week_12'])) {
  $_SESSION['id'] = $id;
  //$_SESSION['success'] = "You are now logged in";
  header('location: fac_week12.php');
}
elseif (isset($_POST['fac_week_13'])) {
  $_SESSION['id'] = $id;
  //$_SESSION['success'] = "You are now logged in";
  header('location: week13.php');
}
elseif (isset($_POST['fac_week_14'])) {
  $_SESSION['id'] = $id;
  //$_SESSION['success'] = "You are now logged in";
  header('location: week14.php');
}

// elseif (isset($_POST['clear_week1'])) {
//   $_SESSION['id'] = $id;
//   $query1 = "UPDATE week1 SET softSkill=null, tecSkill=null, progress=null WHERE id='$id'";
//   if (mysqli_query($db, $query1)) {
//     echo "Record deleted successfully";
//   } else {
//     echo "Error deleting record";
//   }
// }


?>