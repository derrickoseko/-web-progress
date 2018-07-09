<?php
include 'connect.php';
$userid = $_REQUEST['userid'];
?>

<!DOCTYPE html>
<html>

<head>

<link rel="icon" href="Images/system.png" type="image/png" sizes="16x16">
	<title>User Management</title>
	  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 600px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 100px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto}; 
    }

   body {font-family: Arial;}
* {box-sizing: border-box}

/* Full-width input fields */
input[type=text], input[type=password] {
    width: 50%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
}

hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 10px 18px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 20%;
    opacity: 0.9;
}

button:hover {
    opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
    padding: 10px 18px;
    background-color: #f44336;
    width: 20%;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 40%;
}


/* Clear floats */
.clearfix::after {
    content: "";
    clear: both;
    display: table;
  

}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 350px) {
    .cancelbtn, .signupbtn {
       width: 5%;
    }
}

.position{
  margin-left: 350px;
}

.in{
  background-color:#4CAF50;
  color:white;
  font-family:'Arial';
  padding-right: : 5px;
  width: 100px;
  height: 50px;
  border: none;
}

.out{
 background-color: #f44336;
  color:white; 
  font-family:'Arial';
  padding-right: : 5px;
  width: 100px;
  height: 50px;
  border: none;
}
input:hover {
                      opacity: 0.8;
                  }

div.position{
  position: absolute;
  resize: none;
    overflow: auto;
    border-style: solid;
    border-width: thin;
    width: 70%;
    margin-left: 350px;
    background-color: lightgrey;
  }

  .space{
  width: 500px;
}
 
  .rle{
    width: 470px;
    height: 55  px;
  }


  </style>


</head>
<body>
		<h2>Welcome Admin</h2>

      <hr>

    <div class="container-fluid">
      <div class="row content">
        <div class="col-sm-3 sidenav">
          <u>
            <h4>ADMINS DASHBOARD</h4>
          </u>
            
                <ul class="nav nav-pills nav-stacked">
                    
                    <li class=""><a href="admin.php?userid=<?php echo $userid; ?>">Stock Magement</a></li>
                    <li class="active"><a href="usersmgmt.php?userid=<?php echo $userid; ?>">Users Management</a></li>
                    <li><a href="areqstatus.php?userid=<?php echo $userid; ?>">Make a request</a></li>
                    <li><a href="astatus.php?userid=<?php echo $userid; ?>">Requests Made</a></li>
                    <li><a href="logout.php?userid=<?php echo $userid; ?>">Logout</a></li>
        
      </ul><br>   
    </div>

<div class="position">
  <center>
            <form method="POST" id="" style="overflow:scroll; height:580px; border:1px solid #ccc">
               
                <strong>
                  <u>
                    <h3 >CREATE NEW USER</h3> 
                  </u>
                </strong>
                 
               
                
                <hr>

                <label><b>Username</b></label><br>  
               <input class="space" type="text" placeholder="Enter Username" name="username" required>
               <br>

                <label><b>Role</b></label> <br>
                <select class="rle" type="text" placeholder="Choose Role" name="role" required="">
                  <option value="2">Admin</option>
                  <option value="3">Supervisor</option>             
                  <option value="1">User</option>   
                </select>

                <br><br>

                <label><b>Email</b></label><br>
                <input class="space" type="text" placeholder="Enter Email" name="email" required>
                <br>

                <label><b>Password</b></label><br>
                <input class="space" type="password" placeholder="Enter Password" name="psw" required>
                <br>

                <label><b>Repeat Password</b></label><br>
                <input class="space" type="password" placeholder="Repeat Password" name="psw-repeat" required>
                <br>


             
              
              <div>
                <input class="in" type="submit" name="create" value="CREATE">
                <input class="out" type="reset" name="cancel" value="CANCEL">                  
              </div> 

             
              
              <br>
            </form>
             
       </center>         
</div>
      

<?php

if (isset($_POST['create'])) {  
 echo "Thank You";
  $username = $_POST['username']; 
  $pass = $_POST['psw']; 
  $email = $_POST['email']; 
  $role = $_POST['role'];

  

  $sql = "INSERT INTO users (user_id, username, password, email, user_type_id) values (DEFAULT,'$username','$pass','$email','$role')";
  $smsql = mysqli_query($conn,$sql);
  if ($smsql == false) {
    # code...
    echo "ERROR->".mysqli_error();
  }




}

?>
</body>
</html>