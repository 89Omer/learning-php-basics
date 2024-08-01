
<?php include 'header.php';?>

<?php
    // Fetch all courses

    $courses = getCourses();
?>

    <div class="banner">
        <div class="search-bar">
            <input type="text" placeholder="Search for courses...">
        </div>
    </div>
    <div class="content">
        <section id="courses">
            <h2>Courses</h2>
            <div class="slider-container">
                <button class="slider-button left" onclick="moveSlider(-1)">&#10094;</button>
                <div class="slider" id="courseSlider">
                <!-- Add more courses as needed -->
                
                <?php foreach ($courses as $course): ?>
                    <div class="card">
                        <h3><?php echo $course;?></h3>
                        <p>Description of course 1.</p>
                    </div>
                <?php endforeach;?>
                </div>
                <button class="slider-button right" onclick="moveSlider(1)">&#10095;</button>
            </div>
        </section>
        <section id="staff">
            <h2>Staff</h2>
            <div class="grid-container staff">
                <div class="card">
                    <h3>Staff Member 1</h3>
                    <p>Position</p>
                </div>
                <div class="card">
                    <h3>Staff Member 2</h3>
                    <p>Position</p>
                </div>
                <div class="card">
                    <h3>Staff Member 3</h3>
                    <p>Position</p>
                </div>
                <!-- Add more staff members as needed -->
            </div>
        </section>
    </div>
   <?php include 'footer.php'; ?>
    
</body>
</html>
