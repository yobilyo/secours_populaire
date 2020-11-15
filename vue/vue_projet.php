<div class='container'>
	<h2> Liste des projets de notre association </h2>
	<table class="table table-striped">
		<thead>
			<tr> 
						<th> Id Projet </th> <th> Description </th>
						<th> Date lancement </th> <th> Pays  </th> 
						<th> Ville </th> <th> Somme collectée </th> <th> Budget </th> <th> Progression </th>
						
						<?php 
						if (isset($_SESSION['droits']) && $_SESSION['droits'] =="admin")
							{
						echo "<th> Opérations </th>";
						}
						?>
				</tr>
		</thead>

		<tbody>
			<?php 
			foreach ($lesProjets as $leProjet) {
				echo "<tr> 
						<td>".$leProjet['idprojet']." </td>
						<td>".$leProjet['description']." </td>
						<td>".$leProjet['datelancement']." </td>
						<td>".$leProjet['pays']." </td>
						<td>".$leProjet['ville']." </td>
						<td>".$leProjet['sommecollectee']." </td>
						<td>".$leProjet['budget']." </td>"
						;

				/* source: https://getbootstrap.com/docs/4.0/components/progress/ */
				/* php round https://www.php.net/manual/fr/function.round.php */
				$percentage = ($leProjet['sommecollectee'] / $leProjet['budget']) * 100;
				// 2 chiffres après la virgule
				// ex: 26.73%
				$percentageRounded = round($percentage, 2);
				echo "
				<td>
					<div class='progress'>
						<div class='progress-bar' role='progressbar' style='width: ".$percentageRounded."%;' aria-valuenow='".$percentageRounded."' aria-valuemin='0' aria-valuemax='100'>".$percentageRounded."%
						</div>
					</div>
				</td>";
						
						if (isset($_SESSION['droits']) && $_SESSION['droits'] =="admin")
						{
						echo "<td>
						<a href='index.php?page=2&action=sup&idprojet=".$leProjet['idprojet']."'>
						<img src ='images/sup.jpg' height='30' witdh='30'> </a>

						<a href='index.php?page=2&action=edit&idprojet=".$leProjet['idprojet']."'>
						<img src ='images/edit.png' height='30' witdh='30'> </a>

						</td>";
						}
				echo "</tr>";
			}
			?>
		</tbody>
	</table>
</div>