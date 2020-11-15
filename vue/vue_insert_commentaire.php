<center>
<h2> Ajout d'un commentaire </h2>
<form method ="post" action ="">
	<table>
	<?php //var_dump($unCommentaire); ?>
        <tr> 
			<td> Date du commentaire : </td> 
			<td> <input type="date" name="datecomment" value= <?php echo ($unCommentaire != null ? $unCommentaire['datecomment'] : "") ?> ></td>
		</tr>
		<tr> 
			<td> Contenu : </td> 
			<td> <input type="text" name="contenu" value= <?php echo ($unCommentaire != null ? $unCommentaire['contenu'] : "") ?> ></td>
		</tr>
		<tr> 
			<td> Note </td> 
			<td> <input type="text" name="note" value= <?php echo ($unCommentaire != null ? $unCommentaire['note'] : "") ?> ></td>
		</tr>

		<tr> 
			<td>Nom du projet :</td> 
			<td> <select name ="idprojet">
					 <?php
					 	/* TODO lors du modifier, actualiser valuer */
					 	foreach ($lesProjets as $unProjet) {
					 		echo "<option value ='".$unProjet['idprojet']."'>".$unProjet['description']."</option>";
					 	}
					 ?>
				</select>
			</td>
		</tr>

		<tr> 
				<td> Nom du membre : </td> 
				<td> <select name ="idmembre">
					 <?php
					 	/* TODO lors du modifier, actualiser valuer */
					 	foreach ($lesMembres as $unMembre) {
					 		echo "<option value ='".$unMembre['idmembre']."'>".$unMembre['nom']." " .$unMembre['prenom']."</option>";
					 	}
					 ?>
				</select>
			</td>
			</tr>


		<tr> 
		<?php echo ($unCommentaire!=null) ? "<input type='hidden' name='idcomment' value ='".$unCommentaire['idcomment']."'>" : ""; ?>

		<td>  <input type="reset" name="annnuler" value ="Annuler"></td>  
		<td> <input type="submit" 
			<?php echo ($unCommentaire!=null) ? " name='modifier' value='Modifier' " : " name='valider' value='Valider' "; ?> 
			>



		</tr>
	</table>
</form>
</center>