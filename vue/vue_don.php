<div class='container'>
	<h2> Liste des dons pour l'association </h2>
	<table class="table table-striped">
		<thead>
			<tr> 
				<th> Id dons </th>
				<th> Date Don </th>
				<th> Somme</th> <th> Appréciation </th> 
				<th> Nom du Projet </th> <th> Nom du donateur </th> <th> Opération </th> 
			</tr>
		</thead>

		<tbody>
			<?php 
			foreach ($lesDons as $leDon) {
				echo "<tr> 
						<td>".$leDon['iddon']." </td>
						<td>".$leDon['datedon']." </td>
						<td>".$leDon['somme']." </td>
						<td>".$leDon['appreciation']." </td>
						<td>".$leDon['description']." </td>
						<td>".$leDon['nom']." </td>
						<td>
						<a href='index.php?page=3&action=sup&iddon=".$leDon['iddon']."'>
						<img src ='images/sup.jpg' height='30' witdh='30'> </a>

						<a href='index.php?page=3&action=edit&iddon=".$leDon['iddon']."'>
						<img src ='images/edit.png' height='30' witdh='30'> </a>

						</td>
					</tr>";
			}
			?>
		</tbody>
	</table>
</div>
