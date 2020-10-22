$(document).ready(function(){

    if(location.href == "http://localhost/rest_server_codeigniter/with_codeigniter/authentication/" || location.href == "http://localhost/rest_server_codeigniter/with_codeigniter/authentication/index"){
        $('body').css({
            'background-image' : 'url("http://localhost/rest_server_codeigniter/with_codeigniter/assets/img/bg-13.jpg")',
            'background-attachment': 'fixed',
            'height': '100vh',
            'background-position': 'center',
            'background-repeat': 'no-repeat',
            'background-size': 'cover',
        });
    }

    $('#signup').on('click', function(){
        $('#signupModal').modal('show');
    })
});

