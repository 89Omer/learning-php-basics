
<?php include 'header.php';?>

<?php
    // Fetch all courses
    $courses = getCourses();
    // Fetch all tutors
    $tutors = getTutors();
    // Fetch courses based on search term if available
    $searchTerm = isset($_GET['term']) ? $_GET['term'] : null;
    $courses = getCourses($searchTerm);

?>

    <div class="banner">
        <div class="search-bar">
            <form action="" method="get">
                <input type="text" name="term" placeholder="Search for courses..." value="<?php echo isset($searchTerm) ? htmlspecialchars($searchTerm) : ''; ?>">
                <button type="submit"><i class="fas fa-search"></i></button> <!-- Search icon -->
            </form>
        </div>
    </div>
    <div class="content">
        <section id="courses">
            <h2>Courses</h2>
            <div class="slider-container">
                <button class="slider-button left" onclick="moveSlider(-1)">&#10094;</button>
                <div class="slider" id="courseSlider">
                <!-- Add more courses as needed -->
                
                <?php if (!empty($courses)): ?>
                        <?php foreach ($courses as $course): ?>
                            <div class="card">
                                <h3><?php echo htmlspecialchars($course); ?></h3>
                                <p>Description of course.</p>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No courses found.</p>
                    <?php endif; ?>
                </div>
                <button class="slider-button right" onclick="moveSlider(1)">&#10095;</button>
            </div>
        </section>
        <section id="staff">
            <h2>Tutors</h2>
            <div class="grid-container staff">
            <!-- Add more staff members as needed -->
            <?php foreach ($tutors as $tutor): ?>
                <div class="card">
                    <h3><?php echo htmlspecialchars($tutor['name']);?></h3>
                    <p><?php echo htmlspecialchars($tutor['designation']);?></p>
                </div>
                <?php endforeach;?>
            </div>
        </section>
    </div>
   <?php include 'footer.php'; ?>
    
</body>
</html>
