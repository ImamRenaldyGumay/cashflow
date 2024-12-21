<style>
    .content-wrapper{
        padding: 10px 60px;
    }
    .content {
            /* background-color: #f8f9fa; */
            /* background-color: #007bff; */
            /* padding: 20px; */
        }
    .header {
        /* background-color: #ffffff; */
        /* padding: 20px; */
        /* border-bottom: 1px solid #dee2e6; */
        /* padding: 5px; */
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .header .title {
        font-size: 24px;
        font-weight: bold;
        color: #007bff;
    }
    .header .description {
        font-size: 16px;
        color: #6c757d;
    }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <!-- <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Laporan Harian</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Starter Page</li>
                    </ol>
                </div>
            </div>
        </div> -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="header">
                <div class="d-flex align-items-center">
                    <img width="100" height="100" src="https://img.icons8.com/bubbles/100/gear.png" alt="gear"/>
                    <div class="">
                        <div class="title">Pengguna & Akun</div>
                        <div class="description">Pengaturan Akun</div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Pengaturan Akun</h3>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" placeholder="Password">
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->