<?php
include 'db.php'; 

$errors = ['username' => '', 'password' => ''];
$username = $password = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $valid = true;

    if (empty($username)) {
        $errors['username'] = "Username is required.";
        $valid = false;
    }

    if (empty($password)) {
        $errors['password'] = "Password is required.";
        $valid = false;
    }

    if ($valid) {
        $stmt = $connect->prepare("SELECT password FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                header("Location: dashboard.html");
                exit;
            } else {
                $errors['password'] = "Invalid username or password.";
            }
        } else {
            $errors['password'] = "Invalid username or password.";
        }
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Xperts - Login</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary-color: #ff9800;
      --light-primary: #fff5e6;
      --secondary-color: #333;
      --background-color: #f7f8fc;
      --text-color: #555;
      --border-color: #ddd;
    }
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body {
      font-family: 'Poppins', sans-serif;
      background-color: var(--background-color);
      color: var(--text-color);
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }
    .auth-container {
      background: #fff;
      padding: 2.5rem;
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
      width: 100%;
      max-width: 420px;
      text-align: center;
    }
    .auth-logo {
      width: 100px;
      margin-bottom: 1rem;
    }
    .auth-container h1 {
      color: var(--secondary-color);
      font-weight: 600;
      font-size: 1.8rem;
      margin-bottom: 0.5rem;
    }
    .auth-container p {
      margin-bottom: 2rem;
      color: #777;
    }
    .form-group {
      margin-bottom: 1.25rem;
      text-align: left;
    }
    .form-group label {
      display: block;
      font-size: 0.9rem;
      margin-bottom: 0.5rem;
      font-weight: 600;
    }
    .form-control {
      width: 100%;
      padding: 0.9rem 1rem;
      border: 1px solid var(--border-color);
      border-radius: 8px;
      font-size: 1rem;
      transition: border-color 0.3s, box-shadow 0.3s;
    }
    .form-control:focus {
      outline: none;
      border-color: var(--primary-color);
      box-shadow: 0 0 0 3px var(--light-primary);
    }
    .btn-submit {
      width: 100%;
      padding: 0.9rem;
      background: var(--primary-color);
      color: #fff;
      border: none;
      border-radius: 8px;
      font-size: 1.1rem;
      font-weight: 600;
      cursor: pointer;
      transition: background 0.3s;
      margin-top: 1rem;
    }
    .btn-submit:hover {
      background: #e68a00;
    }
    .error-message {
      color: #e74c3c;
      font-size: 0.85rem;
      margin-top: 0.25rem;
      text-align: left;
    }
    .bottom-link {
      margin-top: 1.5rem;
      font-size: 0.9rem;
    }
    .bottom-link a {
      color: var(--primary-color);
      text-decoration: none;
      font-weight: 600;
    }
  </style>
</head>
<body>
  <div class="auth-container">
    <img src="logo.png" alt="Xperts Logo" class="auth-logo">
    <h1>Welcome Back!</h1>
    <p>Log in to access your Xperts dashboard.</p>
    <form method="POST" novalidate>
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" class="form-control" value="<?= htmlspecialchars($username) ?>">
        <?php if (!empty($errors['username'])): ?>
          <div class="error-message"><?= $errors['username'] ?></div>
        <?php endif; ?>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" class="form-control">
        <?php if (!empty($errors['password'])): ?>
          <div class="error-message"><?= $errors['password'] ?></div>
        <?php endif; ?>
      </div>
      <button type="submit" class="btn-submit">Log In</button>
    </form>
    <div class="bottom-link">
      <a href="forget-password.html">Forgot password?</a> | Don't have an account? <a href="signup.php">Sign Up</a>
    </div>
  </div>
</body>
</html>