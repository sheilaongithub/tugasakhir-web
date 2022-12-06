<?php 
require_once 'functions.php'; 
session_start(); 
 
if (isset($_SESSION['login'])) { 
    header('Location: ../user/index.php'); 
    exit; 
} 
 
if (isset($_POST['submit'])) { 
    if (is_null(login($_POST))) { 
        echo "<script> 
            alert('Username not registered!'); 
        </script>"; 
    } else if (!login($_POST)) { 
        echo "<script> 
            alert('Wrong username/ password!'); 
        </script>"; 
    } else { 
        $_SESSION['login'] = true; 
        $userData = getUserData($_POST['username']); 
        $_SESSION['level'] = $userData['level']; 
        $_SESSION['name'] = $userData['username']; 
        // $_SESSION['photo'] = $userData['image']; 
        $_SESSION['login'] = true; 
        header('Location: ../user/index.php'); 
         if ($userData['level'] == 'admin') { 
             header('Location: ../admin/adminkopkit/template/index.php'); 
         } 
 
        exit; 
    } 
} 
?>


</html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="assets/css/stylesheet.css">
<body>
	<section class="login">
		<div class="login_box">
			<div class="left">
				<div class="top_link"><a href="daftar.php">daftar</a></div>
				<div class="top_link"><a href="index.php">back</a></div>
				<div class="contact">
					<form action="" method="post">
						<h3>LOGIN</h3>
						<input type="text" placeholder="email" name="username">
						<input type="password" placeholder="password" name="password">
						<button class="submit" name="submit">Kirim</button>
					</form>
				</div>
			</div>
			<div class="right">
			</div>
		</div>
	</section>
</body>
</html>