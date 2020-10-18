<?php 
$data = file_get_contents('data/pizza.json');
$menu = json_decode($data, true);
$menu = $menu['menu'];
// var_dump($menu);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Puji Hut</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="img/logo.png" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
            <a class="nav-link active" href="#">Home</a>
            </div>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row mt-3">
        <div class="col">
            <h1>All Menu</h1>
        </div>
    </div>

    <div class="row">
    <?php foreach($menu as $row):?>
        <div class="col-md-4">
            <div class="card mb-3" style="width: 18rem;">
                <img src="img/menu/<?=$row['gambar']?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?=$row['nama']?></h5>
                    <p class="card-text"><?=$row['deskripsi']?>.</p>
                    <h5 class="card-title"> <?=$row['harga']?> </h5>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <?php endforeach;?>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html> 