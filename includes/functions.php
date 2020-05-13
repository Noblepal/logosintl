<?php

session_start();

//$con = mysqli_connect('localhost', 'favoure1_favoure1', '6Ktx$hw41L*k', 'favoure1_logosintl');
$con = mysqli_connect('localhost', 'root', '', 'logosintl');

if (isset($_POST['loginUser'])) {
    loginUser($_POST);
} else if (isset($_POST['registerUser'])) {
    registerUser($_POST);
}

function loginUser($post)
{
    global $con;
    extract($post);

    //Check if user already exists
    $stmt = $con->prepare("SELECT username, phone, email, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($mName, $mPhone, $mEmail, $mPassword);
    $stmt->fetch();

    if ($stmt->num_rows > 0) {
        if (password_verify($password, $mPassword)) {
            $_SESSION['name'] = $mName;
            $_SESSION['phone'] = $mPhone;
            $_SESSION['email'] = $mEmail;
            $_SESSION['logged_in'] = false;
            __redirect("index.php", "login", 1, "Login successful");
        } else {
            __redirect("index.php", "login", 0, "Incorrect password");
        }
    } else {
        __redirect("index.php", "login", 0, "Account not found");
    }
}

function registerUser($post)
{
    global $con;
    extract($post);

    //Check if email already exists
    $stmt = $con->prepare("SELECT email FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        __redirect("index.php", "register", 0, "Email is already taken");
    } else {
        closeSTMT($stmt);
        $password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $con->prepare("INSERT INTO users (username, email, phone, gender, status, password) VALUES (?,?,?,?,'pending',?)");
        $stmt->bind_param("sssss", $name, $email, $phone, $gender, $password);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->affected_rows > 0) {
            //loginUser($post);
            $_SESSION['name'] = $name;
            $_SESSION['phone'] = $phone;
            $_SESSION['email'] = $email;
            $_SESSION['logged_in'] = true;
            __redirect("index.php", "register", 1, "Registration successful. Logging you in...");
        } else {
            __redirect("index.php", "register", 0, "Failed to register, reason: " . $stmt->error);
        }
    }
    closeSTMT($stmt);
}

function getTopCourses()
{
    global $con;
    $popular = "yes";
    $stmt = $con->prepare("SELECT * FROM courses WHERE popular = ? LIMIT 8");
    $stmt->bind_param("s", $popular);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}

function closeSTMT($stmt)
{
    $stmt->free_result();
    $stmt->close();
}

/**
 * __redirect to other page
 * 
 * @param $href = page to redirect to
 * @param $identifier = key
 * @param $code = 0 - error, 1 = success
 * @param $message = message to display to user
 * 
 * @return null
 */
function __redirect($href, $identifier, $code, $message)
{
    header('location: ' . $href . '?' . $identifier . '=' . $code . '&message=' . $message);
}
