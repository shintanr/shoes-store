<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Shoes Store | Profil </title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
            crossorigin="anonymous"
        />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap">
        <style>
              body {
        font-family: 'Poppins', sans-serif; /* Menggunakan font Poppins */
        background-color: #fff;
      }

      .navbar,
      .navbar-light .navbar-toggler-icon,
      .bg-primary,
      .text-white {
        font-family: 'Poppins', sans-serif; /* Menggunakan font Poppins */
      }
            #headerpenjualan {
              text-align: center;
              margin-top: 100px;
            }
        
            #headerpenjualan h1 {
              font-size: 30px;
              color: #333;
            }
        
            #tableOverview {
              width: 80%;
              margin: auto;
              margin-top: 20px;
              margin-bottom: 100px;
            }
        
            #supervisor {
              margin-left: 25px;
            }
        
            body {
                background-color: #fff;
            }
        
            .card {
              
              background-color: rgb(155, 112, 48)
            }

            .btn-primary {
                background-color: #654321;
                border-color: #654321;
            }

            .btn-primary:hover {
                background-color: #543210;
                border-color: #543210;
            }
   
            .navbar {
                margin: 0 150px; 
            }
            .bg-primary {
              background-color: #343a40 !important;
            }
        
            .text-white {
              color: #fff !important;
            }
        
            /* Penambahan CSS untuk mengubah warna navbar */
            .navbar {
              background-color: #001f3f; /* Ganti dengan warna yang diinginkan, contohnya biru tua */
            }
        
            .navbar-light .navbar-toggler-icon {
              background-color: #fff; /* Ganti dengan warna ikon yang sesuai dengan latar belakang navbar */
            }

            .navbar-nav .nav-link {
            font-weight: bold;
            }
          </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="topnav">
            <a class="navbar-brand" href="/home">{{ session('user_data')->nama_supervisor }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ms-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="/home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/selling">Data transaksi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/supervise"
                        >Supervisi Penjual</a
                    >
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/seller">Penjual</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/bike">Sepatu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/profile">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/logout">Logout</a>
                </li>
              </ul>
            </div>
          </nav>

        <div id="headerpenjualan">
            <h1 id="headerpenjualantext">Profile</h1>
        </div>

        <div class="container-xl px-4 mt-4">
            <hr class="mt-0 mb-4" />
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="text-center">
                        <div class="card mx-auto mb-4" style="max-width: 400px">
                            <div class="card-header bg-primary text-white">
                                Account Details
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="mb-3">
                                        <label
                                            class="small mb-1"
                                            for="nama"
                                            >Nama</label
                                        >
                                        <input
                                            class="form-control"
                                            id="nama"
                                            type="nama"
                                            value="{{$data->nama_supervisor}}"
                                            disabled
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label
                                            class="small mb-1"
                                            for="inputEmail"
                                            >Email</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputEmail"
                                            type="email"
                                            placeholder="Enter your email address"
                                            value="{{$data->email}}"
                                            disabled
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label
                                            class="small mb-1"
                                            for="inputEmail"
                                            >Nomor Telepon</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputEmail"
                                            type="email"
                                            placeholder="Enter your email address"
                                            value="{{$data->nomor_telepon}}"
                                            disabled
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label
                                            class="small mb-1"
                                            for="inputEmail"
                                            >Tanggal Masuk</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputEmail"
                                            type="email"
                                            placeholder="Enter your email address"
                                            value="{{$data->tanggal_masuk}}"
                                            disabled
                                        />
                                    </div>
                                    <a class="btn btn-primary" href="/editprofile/{{$data->id}}" type="button">
                                        Edit
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
            integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
            crossorigin="anonymous"
        ></script>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
