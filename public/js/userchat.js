
    $(".saveusuario").on('click', function() {
        console.log('hola');
    console.log(url);
        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }

        });
    var name = $('#name').val();
    var dni = $('#dni').val();
    var email = $('#email').val();
    var phone = $('#phone').val();
    var data = {};
    data._token = $('meta[name="csrf-token"]').attr('content');
    data.name = name;
    data.dni = dni;
    data.email = email;
    data.phone = phone;
    console.log(data);
  
        $.ajax({
            type: "POST",
            url: url + '/chat',
            data: data,
            success: function (data) {
                console.log(data.id); 
                link = url + '/iniciando/' + data.id;
                console.log(link);
                location.href = link;

            },
            error: function () {
            }
        });
});
