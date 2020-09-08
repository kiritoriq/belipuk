<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Users
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li>Setting</li>
		<li class="active">Users</li>
	</ol>
</section>

<section class="content">
	<div class="box box-primary">
		<div class="row">
			<div class="col-md-12">
				<div class="box-header with-border">
					<!-- <h4 class="box-title">Daftar Simpan</h4> -->
					<button id="tambah" type="button" class="btn btn-kuning"><i class="fa fa-plus-circle"></i> Buat Baru</button>
				</div>
				<div class="box-body">
					<table id="table1" class="table table-bordered table-striped">
						<thead class="bg-primary">
							<tr>
			                  <th>Nama</th>
			                  <th>Email</th>
			                  <th>Username</th>
			                  <th>Role</th>
			                  <th>Aksi</th>
			                </tr>
						</thead>
						<tbody>
							<?php
								foreach($rs->result() as $item) {
									echo "<tr>
											<td>".$item->nama."</td>
											<td>".$item->email."</td>
											<td>".$item->username."</td>
											<td>".$item->role."</td>
											<td>
												<div class='btn-group'>
						                          <button data-toggle='dropdown' class='btn btn-default dropdown-toggle' type='button' aria-expanded='false'>
						                          <span class='caret'></span> Aksi
						                          </button>
						                          <ul class='dropdown-menu pull-right'>
						                          	".(($item->id!=1)?'<li><a class="edit" href="" id="edit" data-recid="'.$item->id.'"><i class="fa fa-pencil"></i> Edit</a></li><li><a class="hapus" href="" data-recid="'.$item->id.'"><i class="fa fa-times"></i> Hapus</a></li>':'<li><i class="fa fa-times"></i> Tidak ada Aksi yang dapat dilakukan</li>')."
						                            
						                          </ul>
						                        </div>
											</td>
											</tr>";
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>

<script>
	$(document).ready(function() {
		$('#table1').DataTable({
			'ordering': false
		});
		// getinput();
		// $('.text-upper').css('text-transform', 'uppercase');

		$('#tambah').on('click', function(e) {
			e.preventDefault();
			$.ajax({
				url: '<?php echo base_url() ?>admin/createuser',
				type: 'post',
				data: { 'edit': 0 },
				beforeSend: function() {
					$('#loading-state').fadeIn('slow');
				},
				success: function(response) {
					$('#utama').html(response);
				},
				complete: function() {
					$('#loading-state').fadeOut('slow');
				}
			})
		})

		$('.edit').click(function(e) {
			e.preventDefault();
			$.ajax({
				url: '<?php echo base_url() ?>admin/createuser',
				type: 'post',
				data: { 'id': $(this).data('recid'), 'edit': 1 },
				beforeSend: function() {
					$('#loading-state').fadeIn('slow');
				},
				success: function(response) {
					$('#utama').html(response);
				},
				complete: function() {
					$('#loading-state').fadeOut('slow');
				}
			})
		})

		$('.hapus').on('click', function(e) {
			e.preventDefault();
			var id = $(this).data('recid');
			bootbox.confirm('Yakin Hapus?', function(r) {
				if(r) {
					$.ajax({
						url: '<?php echo base_url() ?>admin/deleteuser',
						type: 'post',
						data: {'id': id},
						success: function(response) {
							console.log(response);
							if(response === 'true') {
								bootbox.alert('Berhasil dihapus', function() {
									window.location.href = '<?php echo base_url() ?>admin/users';
								});
							} else {
								bootbox.alert('Terjadi Kesalahan, hubungi admin!');
							}
						}
					})
				}
			})
		})
	})
</script>