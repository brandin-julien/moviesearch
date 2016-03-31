<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MovieSearch</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css"
          integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <script src="./js/jquery.min.js"></script>
    <script src="./js/script.js">
    </script>
</head>
<body>
<div class="row">
    <div class="col-md-12">
        <div class="well">
            <form class="form-horizontal">
                <div class="form-group">
                    <label for="titleInput" class="col-sm-2 control-label">Titre</label>
                    <div class="col-sm-10">
                        <input name="title" type="text" class="form-control" id="titleInput"
                               placeholder="Titre du film">
                    </div>
                </div>
                <div class="form-group">
                    <label for="durationInput" class="col-sm-2 control-label">Durée</label>
                    <div class="col-sm-10">
                        <select name="duration" class="form-control" id="titleInput">
                            <option>Tous</option>
                            <option value="1h">Moins d'une heure</option>
                            <option value="1h30">Entre 1h et 1h30</option>
                            <option value="2h">Entre 1h30 et 2h30</option>
                            <option value="3h">Plus de 2h30</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Adznnée</label>
                    <div class="col-sm-1">
                        Entre
                    </div>
                    <div class="col-sm-4">
                        <input name="year_start" type="text" class="form-control" id="titleInput" placeholder="début">
                    </div>
                    <div class="col-sm-1">
                        Et
                    </div>
                    <div class="col-sm-4">
                        <input name="year_end" type="text" class="form-control" id="titleInput" placeholder="fin">
                    </div>
                </div>
				
				  <div class="form-group">
                    <label for="genderInput" class="col-sm-2 control-label">Genre du réalisateur</label>
                    <div class="col-sm-10">
                        <select name="gender" class="form-control" id="titleInput">
                            <option>Tous</option>
                            <option value="M">Homme</option>
                            <option value="F">Femme</option>
                        </select>
                    </div>
                </div>
                
				<div class="form-group">
                    <label class="col-sm-2 control-label">Nom/Prénom</label>
                    <div class="col-sm-1">
                        
                    </div>
                    <div class="col-sm-4">
                        <input name="last_name" type="text" class="form-control" id="titleInput" placeholder="Nom">
                    </div>
                    <div class="col-sm-1">
                        
                    </div>
                    <div class="col-sm-4">
                        <input name="first_name" type="text" class="form-control" id="titleInput" placeholder="Prénom">
                    </div>
                </div>
				
				<div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Chercher</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="results">
    <table class="table table-hover">
        <tr>
            <th>
                Titre
            </th>
            <th>
                Année
            </th>
            <th>
                Synopsis
            </th>
            <th>
                Durée
            </th>
			<th>
                Genre
            </th>
			<th>
                Réalisateur
            </th>
        </tr>
        <tr id="displayFilms">

        </tr>

    </table>
</div>

</body>
</html>
