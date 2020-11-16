<?php
    $unCommentaire=null;
	$unControleur->setTable ("commentaire");
	$tab=array("idcommentaire", "contenu", "note");
	$lesCommentaires = $unControleur->selectAll ($tab); 

	$unControleur->setTable ("projet");
	$tab=array("idprojet", "description");
    $lesProjets = $unControleur->selectAll ($tab); 
    
    $unControleur->setTable ("membre");
	$tab=array("idmembre", "nom ", "prenom");
	$lesMembres = $unControleur->selectAll ($tab); 

	$unControleur->setTable ("commentaire");
    
    if (isset($_GET['action']) && isset($_GET['idcomment'])) {
        $idcomment = $_GET['idcomment']; 
        $action = $_GET['action'];

        switch ($action){
            case "sup" : 
                    $tab=array("idcomment"=>$idcomment); 
                    $unControleur->delete($tab);
                    break;
            case "edit" : 
                    $tab=array("idcomment"=>$idcomment); 
                    $unCommentaire = $unControleur->selectWhere ($tab);  //ledon
                    break; 
        }
    }


    require_once("vue/vue_insert_commentaire.php"); 
  

    if (isset($_POST['modifier'])){
        $date = date("yy.m.d");
        $tab=array("idcomment"=>$_POST['idcomment'],"datecomment"=>$date, "contenu" =>$_POST['contenu'],  "note"=>$_POST['note'], "idprojet"=>$_POST['idprojet'],"idmembre"=>$_POST['idmembre'], );
        $where =array("idcomment"=>$idcomment);

        $unControleur->update($tab, $where);
        header("Location: index.php?page=4");
    }


	if (isset($_POST['valider'])){
        $date = date("yy.m.d");
        $tab=array("datecomment"=>$date, "contenu" =>$_POST['contenu'],  "note"=>$_POST['note'],"idprojet"=>$_POST['idprojet'], "idmembre"=>$_POST['idmembre']    ); //modification de id projet et membre
        
		$unControleur->insert($tab);
	}

	$unControleur->setTable ("commentaire_membre_projet");	//changement de table : prendre la vue 
    $tab=array("*");
    $lesCommentaires= $unControleur->selectAll ($tab); 
  
	require_once("vue/vue_commentaire.php"); 
?>
