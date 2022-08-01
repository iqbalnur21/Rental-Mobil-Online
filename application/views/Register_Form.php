<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <div class="login-brand">
                            <img src="<?php echo base_url('assets/assets_stisla/') ?>assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Register</h4>
                            </div>

                            <div class="card-body">
                                <form method="POST" action="<?php echo base_url('Register') ?>">
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="nama">Nama</label>
                                            <input id="nama" type="text" class="form-control" name="nama" autofocus>
                                            <?php echo form_error('nama', '<div class="text-small text-danger">', '</div>') ?>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="username">Username</label>
                                            <input id="username" type="text" class="form-control" name="username">
                                            <?php echo form_error('username', '<div class="text-small text-danger">', '</div>') ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input id="alamat" type="text" class="form-control" name="alamat">
                                        <?php echo form_error('alamat', '<div class="text-small text-danger">', '</div>') ?>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="gender" class="d-block">Gender</label>
                                            <select class="form-control" name="gender">
                                                <option value="">--Pilih Gender--</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="perempuan">Perempuan</option>
                                            </select>
                                            <?php echo form_error('gender', '<div class="text-small text-danger">', '</div>') ?>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="no_telepon" class="d-block">No. Telepon</label>
                                            <input id="no_telepon" class="form-control" name="no_telepon">
                                            <?php echo form_error('no_telepon', '<div class="text-small text-danger">', '</div>') ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="no_ktp" class="d-block">No. KTP</label>
                                            <input id="no_ktp" class="form-control" name="no_ktp">
                                            <?php echo form_error('no_ktp', '<div class="text-small text-danger">', '</div>') ?>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="password" class="d-block">Password</label>
                                            <input id="password" class="form-control" name="password" type="password">
                                            <?php echo form_error('password', '<div class="text-small text-danger">', '</div>') ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            Register
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="simple-footer">
                            Copyright &copy; Stisla 2018
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>