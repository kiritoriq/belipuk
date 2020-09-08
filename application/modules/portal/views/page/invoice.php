<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/jquery-ui.min.css">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/html2canvas.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>

    <title>Document</title>
</head>
<style>
    #invoice{
        /* padding: 30px; */
    }

    .invoice {
        position: relative;
        background-color: #FFF;
        min-height: 680px;
        /* padding: 15px */
    }

    .invoice header {
        /* padding: 10px 0; */
        margin-bottom: 20px;
        border-bottom: 1px solid #3989c6
    }

    .invoice .company-details {
        text-align: right
    }

    .invoice .company-details .name {
        margin-top: 0;
        margin-bottom: 0
    }

    .invoice .contacts {
        margin-bottom: 20px
    }

    .invoice .invoice-to {
        text-align: left
    }

    .invoice .invoice-to .to {
        margin-top: 0;
        margin-bottom: 0
    }

    .invoice .invoice-details {
        text-align: right
    }

    .invoice .invoice-details .invoice-id {
        margin-top: 0;
        color: #3989c6
    }

    .invoice main {
        padding-bottom: 50px
    }

    .invoice main .thanks {
        /* margin-top: -100px; */
        font-size: 2em;
        margin-bottom: 50px
    }

    .invoice main .notices {
        padding-left: 6px;
        border-left: 6px solid #3989c6
    }

    .invoice main .notices .notice {
        font-size: 1.2em
    }

    .invoice table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 20px
    }

    .invoice table td,.invoice table th {
        padding: 15px;
        background: #eee;
        border-bottom: 1px solid #fff
    }

    .invoice table th {
        white-space: nowrap;
        font-weight: 400;
        font-size: 16px
    }

    .invoice table td h3 {
        margin: 0;
        font-weight: 400;
        color: #005ba4;
        font-size: 1.2em
    }

    .invoice table .qty,.invoice table .total,.invoice table .unit {
        text-align: right;
        font-size: 1.2em
    }

    .invoice table .no {
        color: #fff;
        font-size: 1.6em;
        background: #005ba4
    }

    .invoice table .unit {
        background: #ddd
    }

    .invoice table .total {
        background: #005ba4;
        color: #fff
    }

    .invoice table tbody tr:last-child td {
        border: none
    }

    .invoice table tfoot td {
        background: 0 0;
        border-bottom: none;
        white-space: nowrap;
        text-align: right;
        padding: 10px 20px;
        font-size: 1.2em;
        border-top: 1px solid #aaa
    }

    .invoice table tfoot tr:first-child td {
        border-top: none
    }

    .invoice table tfoot tr:last-child td {
        color: #3989c6;
        font-size: 1.4em;
        border-top: 1px solid #3989c6
    }

    .invoice table tfoot tr td:first-child {
        border: none
    }

    .invoice footer {
        width: 100%;
        text-align: center;
        color: #777;
        border-top: 1px solid #aaa;
        padding: 8px 0
    }

    @media print {
        .invoice {
            font-size: 11px!important;
            overflow: hidden!important
        }

        .invoice footer {
            position: absolute;
            bottom: 10px;
            page-break-after: always
        }

        .invoice>div:last-child {
            page-break-before: always
        }
    }
</style>
<body>
    <!--Author      : @arboshiki-->
    <div id="invoice">

    <!-- <div class="toolbar hidden-print">
        <div class="text-right">
            <button id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
            <button class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Export as PDF</button>
        </div>
        <hr>
    </div> -->
    <div class="invoice overflow-auto">
        <div style="max-width: 600px">
            <header>
                <div class="row" style="background-color: #ebede0">
                    <div class="col">
                        <a target="_blank" href="<?php echo base_url() ?>">
                            <img src="<?php echo base_url() ?>assets/Images/logo_pusri_pjg.jpg" data-holder-rendered="true" width="60%"/>
                            </a>
                    </div>
                    <div class="col company-details">
                        <h4 class="name">
                            <a target="_blank" href="<?php echo base_url() ?>">
                            PT. Pupuk Sriwidjaja Palembang
                            </a>
                        </h4>
                        <div style="font-size: 11pt">Jl. Mayor Zen, Palembang 30118 - INDONESIA</div>
                        <div style="font-size: 11pt">Tel. 62-(711)-712222, 712111</div>
                        <div style="font-size: 11pt">Fax. 62-(711)-712100, 712020</div>
                    </div>
                </div>
            </header>
            <?php foreach($rs->result() as $item): ?>
            <main style="font-size: 11pt">
                <div class="row contacts">
                    <div class="col invoice-to">
                        <div class="text-gray-light">Invoice Untuk:</div>
                        <h4 class="to"><strong><?php echo $item->nama ?></strong></h4>
                        <div class="address"><?php echo $item->alamat ?></div>
                            <?php if($item->nik != "" AND $item->nik != NULL) { ?>
                                <div class="address"><?php echo $item->nik ?></div>
                                <div class="address"><?php echo $item->npwp ?></div>
                           <?php } ?>
                        <div class="email"><a href=""><?php echo $item->email ?></a></div>
                    </div>
                    <div class="col invoice-details">
                        <h3 class="invoice-id"><?php echo $item->no_pesan ?></h3>
                        <div class="date">Tanggal Invoice: <?php echo date('Y-m-d', strtotime($item->created_at)) ?></div>
                        <!-- <div class="date">Due Date: 30/10/2018</div> -->
                    </div>
                </div>
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="text-center">Nama Barang</th>
                            <th class="text-center">Ukuran</th>
                            <th class="text-center">Harga Satuan</th>
                            <th class="text-center">Jumlah</th>
                            <th class="text-center">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach($rb->result() as $value): ?>
                        <tr>
                            <td class="no"><?php echo $i ?></td>
                            <td class="text-left"><h3><?php echo $value->kd_brg." - ".$value->nama_brg ?></h3>
                            <td class="qty"><?php echo $value->ukuran." ".(($value->kd_brg=="B01")?"L":"Kg") ?></td>
                            <td class="unit"><?php echo "Rp ".number_format($this->query->getHargasatuan($value->kd_brg, $value->ukuran)) ?></td>
                            <td class="qty"><?php echo $value->jml ?></td>
                            <td class="total"><?php echo "Rp ".number_format($value->harga) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <!-- <tr>
                            <td colspan="2"></td>
                            <td colspan="2">SUBTOTAL</td>
                            <td>$5,200.00</td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">TAX 25%</td>
                            <td>$1,300.00</td>
                        </tr> -->
                        <tr>
                            <td colspan="3"></td>
                            <td colspan="2">GRAND TOTAL</td>
                            <td><?php echo "Rp ".number_format($item->tot_harga) ?></td>
                        </tr>
                    </tfoot>
                </table>
                <div class="thanks">Terima Kasih!</div>
                <div class="notices">
                    <div>NOTICE:</div>
                    <div class="notice">
                        <ul>
                            <li>Batas pembayaran maksimal adalah 10 jam sejak transaksi pemesanan dilakukan.</li>
                            <li>Barang akan dikirimkan setelah pembayaran dilakukan dan dikonfirmasi.</li>
                        </ul>
                    </div>
                </div>
            </main>
            <?php endforeach; ?>
            <!-- <footer> -->
                <!-- Invoice was created on a computer and is valid without the signature and seal. -->
            <!-- </footer> -->
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>
    </div>

<script>
     $(document).ready(function() {
         window.print();
        // $('#printInvoice').click(function(){
        //     Popup($('.invoice')[0].outerHTML);
        //     function Popup(data) 
        //     {
        //         window.print();
        //         return true;
        //     }
        // });
     })
</script>
</body>
</html>