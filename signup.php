<?php
include 'db.php';

$errors = ['username' => '', 'email' => '', 'password' => ''];
$username = $email = $password = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $valid = true;

    if (empty($username)) {
        $errors['username'] = "Username is required.";
        $valid = false;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "A valid email is required.";
        $valid = false;
    }

    if (strlen($password) < 8) {
        $errors['password'] = "Password must be at least 8 characters long.";
        $valid = false;
    }

    if ($valid) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username, email, password) 
                VALUES ('$username', '$email', '$hashed_password')";

        if ($connect->query($sql) === TRUE) {
            header("Location: login.php");
            exit;
        } else {
            $errors['username'] = "Something went wrong. Try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Xperts - Sign Up</title>
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
    .checkbox-group {
      display: flex;
      align-items: center;
      margin-top: 1rem;
    }
    .checkbox-group input {
      margin-right: 0.75rem;
    }
    .checkbox-group label {
      font-size: 0.9rem;
      color: #555;
    }
  </style>
</head>
<body>
  <div class="auth-container">
    <img src="logo.png" alt="Xperts Logo" class="auth-logo">
    <h1>Create Your Account</h1>
    <p>Join the Xperts community today!</p>
    <form method="POST" novalidate>
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" class="form-control" value="<?= $username ?>">
        <?php if (!empty($errors['username'])): ?>
          <div class="error-message"><?= $errors['username'] ?></div>
        <?php endif; ?>
      </div>
      <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" class="form-control" value="<?= $email ?>">
        <?php if (!empty($errors['email'])): ?>
          <div class="error-message"><?= $errors['email'] ?></div>
        <?php endif; ?>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" class="form-control">
        <?php if (!empty($errors['password'])): ?>
          <div class="error-message"><?= $errors['password'] ?></div>
        <?php endif; ?>
      </div>

      <div class="checkbox-group">
        <input type="checkbox" id="terms" name="terms">
        <label for="terms">I agree to the <a href="#">Terms & Conditions</a></label>
      </div>

      <button type="submit" class="btn-submit">Sign Up</button>
    </form>
    <div class="bottom-link">
      Already have an account? <a href="login.php">Log In</a>
    </div>
  </div>
</body>
</html>
