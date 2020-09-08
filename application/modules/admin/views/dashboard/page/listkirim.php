<section class="content-header">
	<h1>
		Jadwal Pengiriman
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li>Transaksi</li>
		<li class="active">Jadwal Pengiriman</li>
	</ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <!-- <h3></h3> -->
					<!-- <h3 class="box-title"><a id="tambah" href=""><i class="fa fa-plus-square"></i> Tambah Baru</a></h3> -->
                    <button id="tambah" type="button" class="btn btn-kuning"><i class="fa fa-plus-circle"></i> Buat Baru</button>
                </div>
                <div class="box-body">
                    <table id="table1" class="table table-bordered table-striped">
						<thead class="bg-primary">
							<tr>
			                  <th>No. Pemesanan</th>
			                  <th>Alamat Kirim</th>
			                  <th>Tanggal Kirim</th>
			                  <th>Estimasi Sampai</th>
			                  <!-- <th>Manfaat Produk</th>
			                  <th>Jenis</th> -->
			                </tr>
						</thead>
						<tbody>
                            <tr>
                                <td>PSN0001</td>
                                <td>Jl. Agathis no. 1055, RT. 010 RW. 008, Kel. Plamongansari, Kec. Pedurungan, Kota Semarang</td>
                                <td>10 Juli 2020</td>
                                <td>14 Juli 2020</td>
                            </tr>
                            <tr>
                                <td>PSN0002</td>
                                <td>Jl. Ragunan no. VI A, Kel. Sumurboto, Kec. Blora Kota, Kab. Blora</td>
                                <td>10 Juli 2020</td>
                                <td>15 Juli 2020</td>
                            </tr>
                            <tr>
                                <td>PSN0003</td>
                                <td>Pusponjolo Barat X, RT. 2 RW. 3, Kel. Bojongsalaman, Kec. Semarang Barat, Kota Semarang</td>
                                <td>10 Juli 2020</td>
                                <td>14 Juli 2020</td>
                            </tr>
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
				url: '<?php echo base_url() ?>admin/createkirim',
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