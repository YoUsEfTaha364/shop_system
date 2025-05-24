
<?php
session_start();
$errors = [];
$data = [];

if (isset($_SESSION["errors"])) {
    $errors = $_SESSION["errors"];
    $data = $_SESSION["data"];
    unset($_SESSION["errors"], $_SESSION["data"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        
    </style>
</head>
<body>
    
    <form action="check_reg.php" method="POST">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo isset($data['name']) ? htmlspecialchars($data['name']) : ''; ?>" required>
             <span style="color: red;"><?php echo isset($errors["name"]) ? $errors["name"] : ''; ?></span>
        </div>
        
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email"value="<?php echo isset($data['name']) ? htmlspecialchars($data['email']) : ''; ?>" required>
             <span style="color: red;"><?php echo isset($errors["email"]) ? $errors["email"] : ''; ?></span>
        </div>
        
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value="<?php echo isset($data['name']) ? htmlspecialchars($data['password']) : ''; ?>" required>
            <span style="color: red;"><?php echo isset($errors["password"]) ? $errors["password"] : ''; ?></span>
        </div>
        
        <button type="submit">Submit</button>
    </form>
</body>
</html>