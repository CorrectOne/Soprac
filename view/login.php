<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f8f8f8;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .login-container {
      background: #fff;
      padding: 52px;
      border-radius: 15px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.2);
      width: 350px;
      border: 2px solid #b8860b;
    }

    .login-header {
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 20px;
      position: relative;
    }

    .login-header h2 {
      flex: 1;
      text-align: center;
      font-size: 28px;
      color: #800000;
      font-weight: bold;
      margin: 0;
    }

    .login-header img {
      width: 50px;
      height: 50px;
      position: absolute;
      left: 0;
    }

    .login-container label {
      display: block;
      margin-bottom: 7px;
      font-weight: bold;
      color: #333;
    }

    .login-container input {
      width: 100%;
      padding: 12px 15px;
      margin-bottom: 16px;
      border: 1px solid #ccc;
      border-radius: 25px;
      outline: none;
      box-sizing: border-box;
    }

    .password-wrapper {
      position: relative;
      display: flex;
      align-items: center;
      margin-bottom: 17px;
    }

    .password-wrapper input {
      width: 100%;
      padding-right: 40px;
      border: 1px solid #ccc;
      border-radius: 25px;
      outline: none;
    }

    .password-wrapper i {
      position: absolute;
      right: 15px;
      cursor: pointer;
      color: #555;
    }

    .login-container button {
      width: 100%;
      padding: 10px;
      background-color: #800000;
      color: white;
      font-weight: bold;
      border: none;
      border-radius: 25px;
      cursor: pointer;
      transition: background 0.3s;
    }

    .login-container button:hover {
      background-color: #a52a2a;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <div class="login-header">
      <img src="logo.png" alt="Logo SOPRAC">
      <h2>LOGIN</h2>
    </div>

    <form action="../controller/loginAdm.php" method="POST">
      <label for="usuario">Usuário:</label>
      <input type="text" id="usuario" name="usuario" placeholder="Digite seu usuário" required>

      <label for="senha">Senha:</label>
      <div class="password-wrapper">
        <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
        <i class="fa-solid fa-eye-slash" onclick="togglePassword()"></i>
      </div>

      <button type="submit">Entrar</button>
    </form>
  </div>

  <script>
    function togglePassword() {
      const input = document.getElementById("senha");
      const icon = event.target;
      if (input.type === "password") {
        input.type = "text";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
      } else {
        input.type = "password";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
      }
    }
  </script>
</body>
</html>
