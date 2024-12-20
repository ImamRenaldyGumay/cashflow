<!-- Content Wrapper. Contains page content -->
<div class="hold-transition register-page">
  
  <div class="content">
    <div class="container">
      <div class="register-box">
        <div class="register-logo">
          <a href="#"><b>Admin</b>LTE</a>
        </div>
        
        <div class="card">
          <div class="card-body register-card-body">
            <p class="login-box-msg">Register a new membership</p>
            
            <form action="<?= base_url('Regis')?>" method="post">
              <div class="form-group mb-3">
                <label for="name">Nama</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= set_value('name'); ?>">
                <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
              </div>

              <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= set_value('email'); ?>">
                <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
              </div>

              <div class="form-group mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
              </div>

              <div class="form-group mb-3">
                <label for="password2">Confirm Password</label>
                <input type="password" class="form-control" id="password2" name="password2">
                <?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
              </div>

              <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="agree_terms" name="agree_terms">
                <label class="form-check-label" for="agree_terms">Saya setuju dengan <a href="#">Syarat dan Ketentuan</a></label>
                <?= form_error('agree_terms', '<small class="text-danger">', '</small>'); ?>
              </div>
              
              <button type="submit" class="btn btn-primary">Daftarkan >></button>
            </form>
            
            <a href="<?= base_url('Login')?>" class="text-center">I already have a membership</a>
            <a href="<?= base_url('BuatBukuKas')?>" class="text-center">I already have a membership</a>
          
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
