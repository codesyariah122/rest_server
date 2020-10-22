<div class="jumbotron jumbotron-fluid text-center">
    <div class="container">
        <h1 class="display-4">Hai, <?=ucfirst($this->session->userdata('name'));?></h1>
            <p class="lead">Selamat datang di halaman pribadimu .</p>
    </div>
    </div>
</div>

<?php  $this->view('templates/navigasi');?>

