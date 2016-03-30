 $(function () {
     $('form').submit(function () {
         $.ajax({
             url: 'index/search', /*nom du controller nom de l'action */
             method: 'POST',
             data: $(this).serialize(),
             dataType: 'json',
             success: function (data) {
                 console.log(data); // il faut faire correspondre l'id duration l'année envoyer en ajax avec la requete et afficher en consequent
                 console.log("success !");
                 //var toPrint = '';
                 var toPrint = '<tr> <th> Titre </th> <th>Année</th> <th>Synopsis</th> <th>Durée </th> </tr> <tr>';
                 for (var i in data.films) {

                     toPrint +=
                         '<tr><td>' +data.films[i].title + '</td>' +
                         '<td>' + data.films[i].year + '</td>' +
                         '<td>' + data.films[i].synopsis +'</td>' +
                         '<td>' + getTime(data.films[i].duration) + '</td></tr>';
                     $('tbody').html(toPrint + '<br>');
                    }

                 //$('#displayFilms').html(toPrint);
                 console.log(toPrint);

                 /*
                 $('#titleFilm').html(data.films[i].title);
                 $('#durationFilm').html(data.films[i].duration);
                 $('#yearFilm').html(data.films[i].year);
                 $('#textFilm').html(data.films[i].synopsis);
                  */

                 console.log($('#titleFilm').html());
                 //var titleMovie = $('#titleInput').val();
                 //console.log($('#titleInput').val());
                 //console.log($('#durationInput').text());

             },

             error: function (data, status, error) {
                 var toPrint = '';
                 data = JSON.parse(data.responseText);
                 for (var d in data.errors) {
                     toPrint += d + ' :' + data.errors[d] + '<br>';
                 }
                 console.log(toPrint);
             }
         });
         return false;
     });

     function getTime(seconds){
         var init = seconds;
         var hours = Math.floor(init / 3600);
         var minutes = Math.floor((init / 60) % 60);
         //var seconds = init % 60;

         return ( Math.floor(seconds/3600)  + 'h' + Math.floor((seconds/60)%60));

         return (hours + 'h' + minutes);
     }

});