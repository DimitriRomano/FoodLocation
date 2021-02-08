<?php
include('dbconnect.php');

if(isset($_POST['submit1'])){


   $name =mysqli_real_escape_string($dbconnect,$_POST['name']);
   $contact_number =mysqli_real_escape_string($dbconnect,$_POST['contact_number']);
    $email = mysqli_real_escape_string($dbconnect,$_POST['email']);
    $date_book=mysqli_real_escape_string($dbconnect,$_POST['book_date']);
    $name_resto=mysqli_real_escape_string($dbconnect,$_POST['name_resto']);
    $nb_person=mysqli_real_escape_string($dbconnect,$_POST['num_person']);



  $reservation_sql = "INSERT INTO reservation
  (name,phone,email,date_book, nameResto,nb_person)
   VALUES ('$name' , '$contact_number','$email','$date_book', '$name_resto' , '$nb_person')";
  $test = mysqli_query($dbconnect,$reservation_sql);
}
?>
