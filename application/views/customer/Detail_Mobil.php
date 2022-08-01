


<div class="container">
    <div class="col-md-9 ftco-animate pb-5" style="margin-top: 180px; ">
        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Beranda <i class="ion-ios-arrow-forward"></i></a></span> <span>Detail <i class="ion-ios-arrow-forward"></i></span></p>
        <h1 class="mb-3 bread">Detail Mobil</h1>
    </div>
    <div class="card">
        <div class="card-body">
            <?php foreach ($detail as $dt) : ?>

                <img style="width: 100%;" src="<?php echo base_url('assets/upload/') . $dt->gambar ?>" alt="">

                <table class="table">
                    <tr>
                        <th>Merek</th>
                        <td><?php echo $dt->merek ?></td>
                    </tr>
                    <tr>
                        <th>No. Plat</th>
                        <td><?php echo $dt->no_plat ?></td>
                    </tr>
                    <tr>
                        <th>Warna</th>
                        <td><?php echo $dt->warna ?></td>
                    </tr>
                    <tr>
                        <th>Tahun</th>
                        <td><?php echo $dt->tahun ?></td>
                    </tr>
                    <tr>
                        <th>Harga</th>
                        <td>Rp. <?php echo number_format($dt->harga, 0, ',', '.') ?></td>
                    </tr>
                    <tr>
                        <th>Denda</th>
                        <td>Rp. <?php echo number_format($dt->denda, 0, ',', '.') ?></td>
                    </tr>

                    <tr>
                        <th>Supir</th>
                        <td>
                            <?php
                            if ($dt->supir == "0") {
                                echo "Tidak Tersedia";
                            } else {
                                echo "Tersedia";
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th>AC</th>
                        <td>
                            <?php
                            if ($dt->ac == "0") {
                                echo "Tidak Tersedia";
                            } else {
                                echo "Tersedia";
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th>MP3 Player</th>
                        <td>
                            <?php
                            if ($dt->mp3_player == "0") {
                                echo "Tidak Tersedia";
                            } else {
                                echo "Tersedia";
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Central Lock</th>
                        <td>
                            <?php
                            if ($dt->central_lock == "0") {
                                echo "Tidak Tersedia";
                            } else {
                                echo "Tersedia";
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td><?php
                            if ($dt->status == 1) {
                                echo "Dirental";
                            } else {
                                echo "Sedang Dirental";
                            }
                            ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
								<?php if ($this->session->userdata('id_customer') == NULL) { ?>
										<a href="<?php echo base_url('Auth/login')?>" class="btn btn-success py-2 mr-1">
										Rental
										</a>
								<?php } else { ?>
									<?php if ($dt->status == "1") { ?>
										<a href="<?php echo base_url('customer/Rental/tambah_rental/') . $dt->id_mobil ?>" class="btn btn-success py-2 mr-1">
											Rental
										</a>
									<?php
									} else {
										echo '<a class="btn btn-grey py-2 mr-1">Tidak Tersedia</a>';
									} ?>
								<?php } ?>
                        </td>
                    </tr>
                </table>
            <?php endforeach; ?>
        </div>
    </div>
</div>