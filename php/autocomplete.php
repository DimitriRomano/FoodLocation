
<?php
if(isset($_POST['search'])){
    $response=array();
    array_push($response,"No Data Found");
    $connection = new mysqli('localhost', 'dimitri','mercanto1995','foodlocation');
    $q = $connection->real_escape_string($_POST['q']);

    $sql = $connection->query("SELECT nameResto FROM restaurant WHERE nameResto LIKE '%$q%'");
    if($sql->num_rows > 0) {
      $t= array_shift($response);

      while ($data = $sql->fetch_array()) {
        array_push($response,$data['nameResto']);
      }
    }

    header('Content-type:application/json;charset=utf-8');
		exit(json_encode($response));

	}
  ?>