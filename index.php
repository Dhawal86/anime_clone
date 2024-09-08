<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
      integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100;200;300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="login2.css">
    <title>Document</title>
</head>
<body class="login2body">
<?php
$servername = "localhost"; // Replace with your database server name
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "signup"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $re_password = $_POST['confirmPassword'];

    // Check if passwords match
    if ($password !== $re_password) {
        $message = "Passwords do not match.";
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO users (user_name, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $hashed_password);

        // Execute the statement
        if ($stmt->execute()) {
            $message = "New record created successfully";
        } else {
            $message = "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}

$conn->close();
?>
    <header class="headTop">
        <ul class="headerUl">
            <li><a href="site.html" class="navo" id="home"><img src="logo.png" alt="home" class="image"></a></li>
            <li><a href="About.html" class="navo" id="about">About</a></li>
            <li><a href="contact.html" class="navo" id="Contact">Contact Us</a></li>
            <li><a href="#" class="navo" id="Genres"> Genres</a>
                <ul id="sublist">
                    <li><a href="Action.html">Action</a></li>
                    <li><a href="Adventure.html">Adventure</a></li>
                    <li><a href="Romance.html">Romance</a></li>
                    <li><a href="Isekai.html">Isekai</a></li>
                    <li><a href="Slice.html">Slice of life</a></li>
                    <li><a href="Ecchi.html">Ecchi</a></li>
                    <li><a href="Horror.html">Horror</a></li>
                    <li><a href="Sports.html">Sports</a></li>
                    <li><a href="Music.html">Music</a></li>
                </ul>
            </li>
        </ul>
        <div class="navo" id="login"><a href=login.html><button id="button1"><b>Login</b></button></a></div>
    </header>
    <div class="container">
        <form id="registrationForm" action="index.php" method="post">
            <h2 class="heading">Registration Form</h2>
            <?php if ($message) { echo '<p>' . $message . '</p>'; } ?>
            <label for="username" class="lables">Username:</label>
            <input type="text" id="username" name="username" class="intake" required>
            
            <label for="email" class="lables">Email:</label>
            <input type="email" id="email" name="email" class="intake" required>
            
            <label for="password" class="lables">Password:</label>
            <input type="password" id="password" name="password" class="intake" required>
            
            <label for="confirmPassword" class="lables">Re-enter Password:</label>
            <input type="password" id="confirmPassword" name="confirmPassword" class="intake" required>
            
            <button type="submit" id="submitbutt">Sign Up</button>
        </form>
    </div>
</body>
</html>
