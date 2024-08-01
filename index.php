
   <?php include 'header-nav.php';?>
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
                    <div class="card">
                        <h3>Course 1</h3>
                        <p>Description of course 1.</p>
                    </div>
                    <div class="card">
                        <h3>Course 2</h3>
                        <p>Description of course 2.</p>
                    </div>
                    <div class="card">
                        <h3>Course 3</h3>
                        <p>Description of course 3.</p>
                    </div>
                    <div class="card">
                        <h3>Course 4</h3>
                        <p>Description of course 4.</p>
                    </div>
                    <div class="card">
                        <h3>Course 5</h3>
                        <p>Description of course 5.</p>
                    </div>
                    <div class="card">
                        <h3>Course 6</h3>
                        <p>Description of course 6.</p>
                    </div>
                    <!-- Add more courses as needed -->
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
    <script>
        function moveSlider(direction) {
            const slider = document.getElementById('courseSlider');
            const scrollAmount = direction * 220; // Adjust based on card width + margin
            slider.scrollBy({
                left: scrollAmount,
                behavior: 'smooth'
            });
        }
    </script>
</body>
</html>
