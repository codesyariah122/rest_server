<div class="container">
    <div class="row">

        <div class="col-5">
        <?php if($this->session->flashdata('success')):?>
            <div class="alert alert-success">
                <?=$this->session->flashdata('success')?>
            </div>
        <?php endif;?>
            <h5>Hallo <?=$this->session->userdata('name');?></h5>
            <h6 class="text-danger blockquote_footer"><?=$status?></h6>

        </div>

    </div>

</div>