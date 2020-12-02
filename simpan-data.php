<?php

//koneksi database
$dbServer = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = "cv";

$conn = mysqli_connect($dbServer, $dbUser, $dbPass);
mysqli_select_db($conn,$dbName);

//data yang diperoleh dari form mahasiswa
$edu_name=$_POST['edu_name'];
$edu_year=$_POST['edu_year'];

 //simpan data kedalam database
$sql=mysqli_query($conn, "INSERT INTO education(edu_name, edu_year) VALUES('".$edu_name."','".$edu_year."')") or die(mysqli_error());
if ($sql) {
  echo "<div style='color:green'>Data berhasil disimpan!</div>";
}else{
  echo "<div style='color:red'>Data gagal disimpan!</div>";
}
?>