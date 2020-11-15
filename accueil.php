<br/>
<h2> Bienvenue au Secours Populaire </h2>
<br/>
<!-- https://getbootstrap.com/docs/4.0/components/carousel/ -->
<!-- for this slider use 700 width * 400 height for all images -->
<div class='container'>
  <div id='carouselExampleIndicators' class='carousel slide' data-ride='carousel'>
    <ol class='carousel-indicators'>
      <li data-target='#carouselExampleIndicators' data-slide-to='0' class='active'></li>
      <li data-target='#carouselExampleIndicators' data-slide-to='1'></li>
      <li data-target='#carouselExampleIndicators' data-slide-to='2'></li>
      <li data-target='#carouselExampleIndicators' data-slide-to='3'></li>
      <li data-target='#carouselExampleIndicators' data-slide-to='4'></li>
    </ol>
    <div class='carousel-inner'>
      <div class='carousel-item active'>
        <img class='d-block w-100' src='images/secours-slider-rue.jpg' alt='First slide'>
      </div>
      <div class='carousel-item'>
        <img class='d-block w-100' src='images/secours-slider-bebe.jpg' alt='Third slide'>
      </div>
      <div class='carousel-item'>
        <img class='d-block w-100' src='images/secours-slider-local.jpg' alt='Third slide'>
      </div>
      <div class='carousel-item'>
        <img class='d-block w-100' src='images/secours-slider-solidarite.jpg' alt='Fourth slide'>
      </div>
      <div class='carousel-item'>
        <img class='d-block w-100' src='images/secours-slider-refus-misere.jpg' alt='Fourth slide'>
      </div>
    </div>
    <a class='carousel-control-prev' href='#carouselExampleIndicators' role='button' data-slide='prev'>
      <span class='carousel-control-prev-icon' aria-hidden='true'></span>
      <span class='sr-only'>Previous</span>
    </a>
    <a class='carousel-control-next' href='#carouselExampleIndicators' role='button' data-slide='next'>
      <span class='carousel-control-next-icon' aria-hidden='true'></span>
      <span class='sr-only'>Next</span>
    </a>
  </div>
</div>

<br/>
<br/>
<?php

	$nbMembre = $unControleur->nbTuples("membre"); 
	$nbProjet = $unControleur->nbTuples("projet"); 
	$nbDons = $unControleur->nbTuples("don"); 
	$nbCommentaire = $unControleur->nbTuples("commentaire"); 

  echo "<div class='container'>
	<table class='table'>
		<thead>
			<tr > 
				<th>Membres</th>
				<th>Projets</th>
        <th>Dons</th>
        <th>Commentaires</th>
			</tr>
		</thead>

    <tbody>
      <tr>
        <td>".$nbMembre."</td>
        <td>".$nbProjet."</td>
        <td>".$nbDons."</td>
        <td>".$nbCommentaire."</td>
      </tr>
		</tbody>

	</table>
</div>";
?>