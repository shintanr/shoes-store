<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Pengelolaan Toko Sepatu Kelompok 05</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
            crossorigin="anonymous"
        />
        <style>
            #headerpenjualan {
                text-align: center;
                margin-top: 50px;
            }

            #headerpenjualan h1 {
                font-size: 50px;
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
        </style>
    </head>
    <body>
        <!--NAV-->
        <nav
            class="navbar navbar-expand-lg navbar-light bg-light fixed-top"
            id="topnav"
        >
            <a
                class="navbar-brand"
                href="/home"
                id="supervisor"
                >{{ session('user_data')->nama_supervisor }}</a
            >
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
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
            <h1 id="headerpenjualantext">Pembuatan data penjual</h1>
        </div>

        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="/createseller" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label
                                        for="exampleInputEmail1"
                                        class="form-label"
                                        >Email address</label
                                    >
                                    <input
                                        type="email"
                                        class="form-control"
                                        id="exampleInputEmail1"
                                        aria-describedby="emailHelp"
                                        name="email"
                                    />
                                </div>
                                <div class="mb-3">
                                    <label
                                        for="exampleInputPassword1"
                                        class="form-label"
                                        >Password</label
                                    >
                                    <input
                                        type="password"
                                        class="form-control"
                                        id="exampleInputPassword1"
                                        name="password"
                                    />
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label"
                                        >Nama Penjual</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="nama"
                                        name="nama_penjual"
                                    />
                                </div>
                                <div class="mb-3">
                                    <label
                                        for="nomor_telepon"
                                        class="form-label"
                                        >Nomor telepon</label
                                    >
                                    <input
                                        type="number"
                                        class="form-control"
                                        id="nomor_telepon"
                                        name="nomor_telepon"
                                    />
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label"
                                        >Status</label
                                    >
                                    <select
                                        class="form-select"
                                        id="role"
                                        name="status"
                                    >
                                        <option value="aktif">Aktif</option>
                                        <option value="cuti">Cuti</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label"
                                        >Supervisor</label
                                    >
                                    <select
                                        class="form-select"
                                        id="role"
                                        name="id_supervisor"
                                    >
                                        @foreach ($data as $index => $row)
                                        <option value="{{ $row->id }}">
                                            {{ $row->nama_supervisor }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
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
