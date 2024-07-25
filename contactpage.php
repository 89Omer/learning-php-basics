
<?php include 'header.php'?>
<body>
    <div class="menu contactus_menu">
        <?php include 'menu.php'?>
    </div>
    <div class="form-container">
        <h2>Contact Us</h2>
        <form action="contact.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" required></textarea>

            <input type="submit" value="Submit">
        </form>
       
    </div>
    <div class="footer">
        <?php include 'footer.php';?>
    </div>
   
    
</body>
</html>
