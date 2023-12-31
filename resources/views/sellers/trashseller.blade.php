<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shoes Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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
        <h1 id="headerpenjualantext">Pengelolaan data penjual yang terhapus</h1>
    </div>

    <div class="container text-center">
    <div class="row">
        <div class="col-1">
            <a type="button" class="btn btn-warning" href="/trashseller">Refresh</a>
        </div>
        <div class="col-1">
            <a type="button" class="btn btn-dark" href="/seller">Kembali</a>
        </div>
        <div class="col">
            <!-- Dropdown Start -->
            <form action="/trashseller" method="get" class="form-inline">
                <div class="input-group">
                    <label for="sort_by" class="input-group-text">Sort by:</label>
                    <select name="sort_by" id="sort_by" class="form-select" onchange="this.form.submit()">
                        <option value="" {{ empty(request('sort_by')) ? 'selected' : '' }}>-- Select --</option>
                        <option value="alphabet" {{ request('sort_by') == 'alphabet' ? 'selected' : '' }}>A-Z (Nama Penjual)</option>
                        <option value="reversed" {{ request('sort_by') == 'reversed' ? 'selected' : '' }}>Z-A (Nama Penjual)</option>
                    </select>
                </div>
            </form>
            <!-- Dropdown End -->
        </div>
        <div class="col">
        <form class="d-flex" role="search" method="get" action="/trashseller">
        <input class="form-control me-2" type="search" placeholder="Cari penjual" aria-label="Search" name="search">
        <button class="btn btn-success" type="submit">Cari</button>
        </form>
        </div>
    </div>
</div>

    <table class="table" id="tableOverview">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Penjual</th>
            <th scope="col">Nomor Telepon Penjual</th>
            <th scope="col">Status</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
      @foreach ($data as $index => $row)
          <tr>
              <th scope="row">{{ $index + 1 }}</th>
              <td>{{ $row->nama_penjual }}</td>
              <td>{{ $row->nomor_telepon }}</td>
              <td>{{ $row->status }}</td>
              <td>{{ $row->email }}</td>
              <td>
                <form action="{{ route('recover', ['id' => $row->id]) }}" method="post" class="d-inline">
                    @csrf
                    @method('put')
                    <button type="submit" class="btn btn-info ml-2">Recover</button>
                </form>
                  <form action="{{ route('hardDelete', ['id' => $row->id]) }}" method="post" class="d-inline">
                      @csrf
                      @method('delete')
                      <button type="submit" class="btn btn-danger ml-2">Permanent Remove</button>
                  </form>
              </td>
          </tr>
      @endforeach
  </tbody>
  
</table>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
