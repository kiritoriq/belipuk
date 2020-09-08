<?php
    // echo "<pre>";
    //     print_r($this->session->all_userdata());
    // echo "</pre>";
?>
<section class="content-header">
	<h1>
		Data Pemesanan Barang
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li>Transaksi</li>
		<li class="active">Data Pemesanan</li>
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
			                  <th>No.</th>
			                  <th>No. Pemesanan</th>
			                  <th>Nama Pemesan</th>
			                  <th>Alamat Pemesan</th>
			                  <th>Berat Total Pesanan</th>
			                  <th>Total Harga</th>
			                  <th>Konfirmasi Pesanan</th>
			                </tr>
						</thead>
						<tbody>
						<?php $i = 1; foreach($rs->result() as $item){ ?>
								<tr>
									<td><?php echo $i++ ?></td>
									<td><?php echo $item->no_pesan ?></td>
									<td><?php echo $item->nama ?></td>
									<td><?php echo $item->alamat ?></td>
									<td><?php echo $item->tot_uk ?> Kg</td>
									<td><?php echo "Rp ".number_format($item->tot_harga) ?></td>
									<td>
                                        <?php if($item->flag_bayar == 1) { ?>
                                            <button class="btn btn-kuning detail" id="detail" data-recid="<?php echo $item->no_pesan ?>" type="button">
                                                <i class="fa fa-search"></i> Detail
                                            </button>
                                       <?php } else { ?>
                                            <button class="btn btn-success detail" id="detail" data-recid="<?php echo $item->no_pesan ?>" type="button">
                                                <i class="fa fa-search"></i> Konfirmasi
                                            </button>
                                       <?php } ?>
                                        <!-- <div class='btn-group'>
						                    <button data-toggle='dropdown' class='btn btn-default dropdown-toggle' type='button' aria-expanded='false'>
						                        <span class='caret'></span> Aksi
						                    </button>
						                    <ul class='dropdown-menu pull-right'>
						                    	".(($i['id']!=1)?'<li><a class="edit" href="" id="edit" data-recid="'.$i['id'].'"><i class="fa fa-pencil"></i> Edit</a></li><li><a class="hapus" href="" data-recid="'.$i['id'].'"><i class="fa fa-times"></i> Hapus</a></li>':'<li><i class="fa fa-times"></i> Tidak ada Aksi yang dapat dilakukan</li>')."
                            
						                    </ul>
						                </div> -->
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

<div class="modal modal-default fade" id="modaldetail">
    <div id="xdetail"></div>
</div>
<!-- /.modal -->

<script>
    $(document).ready(function() {
        $('#table1').DataTable({
			'ordering': false
		});

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