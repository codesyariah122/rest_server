<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Detail Data Users
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $users['name']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $users['email']; ?></h6>
                    <p class="card-text"><?= $users['password']; ?></p>
                    <p class="card-text"><?= $users['username']; ?></p>
                    <a href="<?= base_url(); ?>users" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        
        </div>
    </div>
</div>