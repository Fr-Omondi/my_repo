<?php include('includes/db.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cars Available in Store</title>

    <!-- Link to Font Awesome for Car Icon and Social Media Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        /* General styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        header {
            background-color: #333;
            color: white;
            padding: 15px;
            text-align: center;
        }

        header h1 {
            font-size: 24px;
            margin: 0;
        }

        header .car-icon {
            margin-right: 10px;
        }

        .carousel-container {
            width: 100%;
            max-width: 800px;
            margin: 50px auto;
            overflow: hidden;
            position: relative;
        }

        .carousel-track {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .carousel-item {
            min-width: 100%;
            transition: transform 0.5s ease-in-out;
        }

        .carousel-item img {
            width: 100%;
            border-radius: 10px;
        }

        /* Buttons for navigation */
        .prev, .next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            border: none;
            color: white;
            padding: 10px;
            cursor: pointer;
            z-index: 100;
        }

        .prev {
            left: 10px;
        }

        .next {
            right: 10px;
        }

        /* Dots indicator */
        .dots {
            text-align: center;
            margin-top: 15px;
        }

        .dot {
            display: inline-block;
            height: 12px;
            width: 12px;
            background-color: #bbb;
            border-radius: 50%;
            margin: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .dot.active {
            background-color: #717171;
        }

        /* Footer styling */
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px 0;
            margin-top: 50px;
        }

        footer .social-media-icons {
            margin-bottom: 10px;
        }

        footer .social-media-icons a {
            color: white;
            font-size: 24px;
            margin: 0 10px;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        footer .social-media-icons a:hover {
            color: #4CAF50;
        }

        footer p {
            margin: 5px 0;
            font-size: 14px;
        }

        /* Animating cars */
        @keyframes drive {
            0% {
                transform: translateX(-100%);
            }
            100% {
                transform: translateX(100%);
            }
        }

        .carousel-item img {
            animation: drive 4s linear infinite;
        }
    </style>
</head>
<body>

    <!-- Header with Car Icon -->
    <header>
        <h1><i class="fas fa-car car-icon"></i> Cars Available in Store</h1>
    </header>

    <!-- Carousel Container -->
    <div class="carousel-container">
        <div class="carousel-track">
            <div class="carousel-item">
                <img src="car10.jpg" alt="Car 1">
            </div>
            <div class="carousel-item">
                <img src="car23.jpg" alt="Car 2">
            </div>
            <div class="carousel-item">
                <img src="car32.jpg" alt="Car 3">
            </div>
            <div class="carousel-item">
                <img src="car35.jpg" alt="Car 4">
            </div>
            <div class="carousel-item">
                <img src="car5.jpg" alt="Car 5">
            </div>
            <div class="carousel-item">
                <img src="car6.jpg" alt="Car 6">
            </div>
            <div class="carousel-item">
                <img src="car7.jpg" alt="Car 7">
            </div>
            <div class="carousel-item">
                <img src="car8.jpg" alt="Car 8">
            </div>
            <div class="carousel-item">
                <img src="car23.jpg" alt="Car 9">
            </div>
        </div>

        <!-- Navigation buttons -->
        <button class="prev">❮</button>
        <button class="next">❯</button>

        <!-- Dots -->
        <div class="dots">
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>
    </div>

    <!-- Footer with Social Media Links -->
    <footer>
        <div class="social-media-icons">
            <a href="https://www.facebook.com" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.twitter.com" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a>
            <a href="https://www.instagram.com" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
            <a href="https://www.linkedin.com" target="_blank" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
        </div>
        <p>&copy; 2024 Car Store. All rights reserved.</p>
    </footer>

    <script>
        const track = document.querySelector('.carousel-track');
        const slides = Array.from(track.children);
        const nextButton = document.querySelector('.next');
        const prevButton = document.querySelector('.prev');
        const dotsNav = document.querySelector('.dots');
        const dots = Array.from(dotsNav.children);

        const slideWidth = slides[0].getBoundingClientRect().width;

        // Arrange slides next to one another
        const setSlidePosition = (slide, index) => {
            slide.style.left = slideWidth * index + 'px';
        };
        slides.forEach(setSlidePosition);

        const moveToSlide = (track, currentSlide, targetSlide) => {
            track.style.transform = 'translateX(-' + targetSlide.style.left + ')';
            currentSlide.classList.remove('current-slide');
            targetSlide.classList.add('current-slide');
        };

        const updateDots = (currentDot, targetDot) => {
            currentDot.classList.remove('active');
            targetDot.classList.add('active');
        };

        const moveToNextSlide = () => {
            const currentSlide = track.querySelector('.current-slide') || slides[0];
            let nextSlide = currentSlide.nextElementSibling;

            if (!nextSlide) {
                nextSlide = slides[0]; // Loop back to first slide
            }

            const currentDot = dotsNav.querySelector('.active') || dots[0];
            let nextDot = currentDot.nextElementSibling;

            if (!nextDot) {
                nextDot = dots[0];
            }

            moveToSlide(track, currentSlide, nextSlide);
            updateDots(currentDot, nextDot);
        };

        // Auto-slide every 4 seconds
        setInterval(moveToNextSlide, 4000);

        // When next button is clicked
        nextButton.addEventListener('click', () => {
            moveToNextSlide();
        });

        // When previous button is clicked
        prevButton.addEventListener('click', () => {
            const currentSlide = track.querySelector('.current-slide') || slides[0];
            let prevSlide = currentSlide.previousElementSibling;

            if (!prevSlide) {
                prevSlide = slides[slides.length - 1]; // Loop back to last slide
            }

            const currentDot = dotsNav.querySelector('.active') || dots[0];
            let prevDot = currentDot.previousElementSibling;

            if (!prevDot) {
                prevDot = dots[dots.length - 1];
            }

            moveToSlide(track, currentSlide, prevSlide);
            updateDots(currentDot, prevDot);
        });

        // When a dot is clicked
        dotsNav.addEventListener('click', e => {
            const targetDot = e.target.closest('span');

            if (!targetDot) return;

            const currentSlide = track.querySelector('.current-slide') || slides[0];
            const currentDot = dotsNav.querySelector('.active') || dots[0];
            const targetIndex = dots.findIndex(dot => dot === targetDot);
            const targetSlide = slides[targetIndex];

            moveToSlide(track, currentSlide, targetSlide);
            updateDots(currentDot, targetDot);
        });
    </script>
</body>
</html>
