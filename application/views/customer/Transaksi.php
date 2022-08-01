<div class="container">
    <div class="col-md-9 ftco-animate pb-5" style="margin-top: 180px; ">
        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Beranda <i class="ion-ios-arrow-forward"></i></a></span> <span>Transaksi <i class="ion-ios-arrow-forward"></i></span></p>
        <h1 class="mb-3 bread">List Transaksi</h1>
    </div>
    <div class="card mx-auto ftco-animate" style=" margin-bottom: 200px;">
        <div class="card-header">
            Data Transaksi
        </div>
        <span class="mt-2 p-2"><?php echo $this->session->flashdata('pesan') ?></span>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>No</th>
                    <th>Nama Customer</th>
                    <th>Tipe Mobil</th>
                    <th>No. Plat</th>
                    <th>Harga Sewa</th>
                    <th>Action</th>
                </tr>
                <?php
                $no = 1;
                foreach ($transaksi as $tr) :
                ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $tr->nama ?></td>
                        <td><?php echo $tr->merek ?></td>
                        <td><?php echo $tr->no_plat ?></td>
                        <td>Rp. <?php echo number_format($tr->harga, 0, ',', '.') ?></td>
                        <td style="text-align: center; ">
                            <?php if ($tr->status_rental == "Selesai") { ?>
                                <button class="btn btn-sm btn-danger">Rental Selesai</button>
                            <?php } else { ?>
                                <a href="<?php echo base_url('customer/Transaksi/pembayaran/' . $tr->id_rental) ?>" class="btn btn-sm btn-success">
                                    Cek Pembayaran
                                </a>
                                <a onclick="return confirm('Yakin Batal ?')" class="btn btn-sm btn-danger" href="<?php echo base_url('customer/Transaksi/batal_transaksi/' . $tr->id_rental) ?>">
                                    Batal
                                </a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>