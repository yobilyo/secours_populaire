<?php
	if ( ! isset($_SESSION['email']))
	{
		echo "ERREUR 404, page non identifiée ";
	}else if (isset($_SESSION['droits']))
	{
        $leDon=null;

        $unControleur->setTable ("membre");
        $tab=array("idmembre", "nom", "prenom", "droits");
        $lesMembres = $unControleur->selectAll ($tab); 

        // on suppose que l'email est un identifiant unique pour chaque user
        /*$membreConnecte = array();
        foreach ($lesMembres as $unMembre) {
            if ($unMembre['email'] == $_SESSION['email']) {
                $membreConnecte = $unMembre;
            }
        }*/

        $unControleur->setTable ("projet");
        $tab=array("idprojet", "description");
        $lesProjets = $unControleur->selectAll ($tab); 

        $unControleur->setTable ("don");
        
        if (isset($_GET['action']) && isset($_GET['iddon'])) {
            $iddon = $_GET['iddon']; 
            $action = $_GET['action'];

            switch ($action){
                case "sup" : 
                        $tab=array("iddon"=>$iddon); 
                        $unControleur->delete($tab);
                        break;
                case "edit" : 
                        $tab=array("iddon"=>$iddon); 
                        $leDon = $unControleur->selectWhere ($tab);
                        break; 
            }
        }


        

        if (isset($_POST['modifier'])){
            
            $tab=array("idmembre"=>$_POST['idmembre'], "idprojet"=>$_POST['idprojet'],
                        "somme"=>$_POST['somme'],"appreciation"=>$_POST['appreciation'], "datedon"=>$_POST['datedon']);
            $where =array("iddon"=>$iddon);

            $unControleur->update($tab, $where);
            header("Location: index.php?page=3");
        }

        require_once("vue/vue_insert_don.php"); 

        if (isset($_POST['valider'])){
            $tab=array("idmembre"=>$_POST['idmembre'], "idprojet"=>$_POST['idprojet'],
                "somme"=>$_POST['somme'],"appreciation"=>$_POST['appreciation'], "datedon"=>$_POST['datedon']);
            $unControleur->insert($tab);
        }

        if ($_SESSION['droits'] =="admin") {
            $unControleur->setTable ("don_membre_projet");	//changement de table : prendre la vue 
            $tab=array("*");
            $lesDons= $unControleur->selectAll ($tab); 
            require_once("vue/vue_don.php");
        }
    }
?>
