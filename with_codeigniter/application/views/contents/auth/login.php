	<div class="bg-image">
		<div class="container login-page">
			<div class="row justify-content-center">		
				<div class="col-8 col-md-4 mt-5" id="login">
	<!-- 				<h3 class="text-primary mt-2 mb-5 text-center">Login System</h3> -->

					<div class="row justify-content-center mt-2 mb-2">
						<div class="col-6 mt-2">
							<img src="<?=base_url()?>assets/img/stylistic2.png" class="img-rounded img-responsive" widht="200" height="150"/>
						</div>
						<div class="col-8 text-center">
							<small class="text-primary blockquote_footer"><?=$this->session->flashdata('Empty');?></small>
							<small class="text-danger blockquote_footer"><?=$this->session->flashdata('Error');?></small>
							<?=validation_errors();?>
						</div>
					</div>
					
                    <form action="<?php echo base_url('authentication/auth_login'); ?>" method="post">		
						<input type="text" autofocus="on" class="form-control mb-3 rounded-pill" id="user" name="username" placeholder="username">
						<small class="text-danger"><?=form_error('username');?></small>
						
                        <input type="password" class="form-control mb-5 rounded-pill" id="pass" name="password" placeholder="password">
						<small class="text-danger"><?=form_error('password');?></small>

						<button type="submit" id="signin" class="btn btn-success btn-block rounded-pill">Submit</button>
                    </form>
						<small class="text-danger blockquote-footer">Belum punya akun silahkan daftar</small>
						<button id="signup" class="btn btn-primary btn-block rounded-pill">Signup</button>
				</div>
			</div>
		</div>
	</div>


	<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
		<h5 class="modal-title text-center" id="exampleModalLabel">Form Signup</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="">
        	<input type="text" class="form-control mb-2 rounded-pill" id="username" name="username" placeholder="username">
						
			<input type="password" class="form-control mb-2 rounded-pill" id="password" name="password" placeholder="password">		

			<input type="password" class="form-control mb-2 rounded-pill" id="password2" name="password2" placeholder="password konfirmasi">
		</form>

	      </div>
	      
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary rounded-pill" data-dismiss="modal">Close</button>
	        <button id="register" type="button" class="btn btn-primary rounded-pill">Submit</button>
	      </div>
        

    </div>
  </div>
</div>	
