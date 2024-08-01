        function moveSlider(direction) {
            const slider = document.getElementById('courseSlider');
            const scrollAmount = direction * 220; // Adjust based on card width + margin
            slider.scrollBy({
                left: scrollAmount,
                behavior: 'smooth'
            });
        }
