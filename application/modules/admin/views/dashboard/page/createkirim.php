<section class="content-header">
	<h1>
		Buat Jadwal Kirim
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li>Transaksi</li>
		<li class="">Jadwal Pengiriman</li>
		<li class="active">Tambah Baru</li>
	</ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-pencil"></i> Tambah Baru</h3>
                </div>
                <form action="<?php echo base_url() ?>admin/simpanproduk" type="post" class="form-horizontal" id="simpanproduk" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-sm-3">Nomor Pesanan:</label>
                                <div class="col-sm-5">
                                    <select name="nopesan" id="nopesan" class="form-control">
                                            <option value="">.:Pilihan:.</option>
                                        <?php foreach($rs->result() as $item) { ?>
                                            <option value=""><?php echo $item->no_pesan ?></option>
                                        <?php } ?>
                                    </select>
                                    <!-- <input type="text" class="validate[required] form-control" placeholder="Kode Produk" name="kd_produk"> -->
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Nama Pemesan:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="validate[required] form-control" placeholder="Nama Produk" name="nama" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Email Pemesan:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="validate[required] form-control" placeholder="Nama Produk" name="nama" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Telepon Pemesan:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="validate[required] form-control" placeholder="Nama Produk" name="nama" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Alamat Pemesan:</label>
                                <div class="col-sm-8">
                                    <textarea name="" id=""  class="form-control" rows="3" readonly></textarea>
                                    <!-- <input type="text" class="validate[required] form-control" placeholder="Nama Produk" name="nama" readonly> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-sm-3">Jadwal Kirim:</label>
                                <div class="col-sm-8">
                                    <!-- <textarea name="spesifikasi" id="spesifikasi" class="validate[required] form-control" rows="5" placeholder="Spesifikasi Produk"></textarea> -->
                                    <input type="text" class="form-control" placeholder="Nama Produk" name="nama" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Estimasi Sampai:</label>
                                <div class="col-sm-8">
                                    <!-- <textarea name="manfaat" id="manfaat" class="validate[required] form-control" rows="5" placeholder="Manfaat Produk"></textarea> -->
                                    <input type="text" class="form-control" placeholder="Nama Produk" name="nama" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end /.box-body -->
                    <div class="box-footer">
                        <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-7">
		                        <button type="submit" id="tombolsimpan" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
		                        &nbsp;
		                        &nbsp;
		                        <a href="index.php?page=daftarbagian" class="btn btn-warning"><i class="fa fa-times-circle-o"></i> Batal</a>
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
        $('#simpanproduk').validationEngine();
        $('#simpanproduk').submit(function(e) {
            var $this = $(this);
            var formData = new FormData(this);
            e.preventDefault();
            bootbox.confirm("Simpan Data ?", function(r) {
                if(r) {
                    $.ajax({
                        url: $this.attr('action'),
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            let res = JSON.parse(response);
                            if(res.status === true) {
                                bootbox.alert('Berhasil disimpan', function() {
                                    location.reload();
                                });
                            } else {
                                bootbox.alert(res.msg);
                            }
                        }
                    })
                }
            })
        })
    })
</script>

