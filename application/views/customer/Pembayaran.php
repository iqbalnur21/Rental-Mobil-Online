<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-8">
            <div class="card" style="margin-top: 180px;">
                <div class="card-header alert alert-success">
                    Invoice Pembayaran Anda
                </div>
                <div class="card-body">
                    <table class="table">
                        <?php foreach ($transaksi as $tr) : ?>
                            <tr>
                                <th>Nama Mobil</th>
                                <td>:</td>
                                <td><?php echo $tr->merek ?></td>
                            </tr>
                            <tr>
                                <th>Tanggal Rental</th>
                                <td>:</td>
                                <td><?php echo $tr->tanggal_rental ?></td>
                            </tr>
                            <tr>
                                <th>Tanggal Kembali</th>
                                <td>:</td>
                                <td><?php echo $tr->tanggal_kembali ?></td>
                            </tr>
                            <tr>
                                <th>Biaya Sewa / Hari</th>
                                <td>:</td>
                                <td><?php echo number_format($tr->harga, 0, ',', '.') ?></td>
                            </tr>
                            <tr>
                                <?php
                                $x = strtotime($tr->tanggal_kembali);
                                $y = strtotime($tr->tanggal_rental);
                                $jumlah_hari = abs(($x - $y) / (60 * 60 * 24));
                                ?>
                                <th>Jumlah Hari Sewa</th>
                                <td>:</td>
                                <td><?php echo $jumlah_hari ?> Hari</td>
                            </tr>
                            <tr class="text-success">
                                <th>JUMLAH PEMBAYARAN</th>
                                <td>:</td>
                                <td>
                                    <button class="btn btn-sm btn-success">
                                        Rp. <?php echo number_format($tr->harga * $jumlah_hari, 0, ',', '.') ?>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <th></th>
                                <td></td>
                                <td>
                                    <a target="_blank" href="<?php echo base_url('customer/Transaksi/cetak_invoice/' . $tr->id_rental) ?>" class="btn btn-sm btn-grey">
                                        Print Invoice
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" style="margin-top: 180px;">
                <div class="card-header alert alert-primary">
                    Informasi Pembayaran
                </div>
                <div class="card-body">
                    <p class="text-success mb-3">Silahkan Melakukan Pembayaran Melalui No. Rekening Di Bawah Ini</p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Bank Mandiri - 12354542654684</li>
                        <li class="list-group-item">Bank BCA - 95654554656665</li>
                        <li class="list-group-item">Bank BNI - 56468468451321</li>
                    </ul>
                    <?php
                    if (empty($tr->bukti_pembayaran)) { ?>
                        <button type="button" style="width: 100%;" class="btn btn-sm btn-primary mt-3" data-toggle="modal" data-target="#exampleModal">
                            Upload Bukti Pembayaran
                        </button>
                    <?php } elseif ($tr->status_pembayaran == "0") { ?>
                        <button class="btn btn-sm btn-warning" style="width: 100%;">
                            Menunggu Konfirmasi
                        </button>
                    <?php } elseif ($tr->status_pembayaran == "1") { ?>
                        <button class="btn btn-sm btn-success" style="width: 100%;">
                            Pembayaran Sukses
                        </button>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Bukti Pembayaran Anda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('customer/transaksi/pembayaran_aksi') ?>" enctype="multipart/form-data" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Upload Bukti Pembayaran</label>
                        <input type="hidden" name="id_rental" class="form-control" value="<?php echo $tr->id_rental ?>">
                        <input type="file" name="bukti_pembayaran" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>