<?php 
session_start();
require_once'config.php';

function checkURL2(){
	if($_SESSION['filename'] =='index.php' || $_SESSION['filename'] == 'WebDevelopmentProject'){
		echo "rec/";
	}else{
		echo '';
	}
}

$keyword = $conn->real_escape_string($_POST['hint']);
if($keyword!=''){
	$sql = "SELECT book_name,book_isbn FROM book WHERE book_name LIKE '%$keyword%'";
	$result = $conn->query($sql);
	while ($row = $result->fetch_assoc()) {
	?>
		<p><a href="<?php checkURL2(); ?>viewBookDetail.php?q=<?php echo $row['book_isbn']; ?>"><?php echo $row['book_name']; ?></a></p>
	<?php
	}
}
$conn->close();
 ?>