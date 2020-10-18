function AllMenu(){
    $.getJSON('data/pizza.json', function(result){
        let menu = result.menu;
        $.each(menu, function(i, data){
            $('#daftar-menu').append(`<div class="col-md-4"><div class="card mb-3 ml-3" style="width: 18rem;"><img src="img/menu/${data.gambar}" class="card-img-top"><div class="card-body"><h5 class="card-title">${data.nama}</h5><p class="card-text">${data.deskripsi}.</p><h5 class="card-title"> ${data.harga} </h5><a href="#" class="btn btn-primary">Go somewhere</a></div></div></div>`)
        });
    });
}
AllMenu();
$('.nav-link').on('click', function(){
    // alert($(this));
    $('.nav-link').removeClass('active');
    $(this).addClass('active');

    let kategori = $(this).html();
    $('h1').html(kategori);
    // alert(kategori);
    if(kategori === 'All Menu'){
        AllMenu();
        return;
    }

    $.getJSON('data/pizza.json', function(data){
        let menu = data.menu;
        let content = '';

        $.each(menu, function(i, data){
            if(data.kategori == kategori.toLowerCase()){
                content += `<div class="col-md-4"><div class="card mb-3 ml-3" style="width: 18rem;"><img src="img/menu/${data.gambar}" class="card-img-top"><div class="card-body"><h5 class="card-title">${data.nama}</h5><p class="card-text">${data.deskripsi}.</p><h5 class="card-title"> ${data.harga} </h5><a href="#" class="btn btn-primary">Go somewhere</a></div></div></div>`;
            }
        });
        $('#daftar-menu').html(content);
    });

});