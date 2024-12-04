<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Dashboard</title>
    <style>
        body {
            display: flex;
            height: 100vh;
            margin: 0;
        }
        .sidebar {
            height: 100%;
            background-color: #f8f9fa; /* Warna sidebar */
            padding: 20px;
            position: fixed;
            width: 250px;
        }
        .sidebar .nav-link {
            color: #333;
        }
        .sidebar .nav-link.active {
            background-color: #6f42c1; /* Warna aktif */
            color: white;
        }
        .sidebar .nav-link:hover {
            background-color: #e9ecef; /* Warna hover */
        }
        .navbar {
            width: calc(100% - 250px);
            margin-left: 250px;
            position: fixed;
            z-index: 1;
        }
        .content {
            margin-left: 250px;
            padding-top: 56px; /* Padding untuk navbar */
            width: calc(100% - 250px);
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <h2>Dashlab</h2>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="#">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Product</a>
                <ul class="nav flex-column submenu">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Product List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Categories</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Orders <span class="badge badge-danger">2</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Customers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Seller</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Analytics</a>
            </li>
        </ul>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Dashlab</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-search"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-bell"></i> <span class="badge badge-danger">3</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-envelope"></i> <span class="badge badge-danger">64</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Jay Hargudson
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Profile</a>
                        <a class="dropdown-item" href="#">Settings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="content">
        <h1>Welcome to the Dashboard</h1>
        <p>Your content goes here.</p>
        <div class="row">
            <div class="col-md-6">
                <h2>Notifications</h2>
                <p>You have new messages and alerts.</p>
            </div>
            <div class="col-md-6">
                <h2>Statistics</h2>
                <p>Overview of your performance.</p>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
