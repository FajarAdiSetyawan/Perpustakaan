<div class="row">
  <div class="column">
    <a href="?page=profile&id=<?= $_SESSION['id']; ?>">
      <div class="card">
        <h3 class="text-center mb-2">Profile</h3>
        <div class="lottie-animation">
          <lottie-player src="assets/dist/lottie/user.json" background="transparent" speed="1" style="width: 200px; height: 200px;" loop autoplay class="dashboard-img"></lottie-player>
        </div>
      </div>
  </div>
  </a>
  <!-- JIKA ROLE ADMIN TAMPILKAN  -->
  <?php if (($_SESSION['role']) == 'admin') : ?>
    <a href="?page=anggota">
      <div class="column">
        <div class="card">
          <h3 class="text-center mb-2">Data Anggota</h3>
          <div class="lottie-animation">
            <lottie-player src="assets/dist/lottie/users.json" background="transparent" speed="1" style="width: 200px; height: 200px;" loop autoplay class="dashboard-img"></lottie-player>
          </div>
        </div>
      </div>
    </a>
  <?php endif; ?>
  <a href="?page=buku">
    <div class="column">
      <div class="card">
        <h3 class="text-center mb-2">Data Buku</h3>
        <div class="lottie-animation">
          <lottie-player src="assets/dist/lottie/books.json" background="transparent" speed="1" style="width: 200px; height: 200px;" loop autoplay class="dashboard-img"></lottie-player>
        </div>
      </div>
    </div>
  </a>
  <!-- JIKA ROLE ADMIN TAMPILKAN  -->
  <?php if (($_SESSION['role']) == 'admin') : ?>
    <a href="?page=transaksi">
      <div class="column">
        <div class="card">
          <h3 class="text-center mb-2">Transaksi</h3>
          <div class="lottie-animation">
            <lottie-player src="assets/dist/lottie/transaction.json" background="transparent" speed="1" style="width: 200px; height: 200px;" loop autoplay class="dashboard-img"></lottie-player>
          </div>
        </div>
      </div>
    </a>
  <?php endif; ?>
</div>