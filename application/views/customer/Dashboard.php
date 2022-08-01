<div class="hero-wrap ftco-degree-bg" style="background-image: url('<?php echo base_url('assets/assets_shop/') ?>images/bg_1.jpg');" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
			<div class="col-lg-8 ftco-animate">
				<div class="text w-100 text-center mb-md-5 pb-md-5">
					<h1 class="mb-4">Rental Mobil Online</h1>
				</div>
			</div>
		</div>
	</div>
</div>

<section class="ftco-section ftco-no-pt bg-light">
	<div class="container">
		<div class="row no-gutters">
			<div class="col-md-12	featured-top">
				<div class="row no-gutters">
					<div class="col-md-4 d-flex align-items-center">
						<form action="#" class="request-form ftco-animate bg-primary">
							<h2>Ayo Pesan Sekarang!</h2>
							<div class="form-group">
								<label for="" class="label">Tempat Pengambilan</label>
								<input type="text" class="form-control" placeholder="Kota, Bandara, dll">
							</div>
							<div class="form-group">
								<label for="" class="label">Tempat Pengembalian</label>
								<input type="text" class="form-control" placeholder="Kota, Bandara, dll">
							</div>
							<div class="d-flex">
								<div class="form-group mr-2">
									<label for="" class="label">Tanggal Rental</label>
									<input type="text" class="form-control" id="book_pick_date" placeholder="Tanggal">
								</div>
								<div class="form-group ml-2">
									<label for="" class="label">Tanggal Kembali</label>
									<input type="text" class="form-control" id="book_off_date" placeholder="Tanggal">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="label">Waktu Penjemputan</label>
								<input type="text" class="form-control" id="time_pick" placeholder="Jam">
							</div>
							<div class="form-group">
								<input href="<?php echo base_url('customer/Data_Mobil') ?>" type="submit" value="Rental Sekarang" class="btn btn-secondary py-3 px-4">
							</div>
						</form>
					</div>
					<div class="col-md-8 d-flex align-items-center ftco-animate">
						<div class="services-wrap rounded-right w-100">
							<h3 class="heading-section mb-4">Cara Yang Lebih Baik Untuk Merental Mobil</h3>
							<div class="row d-flex mb-4">
								<div class="col-md-4 d-flex align-self-stretch ftco-animate">
									<div class="services w-100 text-center">
										<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-pistons"></span></div>
										<div class="text w-100">
											<h3 class="heading mb-2">Mobil Dengan Kualitas Terbaik</h3>
										</div>
									</div>
								</div>
								<div class="col-md-4 d-flex align-self-stretch ftco-animate">
									<div class="services w-100 text-center">
										<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-handshake"></span></div>
										<div class="text w-100">
											<h3 class="heading mb-2">Pilih Mobil Yang Paling Sesuai</h3>
										</div>
									</div>
								</div>
								<div class="col-md-4 d-flex align-self-stretch ftco-animate">
									<div class="services w-100 text-center">
										<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-rent"></span></div>
										<div class="text w-100">
											<h3 class="heading mb-2">Temukan Mobil Pilihan Anda</h3>
										</div>
									</div>
								</div>
							</div>
							<p><a href="<?php echo base_url('customer/Data_Mobil') ?>" class="btn btn-primary py-3 px-4">Temukan Pilihan Terbaik Disini</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
</section>


<section class="ftco-section ftco-no-pt bg-light">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12 heading-section text-center ftco-animate mb-5">
				<span class="subheading">Yang Kami Tawarkan</span>
				<h2 class="mb-2">Mobil Yang Tersedia</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="carousel-car owl-carousel">
					<?php foreach ($mobil as $mb) : ?>
						<div class="item">
							<div class="car-wrap rounded ftco-animate">
								<div class="img rounded d-flex align-items-end" style="background-image: url(<?php echo base_url('assets/upload/' . $mb->gambar) ?>);">
								</div>
								<div class="text">
									<h2 class="mb-0"><a href="#"><?php echo $mb->merek ?></a></h2>
									<div class="d-flex mb-3">
										<span class="cat"><?php echo $mb->warna ?></a></span>
										<p class="price ml-auto">Rp. <?php echo number_format($mb->harga, 0, ',', '.') ?></a> <span>/Hari</span></p>
									</div>
									<p class="d-flex mb-0 d-block">
										<?php if ($this->session->userdata('id_customer') == NULL) { ?>
											<a href="<?php echo base_url('Auth/login') ?>" class="btn btn-primary py-2 mr-1">
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
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>