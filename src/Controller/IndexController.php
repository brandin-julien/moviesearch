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
        header('Content-Type: application/json');

        $conn = \MovieSearch\Connexion::getInstance();

        $title = '%';
        $duration1 = 0;
        $duration2 = 999999;
        $year1 = 0;
        $year2 = 9999;
		$gender = '%';
		$director = '%';

        if($_POST) {

            if ($_POST['title']) {
                $title = '%' . $_POST['title'] . '%';
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
			
			 if ($_POST['gender'] && $_POST['gender'] != 'Tous') {
                $gender = $_POST['gender'];
            }
			
			if ($_POST['director']) {
                $director = '%' . $_POST['director'] . '%';
            }

        }

        $sql = "SELECT * FROM `artist` 
		left join film_director on artist.id = film_director.artist_id 
		left join film on film_director.film_id = film.id 
		WHERE film.title LIKE :title and film.duration between :duration1 and :duration2 and film.year between :year1 and :year2
		and artist.gender like :gender and (artist.first_name like :director or artist.last_name like :director)";
		
        //envoyer la requete à la BDD
        $stmt = $conn->prepare($sql);
        $stmt->bindParam("title", $title);
        $stmt->bindParam("duration1", $duration1);
        $stmt->bindParam("duration2", $duration2);
        $stmt->bindParam("year1", $year1);
        $stmt->bindParam("year2", $year2);
        $stmt->bindParam("gender", $gender);
        $stmt->bindParam("director", $director);
        $stmt->execute();
        //renvoyer les files qu'on a trouvés
        $films = $stmt->fetchAll();

		
		if(sizeof($films) == 0){
			http_response_code(400);
			//return json_encode(["films" => $films]);
		}else{
			return json_encode(["films" => $films]);
		}
	}
}