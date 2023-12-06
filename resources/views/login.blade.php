<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Poppins', sans-serif;
      background-color: #f5f5f5;
    }

    .card {
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      margin: auto;
      max-width: 1000px;
    }

    .jumbotron {
      position: relative;
      height: 100vh;
      background: url('{{asset('images/sepatu.JPG')}}') center/cover no-repeat;
      color: #fff;
      text-align: center;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    h1 {
      margin: 0;
      color: black;
      margin-bottom: 15px;
      font-family: 'Poppins', sans-serif;
    }

    .start-button {
      padding: 12px 24px;
      font-size: 1.5em;
      background-color: rgb(123, 83, 27);
      color: #fff;
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

    .login-form {
      text-align: center;
    }

    .form-group {
      margin-bottom: 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .form-group label {
      margin-bottom: 10px;
      color: #333;
      font-weight: bold;
      text-align: left;
      width: 100%;
    }

    .form-group input {
      width: 100%; /* Ubah nilai width sesuai dengan keinginan Anda */
      padding: 10px;
      border: 1px solid #95780f;
      border-radius: 5px;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>
<body>

  <div class="jumbotron">
    <div class="card">
      <h1>LOGIN</h1>

      <!-- Login Form -->
      <form class="login-form" action="/login" method="post">
        @csrf
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" required>
        </div>

        <button type="submit" class="start-button">Login</button>
      </form>

    </div>
  </div>

</body>
</html>
