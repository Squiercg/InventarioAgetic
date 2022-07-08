<?php

// Includs database connection
include "db_connect.php";

$id = $_GET['id']; // rowid from url

// Prepar the deleting query according to rowid
$query = "DELETE FROM patrimonios WHERE rowid=$id";

// Run the query to delete record
if( $db->query($query) ){
	$message = "Item deletado com sucesso.";
}else {
	$message = "Não foi prossivel deletar.";
}

echo $message;
?>
<a href="index.php">Devolta a Lista</a>