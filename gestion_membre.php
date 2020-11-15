<?php
	if ( ! isset($_SESSION['email']))
	{
		echo "ERREUR 404, page non identifiée ";
	}else if (isset($_SESSION['droits']) && $_SESSION['droits'] =="admin")
	{ 
            $unControleur->setTable ("membre");
            $leMembre = null;

            if (isset($_GET['action']) && isset($_GET['idmembre'])) 
            {
                $idmembre = $_GET['idmembre']; 
                $action = $_GET['action'];

                switch ($action){
                    case "sup" : 
                            $tab=array("idmembre"=>$idmembre); 
                            $unControleur->delete($tab);
                            break;
                    case "edit" : 
                            $tab=array("idmembre"=>$idmembre); 
                            $leMembre = $unControleur->selectWhere ($tab);
                            break; 
                }
            }

            
            require_once("vue/vue_insert_membre.php");

            if (isset($_POST['modifier'])){
                $tab=array("nom"=>$_POST['nom'], "prenom"=>$_POST['prenom'],
                            "adresse"=>$_POST['adresse'],"tel"=>$_POST['tel'], "email"=>$_POST['email'], "mdp"=>$_POST['mdp']);
                $where =array("idmembre"=>$idmembre);

                $unControleur->update($tab, $where);
                header("Location: index.php?page=1");
            }

            if (isset($_POST['valider'])){
                $tab=array("nom"=>$_POST['nom'], "prenom"=>$_POST['prenom'],
                            "adresse"=>$_POST['adresse'],"tel"=>$_POST['tel'], "email"=>$_POST['email'], "mdp"=>$_POST['mdp']);
                $unControleur->insert($tab);
            }

            $tab=array("*");
            $lesMembres = $unControleur->selectAll ($tab);

            require_once("vue/vue_membre.php");
    } 



?>