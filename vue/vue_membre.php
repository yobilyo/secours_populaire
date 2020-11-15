<!-- https://www.codeproject.com/articles/1155713/bootstrapping-your-web-pages-dressing-up-tables -->

<div class='container'>
	<h2> Liste des membres du secours populaire </h2>
	<table class="table table-striped">
		<thead>
			<tr > 
				<th> Id </th>
				<th> Nom </th> <th> Prenom</th>
				<th> Adresse</th> <th> Tel</th> 
				<th> Email </th> <th> Mot de passe </th> <th>Operations</th>
			</tr>
		</thead>

		<tbody>
			<?php 
			foreach ($lesMembres as $unMembre) {
				echo "<tr> 
						<td>".$unMembre['idmembre']." </td>
						<td>".$unMembre['nom']." </td>
						<td>".$unMembre['prenom']." </td>
						<td width='300'>".$unMembre['adresse']." </td>
						<td>".$unMembre['tel']." </td>
						<td>".$unMembre['email']." </td>
						<td>".$unMembre['mdp']." </td>
						<td>
							<a href='index.php?page=1&action=sup&idmembre=".$unMembre['idmembre']."'>
							<img src ='images/sup.jpg' height='30' witdh='30'> </a>

							<a href='index.php?page=1&action=edit&idmembre=".$unMembre['idmembre']."'>
							<img src ='images/edit.png' height='30' witdh='30'> </a>

							</td>
					</tr>";
			}
			?>
		</tbody>

	</table>
</div>
