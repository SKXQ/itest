<?php
session_start();

// Define a placeholder username variable (you can replace this with your own logic)
$placeholderUsername = "JohnDoe";

if (isset($_POST["login"])) {
    if (!empty($_POST["email"]) && !empty($_POST["pn"]) && !empty($_POST["password"])) {
        // Assuming you have stored the user's preferred name in the session during registration.
        if (isset($_SESSION["pn"])) {
            $username = $_SESSION["pn"];
            if ($username === $placeholderUsername) {
                // Redirect to home2.php with the username in the URL query string
                header("Location: home2.php?username=$username");
                exit(); // Stop execution after redirection
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qwerp</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Container for the background overlay */
        .overlay {
	    text-align: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            display: none; /* Use flexbox */
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
            z-index: 2; /* Ensure the overlay appears above other content */
        }

        .container {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            width: 80%;
            max-width: 400px;
        }

	.pcontainer {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            display: flex;
            flex-direction: column;
            width: 50%;
            max-width: 500px;
        }

        h3 {
            color: #000;
            font-family: Arial, sans-serif;
            font-weight: bold;
        }

	p {

	 font-weight: bold;
	 color: #1877f2;

	}


        .left-side {
            background-color: #fff;
            padding: 10px;
            color: #fff;
            text-align: center;
        }

        .left-side h1 {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .right-side {
            padding: 20px;
        }

        .right-side h3 {
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
            display: block;
        }

        .form-group input {
	    background-color: #F5F8FA;
            width: 74%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 7px;
        }

        .form-group .buttons {
            width: 80%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #1877f2;
            color: #fff;
            border: none;
            border-radius: 7px;
            cursor: pointer;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .form-group button:hover {
            background-color:  #1659c8; 
        }

        /* Close button (X) */
        .close-button {
            position: absolute;
            top: 169px;
            right: 540px;
            font-size: 20px;
            cursor: pointer;
        }

	 .dropdown-form {
            display: none;
            opacity: 0;
            transition: all 0.3s ease;
        }

        .dropdown-form.active {
            display: block;
            opacity: 1;
        }

	#signup-link:hover {

	cursor: pointer;
	text-decoration: underline;

	}
    </style>
</head>
<body>
    <div class="container">
        <div class="left-side">
            <h1><img src="title2.png" alt="Qwerp"></h1>
        </div>
        <center><h3>Log into your account.</h3></center>
        <div class="right-side">
	<center>
            <form action="index.php" method="post">
		<div class="form-group">
                    <input type="text" id="pn" name="pn" placeholder="Preferred Name" required>
                </div>
                <div class="form-group">
                    <input type="text" id="email" name="email" placeholder="Email or phone number" required>
                </div>
                <div class="form-group">
                    <input type="password" id="password" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <div class="buttons">
                        <button type="submit" name="login">Log In</button>
			<p id="signup-link">Create new account</p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</center>
    <script>
    // JavaScript to toggle the popup signup form
    const signupLink = document.getElementById("signup-link");
    const popupOverlay = document.getElementById("popup-overlay");

    signupLink.addEventListener("click", () => {
        // Redirect to info.php
        window.location.href = "info.php";
    });

    function closePopup() {
        popupOverlay.style.display = "none"; // Hide the overlay
    }
</script>

</body>
</html>