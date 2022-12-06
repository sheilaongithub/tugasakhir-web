<?php 
require_once 'functions.php'; 
session_start(); 
if (isset($_SESSION['login'])) { 
    header('Location: index.php'); 
    exit; 
} 
 
$alert = ''; 
 
// kalo button submit diklik 
if (isset($_POST['submit'])) { 
    if ($_POST['password'] != $_POST['confirm']) { 
        $alert = "Password confirm doesn't match!"; 
    } else { 
        $result = register($_POST); 
        if ($result) { 
            echo "<script> 
                alert('Registration Success!'); 
                document.location.href = 'login.php'; 
            </script>"; 
        } else { 
            echo "<script> 
                alert('Registration Failed!'); 
                document.location.href = login.php; 
            </script>"; 
        } 
    } 
} ?>
</html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="assets/css/stylesheet.css">
<body>
	<section class="login">
		<div class="login_box">
			<div class="left">
				<div class="top_link"><a href="login.php">login</a></div>
				<div class="contact">
					<form action="" method="post">
						<h3>DAFTAR</h3>
						<input type="text" placeholder="email" name="username">
						<input type="password" placeholder="password" name="password">
						<input type="password" placeholder="password" name="confirm">
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