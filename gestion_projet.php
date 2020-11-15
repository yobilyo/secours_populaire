<?php
	if ( ! isset($_SESSION['email']))
	{
		echo "ERREUR 404, page non identifiée ";
	}else if (isset($_SESSION['droits']) && $_SESSION['droits'] =="admin")
	{
            $unControleur->setTable ("projet");
            $leProjet = null; 
            
            if (isset($_GET['action']) && isset($_GET['idprojet']))
            {
                $idprojet = $_GET['idprojet']; 
                $action = $_GET['action'];

                switch ($action){
                    case "sup" : 
                            $tab=array("idprojet"=>$idprojet); 
                            $unControleur->delete($tab);
                            break;
                    case "edit" : 
                            $tab=array("idprojet"=>$idprojet); 
                            $leProjet = $unControleur->selectWhere ($tab);
                            break; 
                }
            }

            require_once("vue/vue_insert_projet.php"); 
            

            if (isset($_POST['modifier'])){
                $tab=array("description"=>$_POST['description'], "datelancement"=>$_POST['datelancement'],
                            "pays"=>$_POST['pays'],"ville"=>$_POST['ville'],"budget"=>$_POST['budget'],"sommecollectee"=>$_POST['sommecollectee']);
                $where =array("idprojet"=>$idprojet);

                $unControleur->update($tab, $where);
                header("Location: index.php?page=2");
            }

            if (isset($_POST['valider'])){
                $tab=array("description"=>$_POST['description'], "datelancement"=>$_POST['datelancement'],"pays"=>$_POST['pays'],
                            "ville"=>$_POST['ville'],"budget"=>$_POST['budget'],"sommecollectee"=>$_POST['sommecollectee']);
                $unControleur->insert($tab);
            }

            $tab=array("*");
            $lesProjets = $unControleur->selectAll ($tab); 
            require_once("vue/vue_projet.php"); 

    } else if (isset($_SESSION['droits']) && $_SESSION['droits'] =="user")
            {
                $unControleur->setTable ("projet");
                $tab=array("*");
                $lesProjets = $unControleur->selectAll ($tab); 
                require_once("vue/vue_projet.php"); 
            }
        
?>