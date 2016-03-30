<?php
namespace Controller;

use Doctrine\DBAL\Query\QueryBuilder;

class IndexController
{
    public function indexAction()
    {
        //include view
        include("search.php");
    }

    public function searchAction()
    {
        //se connecter à la bdd
        //header('Content-Type: application/json');

        $conn = \MovieSearch\Connexion::getInstance();

        //creer la requete  adéquate
        /*
        dans AJAX mettre chaque valeur envoyer dans une variable puis l'enregistrer dans une variable PHP pour faire nos requete vis a vis de ça
        utiliser unserialize() de data puis json_encode;
        */

        $title = '%';
        $duration1 = 0;
        $duration2 = 999999;
        $year1 = 0;
        $year2 = 9999;

        if($_POST) {

            if ($_POST['title']) {
                $title = $_POST['title'] . '%';
            }

            if ($_POST['year_start'] && $_POST['year_end']) {
                $year1 = $_POST['year_start'];
                $year2 = $_POST['year_end'];
            }

            if($_POST['duration']){
                $choice = $_POST['duration'];
                if($choice == '1h'){
                    $duration2 = 3600;
                } elseif($choice == '1h30'){
                    $duration1 = 3600;
                    $duration2 = 5400;
                } elseif($choice == '2h'){
                    $duration1 = 5400;
                    $duration2 = 9000;
                } elseif($choice == '3h'){
                    $duration1 = 9000;
                }

            }

        }

        //$_POST['title'];
        //$_POST['duration']; // envoi faudra en fonction de la phrase traduire en seconde
        //$_POST['year_start'];
        //$_POST['year_end'];

        $sql = "SELECT * FROM `film` WHERE title LIKE :title and duration between :duration1 and :duration2 and year between :year1 and :year2";

        //envoyer la requete à la BDD
        $stmt = $conn->prepare($sql);
        $stmt->bindParam("title", $title);
        $stmt->bindParam("duration1", $duration1);
        $stmt->bindParam("duration2", $duration2);
        $stmt->bindParam("year1", $year1);
        $stmt->bindParam("year2", $year2);
        $stmt->execute();
        //renvoyer les files qu'on a trouvés
        $films = $stmt->fetchAll();

        return json_encode(["films" => $films]);
    }
}