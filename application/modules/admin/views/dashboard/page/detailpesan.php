    <div class="modal-dialog" style="width: 1020px !important; margin: 50px auto">
        
        <?php foreach($rs->result() as $item): ?>
        <div class="modal-content">
            <div class="modal-header" style="background-color: #f3e512 !important; color: #373737;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color: #373737;">x</span></button>
                <h4 class="modal-title">Detail dan Konfirmasi Pembayaran</h4>
            </div>
            <div class="modal-body">
                <table id="table1" class="table table-striped">
                    <tbody>
                        <tr>
                            <td width="30%"><strong>No. Pemesanan</strong></td>
                            <td>:</td>
                            <td><b><?php echo $item->no_pesan ?></b></td>
                        </tr>
                        <tr>
                            <td width="30%"><strong>Tanggal Pemesanan</strong></td>
                            <td>:</td>
                            <td><b><?php echo $this->query->tanggalindonesia(date('d-m-Y', strtotime($item->created_at)))." ".date('H:i:s', strtotime($item->created_at))." WIB" ?></b></td>
                        </tr>
                        <tr>
                            <td width="30%">Nama Pemesan</td>
                            <td>:</td>
                            <td><?php echo $item->nama ?></td>
                        </tr>
                        <?php if($item->nik != "" OR $item->nik != NULL) { ?>
                            <tr>
                                <td width="30%">NIK</td>
                                <td>:</td>
                                <td><?php echo $item->nik ?></td>
                            </tr>
                            <tr>
                                <td width="30%">NPWP</td>
                                <td>:</td>
                                <td><?php echo $item->npwp ?></td>
                                </tr>
                        <?php } ?>
                        <tr>
                            <td width="30%">Email</td>
                            <td>:</td>
                            <td><?php echo $item->email ?></td>
                        </tr>
                        <tr>
                        <td width="30%">No. Telepon Pemesan</td>
                        <td>:</td>
                        <td><?php echo $item->telp ?></td>
                        </tr>
                        <tr>
                            <td width="30%">Alamat</td>
                            <td>:</td>
                            <td><?php echo $item->alamat ?></td>
                        </tr>
                        <tr>
                            <td width="30%">Status Pembayaran</td>
                            <td>:</td>
                            <td><strong class="<?php echo ($item->flag_bayar==1)?'text-success':'text-danger' ?>"><?php echo ($item->flag_bayar==1)?'Terkonfirmasi':'Belum dikonfirmasi'; ?></strong></td>
                        </tr>
                    </tbody>
				</table>
                <br>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id='tabel_rincian'>
                            <thead class="bg-primary">
                            <tr>
                                <th width="2%" style="text-align: center;">No.</th>
                                <th style="text-align: center;">Kode Barang</th>
                                <th style="text-align: center;">Nama Barang</th>
                                <th style="text-align: center;">Ukuran</th>
                                <th style="text-align: center;">Harga Satuan</th>
                                <!-- <th style="text-align: center;"></th> -->
                                <th style="text-align: center;">Jumlah</th>
                                <!-- <th style="text-align: center;">Diskon (%)</th> -->
                                <th style="text-align: center;">Total</th>
                            </tr>
                            </thead>   
                            <tbody>
                                <?php $i=1; foreach($rb->result() as $value) {?>
                                    <tr>
                                        <td><?php echo $i++ ?></td>
                                        <td><?php echo $value->kd_brg ?></td>
                                        <td><?php echo $value->nama_brg ?></td>
                                        <td style="text-align: right"><?php echo $value->ukuran." ".(($value->kd_brg == 'B01')?'L':'Kg') ?></td>
                                        <td style="text-align: right"><?php echo "Rp ".$this->query->getHargasatuan($value->kd_brg, $value->ukuran) ?></td>
                                        <td style="text-align: right"><?php echo $value->jml ?></td>
                                        <td style="text-align: right"><?php echo "Rp ".number_format($value->harga) ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                            <tr style="background-color: #3333">
                                <td colspan="3" style="text-align: right;font-weight: bold">Total Ukuran</td>
                                <td id="total_ukuran" class="" style="text-align: right; font-weight: bold"><?php echo $item->tot_uk." Kg" ?></td>
                                <td colspan="2" style="text-align: right;font-weight: bold">Total Harga</td>
                                <td id="total_tabel" class="number" style="text-align: right;font-weight: bold"><?php echo "Rp ".number_format($item->tot_harga) ?></td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                <?php if($item->flag_bayar != 1) { ?>
                    <button type="button" class="btn btn-success" id="konfirmasi" data-recid="<?php echo $item->no_pesan ?>"><i class="fa fa-check"></i> Konfirmasi Pembayaran</button>
               <?php } ?>
            </div>
        </div>
        <!-- /.modal-content -->
        <?php endforeach; ?>
    
    </div>
    <!-- /.modal-dialog -->

<script>
    $(document).ready(function() {
        $('#konfirmasi').click(function(e) {
            e.preventDefault();
            var nopesan = $(this).data('recid');
            // console.log(nopesan);
            $.ajax({
                url: '<?php echo base_url() ?>admin/konfirmasibayar',
                type: 'post',
                data: { 'nopesan': nopesan },
                success: function(response) {
                    // var res = JSON.parse(response);
                    if(response === "true") {
                        bootbox.alert('Konfirmasi Pembayaran Berhasil', function() {
                            $('#modaldetail').modal('hide');
                            $('body').removeClass('modal-open');
                            $('.modal-backdrop').remove();
                            location.reload();
                        })
                    }else {
                        bootbox.alert('Terjadi Kesalahan, Harap Hubungi Admin!');
                    }
                }
            })
        })
    })
</script>