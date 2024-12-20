

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container mb-4">
            <!-- <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Top Navigation <small>Example 3.0</small></h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item"><a href="#">Layout</a></li>
                  <li class="breadcrumb-item active">Top Navigation</li>
                </ol>
              </div>
            </div> -->
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
          <div class="container">
            <div class="login-logo">
              <a href="#"><b>Admin</b>LTE</a>
            </div>
            <div class="row d-flex justify-content-center">
              <div class="col-lg-4">
                <div class="card">
                  <div class="card-body login-card-body">
                    <p class="login-box-msg">Sign in to start your session</p>

                    <form action="<?= base_url('Login')?>" method="post" class="mb-5">
                      <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" id="email" name="email"/>
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                          </div>
                        </div>
                      </div>
                      <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" id="password" name="password"/>
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-8">
                          <div class="icheck-primary">
                            <input type="checkbox" id="remember" />
                            <label for="remember"> Remember Me </label>
                          </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                          <button type="submit" class="btn btn-primary btn-block">
                            Sign In
                          </button>
                        </div>
                        <!-- /.col -->
                      </div>
                    </form>

                    <p class="mb-1">
                      <a href="forgot-password.html">I forgot my password</a>
                    </p>
                    <p class="mb-0">
                      <a href="<?= base_url("Regis")?>" class="text-center"
                        >Register a new membership</a
                      >
                    </p>
                  </div>
                  <!-- /.login-card-body -->
                </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>