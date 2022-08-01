<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Customer</h1>
        </div>`
    </section>

<?php foreach($customer as $cs) : ?>
<form method="POSt" action="<?php echo base_url('admin/Data_Customer/update_customer_aksi/').$cs->id_customer ?>">

    <div class="form-group">
        <label>Nama</label>
        <input type="hidden" name="id_customer" value="<?php echo $cs->id_customer ?>">
        <input type="text" name="nama" class="form-control" value="<?php echo $cs->nama ?>">
        <?php echo form_error('nama','<span class="text-small text-danger">','</span>') ?>
    </div>
    
    <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" class="form-control" value="<?php echo $cs->username ?>">
        <?php echo form_error('username','<span class="text-small text-danger">','</span>') ?>
    </div>

    <div class="form-group">
        <label>Alamat</label>
        <input type="text" name="alamat" class="form-control" value="<?php echo $cs->alamat ?>">
        <?php echo form_error('alamat','<span class="text-small text-danger">','</span>') ?>
    </div>

    <div class="form-group">
        <label>Gender</label>
        <select class="form-control" name="gender">
            <option value="<?php echo $cs->gender ?>"><?php echo $cs->gender ?></option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="perempuan">Perempuan</option>
        </select>
        <?php echo form_error('nama','<span class="text-small text-danger">','</span>') ?>
    </div>

    <div class="form-group">
        <label>No. Telepon</label>
        <input type="text" name="no_telepon" class="form-control" value="<?php echo $cs->no_telepon ?>">
        <?php echo form_error('no_telepon','<span class="text-small text-danger">','</span>') ?>
    </div>

    <div class="form-group">
        <label>No. KTP</label>
        <input type="text" name="no_ktp" class="form-control" value="<?php echo $cs->no_ktp ?>">
        <?php echo form_error('no_ktp','<span class="text-small text-danger">','</span>') ?>
    </div>

    <button type="submit" class="btn btn-sm btn-primary mt-3">Submit</button>
    <button type="submit" class="btn btn-sm btn-danger mt-3">Reset</button>

</form>
<?php endforeach; ?>


</div>