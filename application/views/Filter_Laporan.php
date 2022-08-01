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
</div>