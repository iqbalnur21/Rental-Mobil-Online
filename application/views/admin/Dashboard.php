<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
            </div>
              <H6>Total Customer</H6>
            <div class="card-body">
              <?php echo $jumlah_customer ?> User
            </div>
          </div>
        </div>
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="fas fa-car"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
            </div>
              <H6>Total Mobil</H6>
            <div class="card-body">
              <?php echo $jumlah_mobil ?> Mobil
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card card-statistic-1">
          <div class="card-icon bg-warning">
            <i class="far fa-file"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
            </div>
              <H6>Total Transaksi</H6>
            <div class="card-body">
              <?php echo $jumlah_transaksi ?> Transaksi
            </div>
          </div>
        </div>
        <div class="card card-statistic-1">
          <div class="card-icon bg-success">
            <i class="fas fa-dollar-sign"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
            </div>
              <h6>Pendapatan</h6>
            <div class="card-body">
              <?php print_r('Rp. '.number_format($pendapatan, 0, ',', '.')) ; ?>
            </div>
          </div>
        </div>
      </div>
    </div>


  </section>
</div>