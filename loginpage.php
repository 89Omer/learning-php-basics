<?php include 'header.php' ?>

<body>
    <div class="menu">
        <?php include 'menu.php'?>
    </div>
    <div class="form-container">
        <h2>Login Form</h2>
        <form action="login.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password">

            <input type="submit" value="Login"> 
        </form>
    </div>
    <div class="footer">
        <?php include 'footer.php';?>
    </div>
   
</body>
</html>
