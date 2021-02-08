
<?php
	//require_once('dbconnect.php');
$list="";
	if (isset($_GET['keywords'])) {
		$keywords = $dbconnect->escape_string($_GET['keywords']);
		$query = $dbconnect->query("
			SELECT nameResto ,specialite
			FROM restaurant
			WHERE nameResto LIKE '%{$keywords}%'");
			if($query){
				while ($r = $query->fetch_object()) {
					$list.='<p>'.$r->nameResto .'|'.$r->specialite .'<a class="book" href="index.php"> BOOK NOW </a><p>'; 
					
				}
			}
	}else{
		$query = $dbconnect->query("
			SELECT *
			FROM restaurant
			");
			if($query){
				while ($r = $query->fetch_object()) {
					$list.= '<div class="item js-marker" '. 'data-lat="'.$r->latitude.'" data-lng="'.$r->longitude.'
					" data-title="'.$r->nameResto.'" data-type="'.$r->specialite.'"><h4>'.$r->nameResto.'</h4><p>'.$r->description.'<a class="book" href="index.php"> BOOK NOW </a></p></div>';
					
				}
			}
	}
?>
