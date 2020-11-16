<center>
<h2> Ajout d'un commentaire </h2>
<form method ="post" action ="">
	<table>
	<?php //var_dump($unCommentaire); ?>
        <tr> 
			<td> Date du commentaire :  </td> 
			<td>  <?php echo date("yy.m.d"); ?>  </td>
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
		<td> Membre : </td> 	
			<td> 
				<?php
					if ($_SESSION['droits'] == "admin") {
						echo "
						<select name ='idmembre'>";
							foreach ($lesMembres as $unMembre) {
								$fullNameUnMembre = $unMembre['nom']."  ".$unMembre['prenom'];
								echo "<option value ='".$unMembre['idmembre']."'>".$fullNameUnMembre."</option>";
														}
						echo "</select>";
					} else {
						$fullNameSession = $_SESSION['nom']."  ".$_SESSION['prenom'];
						// nom du membre visible dans la box
						echo "<div>".$fullNameSession."</div>";
						// post de l'idmembre dans le formulaire (invisible)
						echo "<input type='hidden' name='idmembre' value ='".$_SESSION['idmembre']."'>";
					}
				?>
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