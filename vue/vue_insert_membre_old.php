<h2> Ajout d'un membre </h2>
<form method ="post" action ="">
	<table>
		<tr> 
			<td> Nom Membre : </td> 
			<td> <input type="text" name="nom" value ="<?php echo ($leMembre!=null) ? $leMembre['nom']:""; ?>" ></td>
		</tr>
        <tr> 
			<td> Prenom Membre : </td> 
			<td> <input type="text" name="prenom" value ="<?php echo ($leMembre!=null) ? $leMembre['prenom']:""; ?>" ></td>
		</tr>
		<tr> 
			<td>Adresse du membre: </td> 
			<td> <input type="text" name="adresse" value ="<?php echo ($leMembre!=null) ? $leMembre['adresse']:""; ?>">  </td>
		</tr>
		<tr> 
			<td> Téléphone du membre </td> 
			<td> <input type="text" name="tel"  value ="<?php echo ($leMembre!=null) ? $leMembre['tel']:""; ?>">  </td>
		</tr>

		<tr> 
			<td> Mail du membre :</td> 
			<td> <input type="text" name="email"  value ="<?php echo ($leMembre!=null) ? $leMembre['email']:""; ?>">  </td>
		</tr>

        <tr> 
			<td> Password du membre :</td> 
			<td> <input type="password" name="mdp"  value ="<?php echo ($leMembre!=null) ? $leMembre['mdp']:""; ?>">  </td>
		</tr>

				
		<?php echo ($leMembre!=null) ? "<input type='hidden' name='idmembre' value ='".$leMembre['idmembre']."'>" : ""; ?>

		<td>  <input type="reset" name="annnuler" value ="Annuler"></td>  
		<td> <input type="submit" 
			<?php echo ($leMembre!=null) ? " name='modifier' value='Modifier' " : " name='valider' value='Valider' "; ?> 
			>



		</tr>
	</table>
</form>
