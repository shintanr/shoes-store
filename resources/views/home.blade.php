<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Shoes Store</title>
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
        background-color: transparent;
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

            .navbar {
            background-color: rgba(0, 31, 63, 0.5); /* Ubah angka-angka sesuai kebutuhan Anda */
            }
        
            body {
                background-color: transparent;
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
            .navbar {
        background-color: rgba(0, 31, 63, 0.5); /* Nilai RGBA dengan tingkat transparansi 0.5 */
    }

        body {
            background-color: transparent;
        }

        /* Penambahan CSS untuk mengubah warna navbar */
        .navbar {
            background-color: rgba(0, 31, 63, 0.5); /* Ganti dengan warna dan tingkat transparansi yang diinginkan */
        }

        .bg-primary {
            background-color: rgba(0, 31, 63, 0.5) !important; /* Gunakan RGBA untuk background warna primer juga jika perlu */
        }

        .text-white {
            color: #fff !important;
        }

        /* Penambahan CSS untuk mengubah warna navbar */
        .navbar-light .navbar-toggler-icon {
            background-color: #fff; /* Ganti dengan warna ikon yang sesuai dengan latar belakang navbar */
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

        <div
            id="carouselExampleSlidesOnly"
            class="carousel slide"
            data-ride="carousel"
        >
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img
                        class="d-block w-100"
                        src="{{ asset('images/sepatu2.JPG') }}"
                        alt="First slide"
                    />
                    <div class="carousel-caption">
                        <h1>Pengelolaan Basis Data Toko Sepatu Kelompok 05</h1>
                    </div>
                </div>
            </div>
        </div>

        <div id="headerpenjualan">
            <h1 id="headerpenjualantext">
                Overview 5 penjualan Sepatu terakhir
            </h1>
        </div>

        <table class="table" id="tableOverview">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal pembelian</th>
                    <th scope="col">Nama Sepatu</th>
                    <th scope="col">Jenis Sepatu</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Nama Pembeli</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $index => $row)
                <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    <td>{{ $row->tanggal_transaksi }}</td>
                    <td>{{ $row->nama_sepatu }}</td>
                    <td>{{ $row->jenis_sepatu }}</td>
                    <td>{{ $row->harga }}</td>
                    <td>{{ $row->nama_user }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"
        ></script>
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
            integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
            crossorigin="anonymous"
        ></script>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
            integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
