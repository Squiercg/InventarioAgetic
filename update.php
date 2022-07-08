<?php
$message = ""; // initial message 

// Includs database connection
include "db_connect.php";

// Updating the table row with submited data according to rowid once form is submited 
if( isset($_POST['submit_data']) ){

	// Gets the data from post
    $id = $_POST['id'];
	$patrimonio = $_POST['patrimonio'];
    $descricao = $_POST['descricao'];
    $lotacao = $_POST['lotacao'];
    $conservacao = $_POST['conservacao'];
    $localizacao = $_POST['localizacao'];
    $verificado = $_POST['verificado'];

	// Makes query with post data
	$query = "UPDATE patrimonios 
    set conservacao='$conservacao', localizacao='$localizacao', verificado='$verificado' 
    WHERE rowid=$id";
	
	// Executes the query
	// If data inserted then set success message otherwise set error message
	// Here $db comes from "db_connect.php"
	if( $db->exec($query) ){
		$message = "Data is updated successfully.";
	}else{
		$message = "Sorry, Data is not updated.";
	}
}

$id = $_GET['id']; // rowid from url
// Prepar the query to get the row data with rowid
$query = "SELECT rowid, * FROM patrimonios WHERE rowid=$id";
$result = $db->query($query);
$data = $result->fetchArray(); // set the row in $data
?>

<!DOCTYPE html>
<html>
<head>
	<title>Update Data</title>
</head>
<body>
	<div style="width: 500px; margin: 20px auto;">

		<!-- showing the message here-->
		<div><?php echo $message;?></div>

		<table width="100%" cellpadding="5" cellspacing="1" border="1">
			<form action="" method="post">
			<input type="hidden" name="id" value="<?php echo $id;?>">
			<tr>
                    <td>Patrimonio:</td>
                    <td><input name="patrimonio" type="text" value="<?php echo $data['patrimonio'];?>"></td>
                </tr>
                <tr>
                    <td>Descrição:</td>
                    <td><input name="descricao" type="text" value="<?php echo $data['descricao'];?>"></td>
                </tr>
                <tr>
                    <td>lotacao:</td>
                    <td><input name="lotacao" type="text" value="<?php echo $data['lotacao'];?>"></td>
                </tr>
                <tr>
                    <td>conservacao:</td>
                    <td><input name="conservacao" type="text" value="<?php echo $data['conservacao'];?>"></td>
                </tr>
                <tr>
                    <td>localizacao:</td>
                    <td><input name="localizacao" type="text" value="<?php echo $data['localizacao'];?>"></td>
                </tr>
                <tr>
                    <td>verificado:</td>
                    <td><input name="verificado" type="text" value="<?php echo $data['verificado'];?>"></td>
                </tr>
			<tr>
				<td><a href="index.php">Voltar</a></td>
				<td><input name="submit_data" type="submit" value="Update Data"></td>
			</tr>
			</form>
		</table>
	</div>
</body>
</html>