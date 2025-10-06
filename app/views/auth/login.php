<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600&family=Roboto+Mono&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    body {
      font-family: 'Roboto Mono', monospace;
      background: radial-gradient(circle at top left, #0d0d0d, #050505);
      color: #e0e0e0;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      overflow-x: hidden;
    }
    body::before {
      content: "";
      position: fixed;
      inset: 0;
      background: repeating-linear-gradient(
          0deg,
          rgba(0,255,255,0.05) 0px,
          rgba(0,255,255,0.05) 1px,
          transparent 1px,
          transparent 40px
        ),
        repeating-linear-gradient(
          90deg,
          rgba(0,255,255,0.05) 0px,
          rgba(0,255,255,0.05) 1px,
          transparent 1px,
          transparent 40px
        );
      pointer-events: none;
      z-index: 0;
    }
    .card {
      background: rgba(0, 20, 40, 0.9);
      border: 2px solid #00fff7;
      border-radius: 16px;
      width: 400px;
      padding: 40px;
      box-shadow: 0 0 25px #00e0ff inset, 0 0 25px #00e0ff;
      position: relative;
      z-index: 1;
    }
    .title {
      font-family: 'Orbitron', sans-serif;
      font-size: 26px;
      letter-spacing: 2px;
      text-align: center;
      margin-bottom: 24px;
      color: #00fff7;
      text-shadow: 0 0 15px #00e0ff, 0 0 30px #0088ff;
    }
    .input {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: 2px solid #00fff7;
      border-radius: 8px;
      font-size: 16px;
      background: rgba(0,255,247,0.1);
      color: #e0e0e0;
      text-align: center;
      transition: 0.3s;
    }
    .input:focus {
      outline: none;
      border-color: #00e0ff;
      box-shadow: 0 0 10px #00fff7;
    }
    .btn {
      width: 100%;
      padding: 14px;
      margin-top: 16px;
      border-radius: 8px;
      font-weight: bold;
      text-transform: uppercase;
      background: linear-gradient(135deg, #00fff7, #0088ff);
      color: #000;
      transition: 0.3s;
      box-shadow: 0 0 12px #00fff7, 0 0 25px #0088ff;
    }
    .btn:hover {
      background: linear-gradient(135deg, #00e0ff, #00fff7);
      box-shadow: 0 0 20px #00fff7, 0 0 40px #00e0ff;
      transform: scale(1.05);
    }
    .text-link {
      margin-top: 20px;
      font-size: 14px;
      text-align: center;
      color: #aaa;
    }
    .text-link a {
      color: #00fff7;
      font-weight: bold;
      transition: 0.3s;
    }
    .text-link a:hover {
      color: #00e0ff;
      text-shadow: 0 0 10px #00fff7;
    }
  </style>
</head>
<body>

  <div class="card">
    <h1 class="title"><i class="fa-solid fa-right-to-bracket"></i> Login</h1>
    
    <form method="post">
      <input type="text" name="username" placeholder="Enter Username" required class="input">
      
      <input type="password" name="password" placeholder="Enter Password" required class="input">
      
      <button type="submit" class="btn">Login</button>
    </form>

    <p class="text-link">
      Don't have an account? 
      <a href="<?= site_url('/') ?>">Register</a>
    </p>
  </div>

</body>
</html>
