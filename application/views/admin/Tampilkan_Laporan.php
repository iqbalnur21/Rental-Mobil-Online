<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Filter Laporan Transaksi</h1>
        </div>
    </section>
    <form action="<?php echo base_url('admin/Laporan') ?>" method="POST">
        <div class="form-group">
            <label for="">Dari Tanggal</label>
            <input type="date" name="dari" class="form-control">
            <?php echo form_error('dari', '<span class="text-small text-danger">', '</span>') ?>
        </div>
        <div class="form-group">
            <label for="">Sampai Tanggal</label>
            <input type="date" name="sampai" class="form-control">
            <?php echo form_error('sampai', '<span class="text-small text-danger">', '</span>') ?>
        </div>
        <button class="btn btn-primary btn-sm" type="submit"><i class="fas fa-eye"></i> Tampilkan Data</button>
    </form>
    <hr>
    <div class="btn-group">
        <a href="<?php echo base_url().'admin/Laporan/print_laporan/?dari='.set_value('dari').'&sampai='.set_value('sampai') ?>" class="btn btn-sm btn-success" target="_blank">
            <i class="fas fa-print"></i>Print
        </a>
    </div>
    <div class="table-responsive mt-3">
        <table class="table table-bordered table-striped">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Mobil</th>
                <th>Tgl. Rental</th>
                <th>Tgl. Kembali</th>
                <th>Harga/Hari</th>
                <th>Denda/Hari</th>
                <th>Total Denda</th>
                <th>Tgl. Dikembalikan</th>
                <th>Status Pengembalian</th>
                <th>Status Rental</th>
            </tr>
            <?php $no = 1;
            foreach ($laporan as $tr) :
            ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $tr->nama ?></td>
                    <td><?php echo $tr->merek ?></td>
                    <td><?php echo date('d/m/Y', strtotime($tr->tanggal_rental))  ?></td>
                    <td><?php echo date('d/m/Y', strtotime($tr->tanggal_kembali)) ?></td>
                    <td>Rp. <?php echo number_format($tr->harga, 0, ',', '.') ?></td>
                    <td>Rp. <?php echo number_format($tr->denda, 0, ',', '.') ?></td>
                    <td>Rp. <?php echo number_format($tr->total_denda, 0, ',', '.') ?></td>
                    <td>
                        <?php if ($tr->tanggal_pengembalian == '0000-00-00') {
                            echo "-";
                        } else {
                            echo date('d/m/Y', strtotime($tr->tanggal_pengembalian));
                        } ?>
                    </td>
                    <td>
                        <?php if ($tr->status == '1') {
                            echo "Sudah Kembali";
                        } else {
                            echo "Belum Kembali";
                        } ?>
                    </td>
                    <td>
                        <?php if ($tr->status == '1') {
                            echo "Sudah Kembali";
                        } else {
                            echo "Belum Kembali";
                        } ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>