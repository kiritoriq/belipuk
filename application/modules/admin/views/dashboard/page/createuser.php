<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Create User
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li>Setting</li>
		<li>Users</li>
		<li class="active">Buat Baru</li>
	</ol>
</section>
<section class="content">
	<div class="box box-primary">
		<div class="row">
			<div class="col-md-12">
				<form id="simpan" class="form-horizontal" method="POST" action="<?php echo base_url() ?>admin/simpanuser">
					<!-- <div class="box-header with-border">
						<h4 class="box-title">Entry Simpan</h4>
					</div> -->
					<div class="box-body">
						<input type="hidden" name="id" value="<?php echo ($cek>0)?$rs->id:'' ?>">
						<input type="hidden" name="edit" value="<?php echo ($cek>0)?'1':'0' ?>">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-sm-3">Nama Lengkap:</label>
								<div class="col-sm-8">
									<input type="text" id="nama" name="nama" class="validate[required] form-control" placeholder="Masukkan Nama Lengkap" value="<?php echo ($cek>0)?$rs->nama:'' ?>">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Email:</label>
								<div class="col-sm-8">
									<input type="email" name="email" class="validate[required] form-control" placeholder="contoh: admin@local.com" value="<?php echo ($cek>0)?$rs->email:'' ?>">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Role:</label>
								<div class="col-sm-8">
                                    <?php echo $this->query->getSelectrole('role_id', ($cek>0)?$rs->role_id:'') ?>
								</div>
							</div>
							
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-sm-3">Username:</label>
								<div class="col-sm-8">
									<input type="text" name="username" class="validate[required] form-control" placeholder="Username" value="<?php echo ($cek>0)?$rs->username:'' ?>" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Password:</label>
								<div class="col-sm-8">
									<input type="text" name="password" class="validate[required] form-control" placeholder="Password" required>
								</div>
							</div>
						</div>
					</div>
					<div class="box-footer">
						<div class="form-group">
		                    <div class="col-sm-offset-3 col-sm-7">
		                        <button type="submit" id="tombolsimpan" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
		                        &nbsp;
		                        &nbsp;
		                        <a href="<?php echo base_url() ?>admin/users" class="btn btn-warning"><i class="fa fa-times-circle-o"></i> Batal</a>
		                    </div>
		                </div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>

<script>
	$(document).ready(function() {
		$('.num').keyup(function () {
            if (this.value != this.value.replace(/[^0-9\.]/g, '')) {
                this.value = this.value.replace(/[^0-9\.]/g, '');
            }
        });
		// $('input').css('text-transform', 'uppercase');
		$('#simpan').on('submit', function(e) {
			var $this = $(this);
			e.preventDefault();
			bootbox.confirm('Simpan?', function(r) {
				if(r){
					$.ajax({
						url: $this.attr('action'),
						type: 'POST',
						data: $this.serialize(),
						success: function(response) {
							console.log(response);
							if(response === "true"){
								bootbox.alert('Berhasil Disimpan', function() {
									window.location.href = '<?php echo base_url() ?>admin/users';
								});
							} else {
								bootbox.alert('Terjadi kesalahan, silahkan hubungi admin!');
							}
						},
						complete: function() {
							$('#loading-state').fadeOut('slow');
						},
						error: function(error) {
							console.log(error);
						}
					})		
				} else {

				}
			})
		})
	})
</script>