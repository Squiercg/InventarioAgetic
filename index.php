<?php

// Includs database connection
include "db_connect.php";

// Makes query with rowid
$query = "SELECT rowid, * FROM patrimonios";

// Run the query and set query result in $result
// Here $db comes from "db_connect.php"
$result = $db->query($query);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Lista</title>
</head>
<body>
	<div style="width: 500px; margin: 20px auto;">
	<a href="inventario.php">Inventario</a>
	<a href="insert.php">Adicionar novo item</a>
		
		<table width="100%" cellpadding="5" cellspacing="1" border="1">
			<tr>
				<td>patrimonio</td>
				<td>descricao</td>
                <td>lotacao</td>
				<td>conservacao</td>
                <td>localizacao</td>
				<td>verificado</td>
				<td>Ações</td>
    
			</tr>
			<?php while($row = $result->fetchArray()) {?>
			<tr>
				<td><?php echo $row['patrimonio'];?></td>
				<td><?php echo $row['descricao'];?></td>
                <td><?php echo $row['lotacao'];?></td>
				<td><?php echo $row['conservacao'];?></td>
                <td><?php echo $row['localizacao'];?></td>
				<td><?php echo $row['verificado'];?></td>
				<td>
					<a href="update.php?id=<?php echo $row['rowid'];?>">Editar</a> | 
					<a href="delete.php?id=<?php echo $row['rowid'];?>"  confirm('Tem certeza??');">Deletar</a>
				</td>
			</tr>
			<?php } ?>
		</table>
		
	</div>
</body>
</html>