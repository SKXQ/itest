<?php
session_start();

if (isset($_POST["signup"])) {
    if (!empty($_POST["pn"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["password"])) {

        $_SESSION["pn"] = $_POST["pn"];
        $_SESSION["email"] = $_POST["email"];
        $_SESSION["password"] = $_POST["password"];

        // Redirect to home.php
        header("Location: home2.php");
        exit(); // Make sure to exit the script after the redirect
    }
}
?>

<!DOCTYPE html>
<html lang="en">
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
            flex-direction: column; /* Set the direction to column */
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            display: flex;
            flex-direction: column; /* Set the direction to column */
            overflow: hidden;
            width: 80%; /* Adjust the width as needed */
            max-width: 400px; /* Add a maximum width for better readability */
        }


	h2 {

	text-align: center;

	}



	h3 {
	text-align: center;
	font-weight: bold;
	}


	p {
	 text-align: center;
	 font-weight: bold;
	 color: #1877f2;

	}


        .left-side {
            background-color: #fff;
            padding: 10px;
            color: #fff;
            text-align: center; /* Center the content */
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
            text-align: center; /* Center the content */
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
            width: 74%; /* Adjust the width to fill the container */
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 7px;
        }

        .form-group .buttons {
            display: flex;
            flex-direction: column; /* Set the direction to column */
            align-items: center; /* Center the buttons vertically */
        }

        .form-group button {
            width: 80%; /* Adjust the width to fill the container */
            padding: 10px;
            background-color: #1877f2;
            color: #fff;
            border: none;
            border-radius: 7px;
            cursor: pointer;
            font-weight: bold;
            margin-bottom: 50px; /* Add some spacing between buttons */
        }

        .form-group button:hover {
            background-color: #1659c8;
        }

	#signup-link:hover {

	cursor: pointer;
	text-decoration: underline;

	}


    </style>
</head>
<body>
<br>
    <div class="container">
       <div class="left-side">
    <h1><img src="title2.png" alt="Qwerp"></h1>
</div>
    <h2>Sign Up</h2>
    <h3>It's quick and easy.</h3>
        <div class="right-side">
            <form action="info.php" method="post">
		<center>
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
			<button type="submit" name="signup">Sign Up</button><br>
			<p id="signup-link">Have an account? Log in.</p>
		</center>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
<script>
    // JavaScript to toggle the popup signup form
    const signupLink = document.getElementById("signup-link");
    const popupOverlay = document.getElementById("popup-overlay");

    signupLink.addEventListener("click", () => {
        // Redirect to index.php if user has account
        window.location.href = "index.php";
    });

    function closePopup() {
        popupOverlay.style.display = "none"; // Hide the overlay
    }
</script>
</html>