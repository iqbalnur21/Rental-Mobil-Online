<section class="ftco-section bg-light">
	<div class="container">
		<div class="col-md-9 ftco-animate pb-5">
			<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Beranda <i class="ion-ios-arrow-forward"></i></a></span> <span>Mobil <i class="ion-ios-arrow-forward"></i></span></p>
			<h1 class="mb-3 bread">List Mobil</h1>
		</div>
		<?php echo $this->session->flashdata('pesan') ?>
		<div class="row">
			<?php foreach ($mobil as $mb) :
			?>
				<div class="col-md-4">
					<div class="car-wrap rounded ftco-animate">
						<div class="img rounded d-flex align-items-end" style="background-image: url(<?php echo base_url('assets/upload/') . $mb->gambar ?>">
						</div>
						<div class="text">
							<h2 class="mb-0"><a href="car-single.html"><?php echo $mb->merek ?></a></h2>
							<div class="d-flex mb-3">
								<span class="cat"><?php echo $mb->warna ?></a></span>
								<p class="price ml-auto">Rp. <?php echo number_format($mb->harga, 0, ',', '.') ?><span>/hari</span></p>
							</div>


							<div class="tab-content" id="pills-tabContent">
								<div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
									<div class="row">
										<ul class="features">
											<?php if ($mb->ac == "1") {
												echo '<li class="check"><span class="ion-ios-checkmark  text-success"> AC</span> </li>';
											} else {
												echo '<li class="remove"><span class="ion-ios-close  text-danger"> AC</span></li>';
											} ?>
											<?php if ($mb->supir == "1") {
												echo '<li class="check"><span class="ion-ios-checkmark  text-success"> Supir</span> </li>';
											} else {
												echo '<li class="remove"><span class="ion-ios-close  text-danger"> Supir</span></li>';
											} ?>
											<?php if ($mb->mp3_player == "1") {
												echo '<li class="check"><span class="ion-ios-checkmark  text-success"> MP3 Player</span> </li>';
											} else {
												echo '<li class="remove"><span class="ion-ios-close  text-danger"> MP3 Player</span></li>';
											} ?>
											<?php if ($mb->central_lock == "1") {
												echo '<li class="check"><span class="ion-ios-checkmark  text-success"> Central Lock</span> </li>';
											} else {
												echo '<li class="remove"><span class="ion-ios-close  text-danger"> Central Lock</span></li>';
											} ?>

										</ul>
									</div>
								</div>
							</div>

							<p class="d-flex mb-0 d-block">
								<?php if ($this->session->userdata('id_customer') == NULL) { ?>
										<a href="<?php echo base_url('Auth/login')?>" class="btn btn-primary py-2 mr-1">
										Rental
										</a>
								<?php } else { ?>
									<?php if ($mb->status == "1") { ?>
										<a href="<?php echo base_url('customer/Rental/tambah_rental/') . $mb->id_mobil ?>" class="btn btn-primary py-2 mr-1">
											Rental
										</a>
									<?php
									} else {
										echo '<a class="btn btn-grey py-2 mr-1">Tidak Tersedia</a>';
									} ?>
								<?php } ?>
								<a href="<?php echo base_url('customer/Data_Mobil/detail_mobil/') . $mb->id_mobil ?>" class="btn btn-secondary py-2 ml-1">
									Detail
								</a>
							</p>
						</div>
					</div>
				</div>
			<?php endforeach ?>
		</div>
	</div>
</section>
