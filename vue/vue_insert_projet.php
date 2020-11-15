<h2> Ajout d'un Projet </h2>
<form method ="post" action ="">
	<table>
		<tr> 
			<td> Description : </td> 
			<td> <input type="text" name="description" value ="<?php echo ($leProjet!=null) ? $leProjet['description']:""; ?>"></td>
		</tr>
		<tr> 
			<td> Date de Lancement : </td> 
			<td> <input type="date" name="datelancement" value ="<?php echo ($leProjet!=null) ? $leProjet['datelancement']:""; ?>"></td>
		</tr>
		<tr> 
			<td> Pays : </td> 
			<td> <input type="text" name="pays" value ="<?php echo ($leProjet!=null) ? $leProjet['pays']:""; ?>"></td>
		</tr>
		<tr> 
			<td> Ville : </td> 
			<td> <input type="text" name="ville" value ="<?php echo ($leProjet!=null) ? $leProjet['ville']:""; ?>"></td>
		</tr>
        <tr> 
			<td> Budget : </td> 
			<td> <input type="text" name="budget" value ="<?php echo ($leProjet!=null) ? $leProjet['budget']:""; ?>"></td>
		</tr>
        
			 <input type="hidden" name="sommecollectee" value ="<?php echo ($leProjet!=null) ? $leProjet['sommecollectee']:"0"; ?>">
		
		<?php echo ($leProjet!=null) ? "<input type='hidden' name='idprojet' value ='".$leProjet['idprojet']."'>" : ""; ?>

		<tr> 
			<td>  <input type="reset" name="annnuler" value ="Annuler"></td>  
			<td> <input type="submit" 
			<?php echo ($leProjet!=null) ? " name='modifier' value='Modifier' " : " name='valider' value='Valider' "; ?> 
				></td>
		</tr>
	</table>
</form>