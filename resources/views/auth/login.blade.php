<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Selamat Datang di Pelayanan PUPR</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        body {
            background-image: url('.jpg'); /* Ganti dengan gambar background yang diinginkan */
            background-size: cover; /* Membuat gambar menutupi seluruh halaman */
            background-position: center; /* Memposisikan gambar di tengah */
        }

        .login-container {
            height: 100vh; /* Full height */
        }

        .card {
            width: 800px; /* Set the desired width */
            margin: auto; /* Center the card */
            border-radius: 1rem; /* Optional: round the corners */
            padding: 2rem; /* Add padding inside the card */
            background-color: rgba(255, 255, 255, 0.8); /* Set a background color with transparency */
        }

        .form-group {
            margin-bottom: 1.5rem; /* Increase space between fields */
        }

        .form-control {
            height: 50px; /* Increase height of input fields */
            font-size: 1.2rem; /* Increase font size */
            padding: 10px; /* Increase padding in input fields */
        }

        label {
            font-size: 1.2rem; /* Increase label font size */
        }

        .btn-user {
            font-size: 1.2rem; /* Increase button font size */
            padding: 10px; /* Increase padding of button */
        }

        .bg-login-image {
            background-size: cover; /* Make background image cover the area */
        }

        .image-container {
            text-align: center; /* Center the image */
            margin-bottom: 1rem; /* Add some space below the image */
        }

        .login-image {
            width: auto; /* Set image width to auto to maintain aspect ratio */
            height: auto; /* Maintain aspect ratio */
            max-width: 120px; /* Set a smaller maximum width for the image */
        }
    </style>
</head>

<body>
    <div class="container-fluid login-container">
        <div class="row justify-content-center align-items-center" style="height: 100%;">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Silahkan Masuk</h1>
                                    </div>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form class="user" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputEmail">Email Address</label>
                                            <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Masukkan Email Address.." required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword">Password</label>
                                            <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
</body>

</html>
