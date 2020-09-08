<?php
    // echo "<pre>";
    //     print_r($this->session->all_userdata());
    // echo "</pre>";
?>
<section class="content-header">
	<h1>
		Laporan Pengadaan
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li>Laporan</li>
		<li class="active">Laporan Pengadaan</li>
	</ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <!-- <div class="box-header with-border"> -->
                    <!-- <h3></h3> -->
					<!-- <h3 class="box-title"><a id="tambah" href=""><i class="fa fa-plus-square"></i> Tambah Baru</a></h3> -->
                    <!-- <button id="tambah" type="button" class="btn btn-kuning"><i class="fa fa-plus-circle"></i> Buat Baru</button> -->
                <!-- </div> -->
                <div class="box-body">
                    <table id="table1" class="table table-bordered table-striped">
						<thead class="bg-primary">
							<tr>
			                  <th style="text-align:center" width="2%">No.</th>
			                  <!-- <th style="text-align:center">No. Pemesanan</th> -->
			                  <th style="text-align:center" width="40%">Item - Jumlah</th>
			                  <!-- <th style="text-align:center">Jumlah</th> -->
			                  <th style="text-align:center" width="10%">Berat Total Pesanan</th>
			                  <th style="text-align:center">Tanggal Masuk</th>
			                </tr>
						</thead>
						<tbody>
                            <tr>
                                <td style="text-align:center">1</td>
                                <td>
                                    <ul>
                                        <li>Urea Pustri 5kg - 50</li>
                                        <li>Urea Pustri 10kg - 25</li>
                                    </ul>
                                </td>
                                <td style="text-align:center">300 Kg</td>
                                <td style="text-align:center">06 Juli 2020</td>
                            </tr>
                            <tr>
                                <td style="text-align:center">2</td>
                                <td>
                                    <ul>
                                        <li>NPK Pusri 1kg - 50</li>
                                        <li>Urea Pustri 5kg - 25</li>
                                        <li>Urea Pustri 10kg - 10</li>
                                    </ul>
                                </td>
                                <td style="text-align:center">275 Kg</td>
                                <td style="text-align:center">06 Juli 2020</td>
                            </tr>
                            <tr>
                                <td style="text-align:center">3</td>
                                <td>
                                    <ul>
                                        <li>Bioripah - 24</li>
                                        <!-- <li>Urea Pustri 10kg - 25</li> -->
                                    </ul>
                                </td>
                                <td style="text-align:center"> - </td>
                                <td style="text-align:center">02 Juli 2020</td>
                            </tr>
						</tbody>
					</table>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal modal-default fade" id="modaldetail">
    <div id="xdetail"></div>
</div>
<!-- /.modal -->

<script>
    $(document).ready(function() {
        // $('#table1').DataTable({
		// 	'ordering': false
		// });

		$('.detail').click(function(e) {
            e.preventDefault();
            // console.log('clicked');
            $.ajax({
                url: '<?php echo base_url() ?>admin/detailpesan',
                type: 'post',
                data: { 'nopesan': $(this).data('recid') },
                success: function(response) {
                    $('#xdetail').html(response);
                    $('#modaldetail').modal({'keyboard': false});
                }
            })
        })
    })
</script>