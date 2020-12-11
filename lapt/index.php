<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body style="background-color:silver">
      <header style="font-size:35px;text-align: center">
          LaptopSearcher
      </header>
      <div class="container-fluid abox" style="margin-top: 15px">
          <div class="row arow">
              <div class="col-sm-3 acol" style="text-align: center;">
                  <div id="acol">
                      <h3>Enter The Required Properties</h3>
                  </div>
                  <form method="POST" action="index.php">
                      <p style="margin: 0;padding: 0;">Ram in GB</p>
                      <input name="ram" type="text">
                      <p style="margin: 0;padding: 0;">Company</p>
                      <input name="company" type="text">
                      <br>
                      <input name="submit" id="submit" class="btn btn-primary" type="submit" value="Submit" style="    margin-top: 10px;">
                  </form>
              </div>
              <div class="col-sm-8 bcol">
                <?php
                echo "Data show is data stored in our database<br>";
                    if($_SERVER["REQUEST_METHOD"]=="POST"){
                      $servername = "localhost";
                      $username = "root";
                      $pass = "";
                      $database = "LaptopSearcher";
                      
                      $conn = mysqli_connect($servername,$username,$pass,$database);
                      $name = $_POST["company"];
                      $nameram = $_POST["ram"];
                      $sql = "SELECT * FROM `trial` WHERE `ram` = '".$nameram."' and `company` = '".$name."'";
                      $result = mysqli_query($conn, $sql);
                
                      // Usage of WHERE Clause to fetch data from the database
                      $num = mysqli_num_rows($result);
                      $no=1;
                      if($num> 0){  
                        echo "<table class=\"table table-striped table-dark\">
                        <thead>
                          <tr>
                            <th scope=\"col\">Sr no.</th>
                              <th
                              scope=\"col\">RAm in (GB)</th>
                              <th
                              scope=\"col\">Model</th>
                              <th scope=\"col\">Company</th>
                              <th scope=\"col\">Processer</th>
                            </tr>
                          </thead>";  
                        echo "<tbody>";
                        while($row = mysqli_fetch_assoc($result)){ 
                          echo " <tr>
                          <td>".$no."</td>
                          <td>".$row['ram'] ."</td>
                          <td>". $row['modelno']."</td>
                          <td>". $row['company']."</td>
                          <td>". $row['processer']."</td>
                          </tr>";
                          $no=$no+1;
                        }
                        echo "</tbody>";
                        echo "</table>";
                      }   
                      else{
                        echo "No results found";
                      }              
                    }
                ?>
              </div>
          </div>
      </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>