<?php
include 'connect.php';
$userid = $_REQUEST['userid'];
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="Images/system.png" type="image/png" sizes="16x16">
  <title>Requests Made</title>
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
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }

      table, th, td {
          border: 1px solid black;
          border-collapse: collapse;
          font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          

        }
           th, td {
           padding: 10px;
          padding-right: 100px;
          text-align: left;


          }
          tr:nth-child(even){
          background-color: lightgrey
            }

      input.submit{
        background-color: #4CAF50;
        color: white;
        padding: 5px 20px;
        margin: 8px 0;
        border: none;
        font-family:Arial;
        cursor: pointer;
      }

       input.submit:hover {
                      opacity: 0.8;
                  }

        input.request{
              padding: 5px 5px;
              width:50px;
        }

        a.edit{
                    background-color: #4CAF50;
                    color: white;
                    padding: 5px 20px;
                    margin: 8px 0;
                    border: none;
                    font-family: "Trebuchet MS", Arial;
                    cursor: pointer;
                  }

                  a.edit:hover{
                          opacity: 0.8;
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
        <h4>ADMIN DASHBOARD</h4>
      </u>    
      <ul class="nav nav-pills nav-stacked">
          <li><a href="admin.php?userid=<?php echo $userid; ?>">Stock Management</a></li>
          <li><a href="usersmgmt.php?userid=<?php echo $userid; ?>">Users Management</a></li>
          <li><a href="areqstatus.php?userid=<?php echo $userid; ?>">Make a request</a></li>
          <li class="active"><a href="astatus.php?userid=<?php echo $userid; ?>">Requests Made</a></li>
          <li><a href="logout.php">Logout</a></li>
        
        
      </ul><br>
      
    </div>
    <div>

      <form method="POST" >
        <?php
        echo 'LOGGED IN USER '.$userid;
            
                $sql = "SELECT * FROM requisition WHERE approved = 0";
               $result = mysqli_query($conn,$sql); 
//

                if (mysqli_num_rows($result) > 0) {
                    echo "<table><tr>
                                    
                                      <th>ITEM</th>
                                        <th>TIME</th>
                                          <th>QUANTITY</th>
                                            <th>DEPARTMENT REQUESTING</th>
                                              <th>APPROVAL STATUS</th>
                                              </tr>";
                    // output data of each row
                    while($row=mysqli_fetch_array($result)) {

                        echo "<tr> 

                                   <input  name='edit1' type='hidden' value='".$row["req_id"]. "' />
                                    <td>" . $row["item"]. "</td>
                                     <td>". $row["time"]. "</td>
                                      <td>" . $row["quantity"]. "</td> 
                                        <td>" . $row["dep_requesting"]. "</td> 
                                        <td>
                                          <a class='edit' name = 'approve' href='approve.php?userid=$userid&approval=".$row["req_id"]."'> APPROVE</a>
                                        </td>

                                        </tr>";
                     
                     
                    }
                    echo "</table>";
                } else {
                    echo "0 RESULTS";
                }

                $conn->close();
?>



      </form>


     
       
    </div>
</body>
</html>