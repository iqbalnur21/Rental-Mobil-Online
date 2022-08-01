<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Mobil</h1>
        </div>
        <a href="<?php echo base_url('admin/Data_Mobil/tambah_mobil') ?>" class="btn btn-primary mb-3">Tambah Data</a>
        <?php echo $this->session->flashdata('pesan') ?>
        <table class="table table-hover table-striped table-border">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Type</th>
                    <th>Merek</th>
                    <th>No. Plat</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($mobil as $mb) : ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td>
                            <img width="100px" alt="" src="<?php echo base_url() . 'assets/upload/' . $mb->gambar ?>">
                        </td>
                        <td><?php echo $mb->kode_type ?></td>
                        <td><?php echo $mb->merek ?></td>
                        <td><?php echo $mb->no_plat ?></td>
                        <td><?php
                            if ($mb->status == "0") {
                                echo "<span class='badge badge-danger'>Tidak Tersedia</span>";
                            } else {
                                echo "<span class='badge badge-primary'>Tersedia</span>";
                            }
                            ?></td>
                        <td>
                            <a href="<?php echo base_url('admin/Data_Mobil/detail_mobil/') . $mb->id_mobil ?>" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                            <a onclick="return confirm('Yakin Ingin Hapus Data Mobil Ini ?')" href="<?php echo base_url('admin/Data_Mobil/delete_mobil/') . $mb->id_mobil ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            <a href="<?php echo base_url('admin/Data_Mobil/update_mobil/') . $mb->id_mobil ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <td></td>
            </tbody>
        </table>
    </section>
</div>