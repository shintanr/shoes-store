<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Ganti 'NamaFont' dengan nama font yang diinginkan, misalnya 'Poppins' -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">

  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Poppins', Arial, sans-serif;
      background-color: #f2f2f2;
      overflow: hidden;
    }

    h1 {
      margin: 0;
      color: #000;
      margin-bottom: 2%;
    }

    .card {
      background: #ffffff;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      margin: auto;
      max-width: 400px;
      padding: 20px;
      text-align: center;
      font-family: 'Poppins', Arial, sans-serif;
    }

    .jumbotron {
      position: relative;
      height: 100vh;
      background: url('{{asset('images/bike.JPG')}}') center/cover no-repeat;
      color: #fff;
      text-align: center;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    p {
      margin-bottom: 10px;
    }

    .start-button {
      padding: 10px 20px;
      font-size: 1.5em;
      background-color: #7b531b;
      color: #f6fbfc;
      text-decoration: none;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
      display: block;
      margin: auto;
      margin-top: 20px;
    }

    .start-button:hover {
      background-color: #95780f;
    }
  </style>
</head>
<body>

  <div class="jumbotron">
    <div class="card">
      <h1>SHOES STORE</h1>
      <a href="/login" class="start-button">Mulai</a>
    </div>
  </div>

</body>
</html>
