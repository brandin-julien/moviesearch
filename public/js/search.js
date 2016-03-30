$(function () {

    $('form').submit(function () {
        $.ajax({
            url: 'index/search',
            method: 'POST',
            data: $(this).serialize(),
            dataType: 'json',

            success: function(data){
                console.log(data);
            },

            error: function(data, status, error) {
                //var toPrint = '';
                console.log('Error : ' + data);
                /*data = JSON.parse(data.responseText);
                for(var d in data.errors){
                    toPrint += d+' :'+data.errors[d]+'<br>';
                }*/
                //$('#errorBlock').html(toPrint);
            }
        });
        return false;
    });

});