<?php
session_start();
$_SESSION['userid'] ='';
include 'connect.php';
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="Images/system.png" type="image/png" sizes="16x16">
  <title>Supervisor Stock</title>
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

      table{
        height:100%;
      }

    th, td {
        padding: 10px;
        padding-right: 230px;
        text-align: left;


}
    tr:nth-child(even){
          background-color: lightgrey
        }


  </style>
</head>
<body>
    <h2>Welcome Supervisor</h2>

      <hr>

    <div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <u>
        <h4>SUPERVISORS DASHBOARD</h4>
      </u>
      
      <ul class="nav nav-pills nav-stacked">

        <li class="active"><a href="stock.php">Stock</a></li>
        
        <li><a href="logout.php">Logout</a></li>
        
      </ul><br>
      
    </div>

<div class="itemstable" id="" style="overflow:scroll; height:500px;">
  <?php

            
                $sql = "SELECT * FROM items";
               $result = mysqli_query($conn,$sql); 

                if (mysqli_num_rows($result) > 0) {
                    echo "<table>

                                  <tr>

                                      <th>ITEM</th>
                                      <th>DESCRIPTION(TYPE)</th>
                                      <th>QUANTITY</th>
                                      

                                    </tr>";
                    // output data of each row
                    while($row=mysqli_fetch_array($result)) {
                        echo "<tr> <input  name='edit1' type='hidden' value='".$row["item_code"]. "' />
                                  <td>" . $row["Item"]. "</td> 
                                  <td>". $row["Description"]. "</td> 
                                  <td>" . $row["Quantity"]. "</td>
                                  
                                  </tr>";
                    }
                    echo "</table>";
                } else {
                    echo "0 RESULTS";
                }

                $conn->close();

?>

  

</div>



</body>
</html>