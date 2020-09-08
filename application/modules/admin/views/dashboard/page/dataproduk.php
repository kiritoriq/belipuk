<section class="content-header">
	<h1>
		Data Produk
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li>Master Data</li>
		<li class="active">Data Produk</li>
	</ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <!-- <h3></h3> -->
					<!-- <h3 class="box-title"><a id="tambah" href=""><i class="fa fa-plus-square"></i> Tambah Baru</a></h3> -->
                    <!-- <button id="tambah" type="button" class="btn btn-kuning"><i class="fa fa-plus-circle"></i> Buat Baru</button> -->
                </div>
                <div class="box-body">
                    <table id="table1" class="table table-bordered table-striped">
						<thead class="bg-primary">
							<tr>
			                  <th>Kode Produk</th>
			                  <th>Nama Produk</th>
			                  <th>Spesifikasi Produk</th>
			                  <th>Manfaat Produk</th>
			                  <th>Jenis</th>
			                </tr>
						</thead>
						<tbody>
						<?php foreach($rs->result() as $item){ ?>
								<tr>
									<td><?php echo $item->kd_produk ?></td>
									<td><b><?php echo $item->nama ?></b></td>
									<td><?php echo $item->spesifikasi ?></td>
									<td><?php echo $item->manfaat ?></td>
									<td>
										<?php
											$kemasan = "";
											$q = $this->db->query("SELECT * FROM ms_produk_detail WHERE kd_produk = '".$item->kd_produk."'");
											foreach($q->result() as $i) {
												$satuan = ($i->kd_produk=='B01')?'L':'Kg';
												$kemasan .= $i->kemasan." ".$satuan.", ";
											} 
											$ln = strlen($kemasan); 
											echo substr($kemasan,0,($ln-2)).".";
										?>
									</td>
								</tr>
							<?php } ?>
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

		$('#tambah').click(function(e) {
			e.preventDefault();
			$.ajax({
				url: '<?php echo base_url() ?>admin/tambahproduk',
				type: 'post',
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
    })
</script>