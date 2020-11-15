<div class='container'>
	<h2> Liste des commentaires du secours populaire </h2>

	<table class="table table-striped">
		<thead>
			<tr> 
				<th> Id commentaire </th>
				<th> Date du commentaire </th> <th> Contenu </th>
				<th> Note </th> <th> Nom du projet  </th> 
				<th> Nom du membre </th>
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
			foreach ($lesCommentaires as $unCommentaire) {
				echo "<tr> 
						<td>".$unCommentaire['idcomment']." </td>
						<td>".$unCommentaire['datecomment']." </td>
						<td>".$unCommentaire['contenu']." </td>
						<td>".$unCommentaire['note']." </td>
						<td>".$unCommentaire['description']." </td>  									
						<td>".$unCommentaire['nom']." </td>";

						if (isset($_SESSION['droits']) && $_SESSION['droits'] =="admin")
						{
						echo "<td>
						<a href='index.php?page=4&action=sup&idcomment=".$unCommentaire['idcomment']."'>
						<img src ='images/sup.jpg' height='30' witdh='30'> </a>

						<a href='index.php?page=4&action=edit&idcomment=".$unCommentaire['idcomment']."'>
						<img src ='images/edit.png' height='30' witdh='30'> </a>

						</td>";
						}
				echo "</tr>";
			}
			?>
		</tbody>
	</table>
</div>