 $(function () {
     $('form').submit(function () {
         $.ajax({
             url: 'index/search', /*nom du controller nom de l'action */
             method: 'POST',
             data: $(this).serialize(),
             dataType: 'json',
             success: function (data) {
                 var toPrint = '<tr> <th> Titre </th> <th>Année</th> <th>Synopsis</th> <th>Durée </th> <th>Genre </th> <th>Réalisateur </th></tr> <tr>';
                 for (var i in data.films) {

                     toPrint +=
                         '<tr><td>' +data.films[i].title + '</td>' +
                         '<td>' + data.films[i].year + '</td>' +
                         '<td>' + data.films[i].synopsis +'</td>' +
                         '<td>' + getTime(data.films[i].duration) + '</td>'+
						 '<td>' + data.films[i].gender + '</td>'+
						 '<td>' + data.films[i].first_name + ' ' + data.films[i].last_name +'</td>' +'</tr>';
                     $('tbody').html(toPrint + '<br>');
                    }
             },

             error: function (data, status, error) {
                 var toPrint = 'Erreur: Aucun résultats';
				 $('tbody').html(toPrint + '<br>');

             }
         });
         return false;
     });

     function getTime(seconds){
         return ( Math.floor(seconds/3600)  + 'h' + Math.floor((seconds/60)%60));
     }

});