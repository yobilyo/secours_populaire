<?php
    $unControleur = new Controleur($serveur, $bdd, $user, $mdp);
    $uneInscription=null;
    $unControleur->setTable ("membre");
    
    $tab=array("*");
    
    $lesInscriptions = $unControleur->selectAll ($tab); 
    
    if (isset($_POST['sinscrire'])){

          $droits = "user";
          $tab=array("nom"=>$_POST['nom'],"prenom"=>$_POST['prenom'], "adresse"=>$_POST['adresse'], "tel"=>$_POST['tel'], "email"=>$_POST['email'], "mdp"=>$_POST['mdp'], "droits"=>$droits);    
          $unControleur->insert($tab);
      }
      if (isset($_POST['sinscrire'])){
        header('Location: index.php');
      }

    
  
?>

<script> 
function Verifier_formulaire(formulaire){
  if (formulaire.email.value=="" || formulaire.mdp.value=="") 
  {
    alert ("Vous avez oublié de remplir les champs obligatoires");
  }
  else{
    
    formulaire.submit();
  }
  
  
}
  
</script> 


