<?php 
function connection() {
    $dbServer = 'localhost';
    $dbUser = 'root';
    $dbPass = '';
    $dbName = "cv";
    $conn = mysqli_connect($dbServer, $dbUser, $dbPass);
    if(! $conn) {
     die('Koneksi gagal: ' . mysqli_error());
    }
    mysqli_select_db($conn,$dbName);
    return $conn;
 } 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Curriculum Vitae</title>
            <link rel="stylesheet" href="css/reset.css" />
            <link rel="stylesheet" href="css/text.css" />
            <link rel="stylesheet" href="css/960.css" />  
            <link rel="stylesheet" href="css/960_24_col.css" />
            <link rel="stylesheet" href="design.css"  />
        </head>
    <body>

    <div class="container_24" style="background-color:#669999 ; margin-top: 100px;">
        <div class="grid_11" style="background-color:#CC9999 ; border: 5px solid #132951">
            <img src="manusia.jpg" height="300" width="300" align="center" alt="" class="img">
            <h3>Nadia Ristya Dewi</h3>
            <h6>Informatics Student</h6>
            <h6>UPN Veteran Jawa Timur</h6>
        </div>
        
        <div class="grid_12" style="background-color: #CCCCCC; border: 5px solid #132951;">
            <h2>Formal Education</h2>
            <form id="formMhs" method="POST">
 <table>
  <tr>
   <td>Institution</td>
   <td><input type="text" name="edu_name" id="edu_name"></td>
  </tr>
  <tr>
   <td>Year</td>
   <td><input type="text" name="edu_year" id="edu_year"></td>
  </tr>
  <tr>
   <td></td>
   <td>
    <input type="submit" name="simpan" id="simpan" value="Simpan">
   </td>
  </tr>
 </table>
</form>
<div id="status"></div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
 <script type="text/javascript">
  $(document).ready(function() { 
      $("#formMhs").submit(function(e) {
          e.preventDefault();
          $.ajax({
              url: 'simpan-data.php',
              type: 'post',
              data: $(this).serialize(),             
              success: function(data) {               
              document.getElementById("formMhs").reset();
              $('#status').html(data);              
              }
          });
      });
  })
 </script>
<?php  
        if (isset($_POST['simpan'])) {  
          $query = "SELECT * FROM education"; 
          $result =mysqli_query(connection(),$query);  
        } 
        else { 
          $result = mysqli_query(connection(),"SELECT * FROM education"); 
        } 
?> 
<div class="tabel"> 
        <table border="1" width="100%"> 
            <tr> 
                <th>No.</th> 
                <th>Institution</th> 
                <th>Year</th> 
            </tr> 
 
            <?php while($data = mysqli_fetch_array($result)): ?> 
                <tr> 
                    <td><?php echo $data['id_edu'];  ?></td> 
                    <td><?php echo $data['edu_name'];  ?></td> 
                    <td><?php echo $data['edu_year'];  ?></td> 
                </tr> 
            <?php endwhile ?> 
        </table> 
</div> 
        </div>

        <div class="grid_10" style="background-color:#CCCCCC ;">
            <h2>Language</h2>
            <pre id="t2">
        Indonesia      &#9899  &#9899  &#9899  &#9899  &#9899
        English           &#9899  &#9899  &#9899  &#9899  &#9898
        Jawa               &#9899  &#9899  &#9899  &#9899  &#9898
        Banjar           &#9899  &#9898  &#9898  &#9898  &#9898
        Melayu           &#9899  &#9899  &#9899  &#9898  &#9898
        Minang          &#9899  &#9899  &#9899  &#9898  &#9898
            </pre>
        </div>

        <div class="grid_14" style="background-color:#CCCCCC ;">
            <h3>Hobbies</h3>
                <ul>
                    <li><img src="travelling.jpg" width="130px" height="130px"><h2>Travelling</h2></li> 
                    <li><img src="watching.jpg" width="130px" height="130px"><h2>Watch Movie</h2></li>
                    <li><img src="shopping.jpg" width="130px" height="130px"><h2>Shopping</h2></li>
                </ul>
        </div>
        <div class="grid_24" style="background-color: #132951;">
            <ul>
                <li><img src="youtube.jpg" width="30px" height="30px"><h2>Nadia Ristya</h2></li> 
                <li><img src="snapchat.jpg" width="30px" height="30px"><h2>nadiaristya</h2></li>
                <li><img src="instagram.jpg" width="30px" height="30px"><h2>nadiaristya</h2></li>
                <li><img src="email.jpg" width="30px" height="30px"><h2>nadiaristya@gmail.com</h2></li>
            </ul>
         
        </div>
    </div>

        

    </body>
</html>