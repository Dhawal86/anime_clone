<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
        href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap"
        rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="login2.css">
    <title>Login</title>
</head>

<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "signup";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();

$error_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT user_id, password FROM users WHERE user_name = ?");
    $stmt->bind_param("s", $username);

    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $id;
            echo "Login successful!";
            // Uncomment the line below to redirect after successful login
            // header("Location: dashboard.php");
            // exit;
        } else {
            $error_message = "Incorrect password.";
        }
    } else {
        $error_message = "Username not found.";
    }

    $stmt->close();
}

$conn->close();
?>

<header class="headTop">
    <ul class="headerUl">
        <li><a href="site.html" class="navo" id="home" target="_blank"><img src="logo.png" alt="home" class="image"></a></li>
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
    <div class="navo" id="login"><a href="login.php"><button id="button1"><b>Login</b></button></a></div>
</header>

<br>
<div class="background">
    <div class="signinDiv">
        <form action="login.php" method="post" class="signin">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($username ?? '', ENT_QUOTES); ?>" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <p class="signin" id="check"><input type="checkbox" name="check" id="check">stay signed in</p>
            <input type="submit" value="Sign In" id="sub">
            <br>
            <button class="signup"><a href="signup.php">Sign Up</a></button>
        </form>
        <?php if ($error_message): ?>
            <div class="error-message"><?php echo $error_message; ?></div>
        <?php endif; ?>
    </div>
</div>

</body>

</html>
