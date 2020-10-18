function detailMovie(){
    $.ajax({
        url: 'http://omdbapi.com',
        type: 'get',
        dataType: 'json',
        data: {
            'apiKey' : '43c80ec7',
            'i' : $(this).data('id')
        },
        success: function(res){
            if(res.Response === 'True'){
                $('.modal-body').html(`
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="${res.Poster}" class="img-fluid">
                            </div>

                            <div class="col-md-8">
                                <ul class="list-group">
                                    <li class="list-group-item"><h3>${res.Title}</h3></li>
                                    <li class="list-group-item">Released : ${res.Realeased}</li>
                                    <li class="list-group-item">Director : ${res.Director}</li>
                                    <li class="list-group-item">Actor : ${res.Actor}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                `);
            }
        }
    });
}

function searchMovie(){
    $('#movie-list').html('');
    const input = $('#search-input').val();
    $.ajax({
        url: 'http://www.omdbapi.com',
        type: 'get',
        dataType: 'json',
        data: {
            'apiKey' : '43c80ec7',
            's' : input
        },
        success: function(res){
            if(res.Response == 'True'){
                let movies = res.Search;
                $.each(movies, function(i, data){
                    $('#movie-list').append(`
                        <div class="col-md-4">
                            <div class="card">
                                <img src="${data.Poster}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                    <h5 class="card-title">${data.Title}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">${data.Year}</h6>
                                    <a href="#" class="card-link see-detail" data-toggle="modal" data-target="#exampleModal" data-id="${data.imdbID}">See Detail</a>
                                    </div>
                            </div>
                        </div>
                    `);
                })
            }else{
                $('#movie-list').html(`
                <div class="col">
                    <h1 class="text-center">${res.Error}</h1>
                </div>
                `);
            }
        }
    });
}

$(document).ready(function(){
    $('#search-button').on('click', function(){
        searchMovie();
    });
    $('#search-input').on('keyup', function(e){
        if(e.which === 13){
            searchMovie();
        }
    });

    $('#movie-list').on('click', '.see-detail', function(){
          $.ajax({
            url: 'http://omdbapi.com',
            type: 'get',
            dataType: 'json',
            data: {
                'apiKey' : '43c80ec7',
                'i' : $(this).data('id')
            },
            success: function(res){
                if(res.Response === 'True'){
                    $('.modal-body').html(`
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="${res.Poster}" class="img-fluid">
                                </div>

                                <div class="col-md-8">
                                    <ul class="list-group">
                                        <li class="list-group-item"><h3>${res.Title}</h3></li>
                                        <li class="list-group-item">Released : ${res.Released}</li>
                                        <li class="list-group-item">Genre : ${res.Genre}</li>
                                        <li class="list-group-item">Director : ${res.Director}</li>
                                        <li class="list-group-item">Actor : ${res.Actors}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    `);
                }
            }
        });
    });

});