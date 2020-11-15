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

        <tr>
			<td> Droits du membre :</td> 
			<td>
				<select name='droits'>
					<option value = "user">user</option>
					<option value = "admin">admin</option>
				</select>
			</td>

		</tr>
				
		<?php echo ($leMembre!=null) ? "<input type='hidden' name='idmembre' value ='".$leMembre['idmembre']."'>" : ""; ?>

		<td>  <input type="reset" name="annnuler" value ="Annuler"></td>  
		<td> <input type="submit" 
			<?php echo ($leMembre!=null) ? " name='modifier' value='Modifier' " : " name='valider' value='Valider' "; ?> 
			>



		</tr>
	</table>
</form>

<?php  /*
//nouvelle version avec bootstrap mais qui ne modifie pas correctement
//<!-- source: https://bootsnipp.com/snippets/Okgd -->
<div class='col-sm-4'>
	<form method='post' action='' class='form-horizontal' role='form'>
		<fieldset>

		<!-- Form Name -->
		<legend>Ajout d'un Membre</legend>
		<br/>

		<!-- Text input-->
		<div class='form-group'>
			<div class='col-sm-10'>
			<input type='text' placeholder='Nom' name = 'nom' class='form-control' value="<?php echo ($leMembre!=null ? $leMembre['nom'] :''); ?>" >
			</div>
		</div>

		<!-- Text input-->
		<div class='form-group'>
			<div class='col-sm-10'>
			<input type='text' placeholder='Prénom' name = 'prenom' class='form-control' value="<?php echo ($leMembre!=null ? $leMembre['prenom'] :''); ?>" >
			</div>
		</div>

		<!-- Text input-->
		<div class='form-group'>
			<div class='col-sm-10'>
			<input type='text' placeholder='Adresse' name = 'adresse' class='form-control' value="<?php echo ($leMembre!=null ? $leMembre['adresse'] :''); ?>" >
			</div>
		</div>

		<!-- Text input-->
		<div class='form-group'>
			<div class='col-sm-10'>
			<input type='text' placeholder='Téléphone' name = 'tel' class='form-control' value="<?php echo ($leMembre!=null ? $leMembre['tel'] :''); ?>" >
			</div>
		</div>

		<!-- Text input-->
		<div class='form-group'>
			<div class='col-sm-10'>
			<input type='text' placeholder='Email' name = 'email' class='form-control' value="<?php echo ($leMembre!=null ? $leMembre['email'] :''); ?>" >
			</div>
		</div>

		<!-- Text input-->
		<div class='form-group'>
			<div class='col-sm-10'>
			<!-- Password field -->
			<input type='password' placeholder='Mot de passe du membre' name = 'mdp' id='myMdp' class='form-control' value="<?php echo ($leMembre!=null ? $leMembre['mdp'] :''); ?>" >
			<!-- source https://www.w3schools.com/howto/howto_js_toggle_password.asp -->
			<!-- An element to toggle between password visibility -->
			<input type='checkbox' onclick='showMdp()'> Afficher le mot de passe
			</div>
		</div>

		<div class='form-group'>
			<div class='col-sm-offset-2 col-sm-10'>
			<div class='pull-right'>
				<button type='reset' name='annuler' value='Annuler' class='btn btn-default'";
				echo ($leMembre!=null ? " name='modifier' value='Modifier' " : " name='valider' value='Valider' ");
				echo ">Annuler</button>
				<button type='submit' name='valider' value='Valider' class='btn btn-primary'>Valider</button>
			</div>
			</div>
		</div>

		</fieldset>
	</form>
</div><!-- /.col-lg-12 --> ?> */ ?>

