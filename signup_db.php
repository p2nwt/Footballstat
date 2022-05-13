<?php 

    session_start();
    require_once 'config/db.php';

    if (isset($_POST['signup'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $c_password = $_POST['c_password'];
        $urole = 'user';

        if (empty($firstname)) {
            $_SESSION['error'] = 'Please enter your name';
            header("location: pages-register.php");
        } else if (empty($lastname)) {
            $_SESSION['error'] = 'Please enter your last name';
            header("location: pages-register.php");
        } else if (empty($email)) {
            $_SESSION['error'] = 'Please enter email';
            header("location: pages-register.php");
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = 'Invalid email format';
            header("location: pages-register.php");
        } else if (empty($password)) {
            $_SESSION['error'] = 'Please enter your password';
            header("location: pages-register.php");
        } else if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
            $_SESSION['error'] = 'Password must be between 5 and 20 characters long.';
            header("location: pages-register.php");
        } else if (empty($c_password)) {
            $_SESSION['error'] = 'Please confirm your password.';
            header("location: pages-register.php");
        } else if ($password != $c_password) {
            $_SESSION['error'] = 'Passwords do not match';
            header("location: pages-register.php");
        } else {
            try {

                $check_email = $conn->prepare("SELECT email FROM users WHERE email = :email");
                $check_email->bindParam(":email", $email);
                $check_email->execute();
                $row = $check_email->fetch(PDO::FETCH_ASSOC);

                if ($row['email'] == $email) {
                    $_SESSION['warning'] = "This email is already in the system. <a href='pages-login.php'>click here</a> to login";
                    header("location: pages-register.php");
                } else if (!isset($_SESSION['error'])) {
                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                    $stmt = $conn->prepare("INSERT INTO users(firstname, lastname, email, password, urole) 
                                            VALUES(:firstname, :lastname, :email, :password, :urole)");
                    $stmt->bindParam(":firstname", $firstname);
                    $stmt->bindParam(":lastname", $lastname);
                    $stmt->bindParam(":email", $email);
                    $stmt->bindParam(":password", $passwordHash);
                    $stmt->bindParam(":urole", $urole);
                    $stmt->execute();
                    $_SESSION['success'] = "Already registered! <a href='pages-login.php' class='alert-link'>click here</a> to login";
                    header("location: pages-register.php");
                } else {
                    $_SESSION['error'] = "something went wrong";
                    header("location: pages-register.php");
                }

            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }


?>