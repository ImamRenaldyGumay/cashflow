<style>
.invalid-feedback {
  color: red;
}
</style>
<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="<?= base_url('assets/img/stisla-fill.svg')?>" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <?php if (validation_errors()): ?>
              <div class="alert alert-danger">
                <?= validation_errors(); ?>
              </div>
            <?php endif; ?>


            <div class="card card-primary">
              <div class="card-header"><h4>Pendaftaran</h4></div>

              <div class="card-body">
                <form method="POST" action="<?= base_url('Regis')?>" class="needs-validation" novalidate="">

                  <div class="form-group">
                    <label for="name">Nama</label>
                    <input id="name" type="text" class="form-control <?= form_error('name') ? 'is-invalid' : '' ?>" name="name" tabindex="1" value="<?= set_value('name'); ?>" required>
                    <div class="invalid-feedback">
                      <?= form_error('name'); ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control<?= form_error('email') ? 'is-invalid' : '' ?>" name="email" tabindex="1" value="<?= set_value('email'); ?>" required>
                    <div class="invalid-feedback">
                      <?= form_error('email'); ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control" name="password" tabindex="1" required>
                    <div class="invalid-feedback">
                      Please fill in your password
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="password2">Confirm Password</label>
                    <input id="password2" type="password" class="form-control" name="password2" tabindex="1" required>
                    <div class="invalid-feedback">
                      Please fill in your password2
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="agree_terms" class="custom-control-input" tabindex="3" id="agree_terms" required>
                      <label class="custom-control-label" for="agree_terms">Saya setuju dengan <a href="#">Syarat dan Ketentuan</a></label>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>

                </form>
              </div>
            </div>
            <div class="mt-5 text-muted text-center">
              Already have an account? <a href="<?= base_url('Login') ?>">Log In</a>
            </div>
            <div class="mt-5 text-muted text-center">
              ke buat buku <a href="<?= base_url('BuatBukuKas') ?>">BBK</a>
            </div>