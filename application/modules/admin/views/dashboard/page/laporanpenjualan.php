<?php
    // echo "<pre>";
    //     print_r($this->session->all_userdata());
    // echo "</pre>";
?>
<section class="content-header">
	<h1>
		Laporan Penjualan
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li>Laporan</li>
		<li class="active">Laporan Penjualan</li>
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
			                  <th style="text-align:center">No.</th>
			                  <th style="text-align:center">No. Pemesanan</th>
			                  <th style="text-align:center">Item - Jumlah</th>
			                  <th style="text-align:center">Berat Total Pesanan</th>
			                  <th style="text-align:center">Total Harga</th>
			                </tr>
						</thead>
						<tbody>
						<?php $totals = 0; $tot_uk=0; $i = 1; foreach($rs->result() as $item){ ?>
								<tr>
									<td><?php echo $i++ ?></td>
									<td><?php echo $item->no_pesan ?></td>
									<td>
										<ul>
											<?php $rb=$this->query->getDetailbarang($item->no_pesan); foreach($rb->result() as $value) { ?>
												<li><?php echo $value->nama_brg." ".$value->ukuran." ".(($value->kd_brg=='B01')?'L':'Kg')." - ".$value->jml ?></li>
											<?php } ?>
										</ul>
									</td>
									<td><?php echo $item->tot_uk." Kg" ?></td>
									<td style="text-align: right"><?php echo "Rp ".number_format($item->tot_harga) ?></td>
								</tr>
								
							<?php $totals += $item->tot_harga; $tot_uk += $item->tot_uk; } ?>
						</tbody>
						<tfoot>
							<tr style="background-color: #3333">
								<td colspan="3" style="text-align: right; font-weight: bold">Grand Total</td>
								<td style="text-align: right; font-weight: bold"><?php
									echo $tot_uk." Kg" ?>
								</td>
								<td style="text-align: right; font-weight: bold"><?php
									echo "Rp ".number_format($totals) ?>
								</td>
							</tr>
						</tfoot>
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