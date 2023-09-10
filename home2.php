<?php
session_start();

// Check if the user is logged in and their preferred name is set in the session
if (isset($_SESSION["pn"])) {
    $preferredName = $_SESSION["pn"];
} else {
    // Redirect the user to the login page if not logged in
    header("Location: index.php");
    exit();
}

// Handle user data for newly signed-up users
if (isset($_SESSION["newUser"])) {
    $newUser = $_SESSION["newUser"];
    unset($_SESSION["newUser"]); // Remove the newUser flag

    // Initialize an empty task list for the new user and add a welcome message
    $_SESSION["userTasks"][$newUser] = ["Welcome to Qwerp, $newUser!"];
}

// Handle adding tasks to the user's specific tab
if (isset($_POST["addTask"])) {
    if (!empty($_POST["taskText"])) {
        // Create a user-specific array for tasks if it doesn't exist
        if (!isset($_SESSION["userTasks"][$preferredName])) {
            $_SESSION["userTasks"][$preferredName] = [];
        }
        array_push($_SESSION["userTasks"][$preferredName], $_POST["taskText"]);
    }
}

// Handle user logout
if (isset($_POST["logout"])) {
    // Destroy the session and redirect to the login page
    session_destroy();
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Qwerp</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            text-align: center;
        }

        #container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        #inputBox {
            width: 90%;
            padding: 10px;
            margin-top: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        #addButton {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-top: 5px;
        }

        /* Style for the user info tab */
        .userInfoTab {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 20px;
        }

        /* Style for the task tab */
        .taskTab {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 10px;
        }

        /* Style for the task content */
        .taskContent {
            display: none;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
            background-color: #f9f9f9;
        }

        /* Style to show the task content when the tab is clicked */
        .taskContent.active {
            display: block;
        }
    </style>
</head>
<body>
<br>
<br>
<h1><img src="title2.png" alt="Qwerp"></h1>

<div id="container">
    <form method="post">
        <button type="submit" name="logout">Logout</button>
    </form>
    <!-- Display user info and logout button -->
    <h1>Welcome, <?php echo $preferredName; ?>!</h1>

    <!-- Display task input and "Add!" button -->
    <h2>What happened today?</h2>
    <form method="post">
        <input type="text" id="inputBox" name="taskText" placeholder="Enter your thing">
        <button id="addButton" type="submit" name="addTask">Add!</button>
    </form>

    <!-- Display user-specific task tab -->
    <?php if (isset($_SESSION["userTasks"][$preferredName]) && is_array($_SESSION["userTasks"][$preferredName])) : ?>
        <div class="taskTab" onclick="toggleTaskContent('<?php echo $preferredName; ?>')">Your List</div>
        <div class="taskContent" id="<?php echo $preferredName; ?>TaskContent">
            <ul>
                <?php foreach ($_SESSION["userTasks"][$preferredName] as $index => $task) : ?>
                    <li><?php echo $task; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <!-- Display tabs for other users' lists -->
    <?php foreach ($_SESSION["userTasks"] as $user => $tasks) : ?>
        <?php if ($user !== $preferredName) : ?>
            <div class="userInfoTab" onclick="toggleTaskContent('<?php echo $user; ?>')"><?php echo $user; ?>'s List</div>
            <div class="taskContent" id="<?php echo $user; ?>TaskContent">
                <ul>
                    <?php foreach ($tasks as $index => $task) : ?>
                        <li><?php echo $task; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</div>

<script>
    // Function to toggle the task content
    function toggleTaskContent(user) {
        var taskContent = document.getElementById(user + 'TaskContent');
        if (taskContent.style.display === 'block') {
            taskContent.style.display = 'none';
        } else {
            taskContent.style.display = 'block';
        }
    }
</script>
</body>
</html>
