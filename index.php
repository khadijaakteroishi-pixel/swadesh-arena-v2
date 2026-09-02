<?php
$bookingStatus = $_GET['status'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description"
          content="Swadesh Arena sports venue demo landing page with facilities, sports and booking information.">

    <title>Swadesh Arena | Sports & Events</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Oswald:wght@500;600;700&display=swap"
          rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">

    <script src="js/script.js" defer></script>
</head>

<body>

<!-- ================= NAVIGATION ================= -->
<header class="site-header" id="siteHeader">
    <nav class="navbar container">

        <a href="#home" class="brand" aria-label="Swadesh Arena home">
            <span class="brand-mark">SA</span>

            <span class="brand-text">
                <strong>SWADESH</strong>
                <small>ARENA</small>
            </span>
        </a>

        <button
            class="menu-toggle"
            id="menuToggle"
            type="button"
            aria-label="Open navigation menu"
            aria-expanded="false"
        >
            <span></span>
            <span></span>
            <span></span>
        </button>

        <div class="nav-wrapper" id="navWrapper">
            <ul class="nav-links">
                <li><a href="#home" class="nav-link active">Home</a></li>
                <li><a href="#about" class="nav-link">About</a></li>
                <li><a href="#sports" class="nav-link">Sports</a></li>
                <li><a href="#amenities" class="nav-link">Amenities</a></li>
                <li><a href="#gallery" class="nav-link">Gallery</a></li>
                <li><a href="#contact" class="nav-link">Contact</a></li>
            </ul>

            <a href="#booking" class="button button-small">
                Book a Slot
            </a>
        </div>

    </nav>
</header>


<main>

    <!-- ================= HERO ================= -->
    <section class="hero" id="home">

        <div class="hero-overlay"></div>

        <div class="hero-content container">
            <p class="eyebrow">Sports • Events • Community</p>

            <h1>
                Where Dhaka
                <span>Comes to Play</span>
            </h1>

            <p class="hero-description">
                Experience quality sporting facilities, an energetic atmosphere
                and memorable events at Swadesh Arena.
            </p>

            <div class="hero-actions">
                <a href="#booking" class="button">Book Your Game</a>

                <a href="#sports" class="button button-outline">
                    Explore Sports
                </a>
            </div>

            <div class="hero-features">
                <div class="hero-feature">
                    <strong>Premium</strong>
                    <span>Playing Surface</span>
                </div>

                <div class="hero-feature">
                    <strong>Modern</strong>
                    <span>Lighting System</span>
                </div>

                <div class="hero-feature">
                    <strong>Easy</strong>
                    <span>Road Access</span>
                </div>
            </div>
        </div>

        <a href="#about"
           class="scroll-indicator"
           aria-label="Scroll to about section">
            <span></span>
        </a>

    </section>


    <!-- ================= ABOUT ================= -->
    <section class="section about-section" id="about">
        <div class="container about-grid">

            <div class="about-images">
                <div class="about-image-main">
                    <img
                        src="https://images.unsplash.com/photo-1551958219-acbc608c6377?auto=format&fit=crop&w=1200&q=85"
                        alt="Football players on a sports field"
                    >
                </div>

                <div class="about-image-small">
                    <img
                        src="https://images.unsplash.com/photo-1517466787929-bc90951d0974?auto=format&fit=crop&w=700&q=85"
                        alt="Modern football ground"
                    >
                </div>

                <div class="experience-badge">
                    <strong>Play</strong>
                    <span>Connect & Celebrate</span>
                </div>
            </div>

            <div class="about-content">
                <p class="section-label">About the Arena</p>

                <h2 class="section-title">
                    More Than a Venue.
                    <span>A Sporting Community.</span>
                </h2>

                <p>
                    Swadesh Arena brings players, spectators and communities
                    together in one energetic destination. It is designed for
                    sporting matches, entertainment and community gatherings.
                </p>

                <p>
                    Located near the 300ft Purbachal Express Highway, the venue
                    offers convenient access along with modern facilities and
                    comfortable viewing areas.
                </p>

                <div class="check-list">
                    <div class="check-item">
                        <span>✓</span>
                        <p>Quality playing environment</p>
                    </div>

                    <div class="check-item">
                        <span>✓</span>
                        <p>Suitable for sports and events</p>
                    </div>

                    <div class="check-item">
                        <span>✓</span>
                        <p>Comfortable spectator experience</p>
                    </div>

                    <div class="check-item">
                        <span>✓</span>
                        <p>Convenient parking and access</p>
                    </div>
                </div>

                <a href="#amenities" class="text-link">
                    Discover our facilities
                    <span>→</span>
                </a>
            </div>

        </div>
    </section>


    <!-- ================= SPORTS ================= -->
    <section class="section sports-section" id="sports">
        <div class="container">

            <div class="section-heading centered">
                <p class="section-label">Choose Your Game</p>

                <h2 class="section-title">
                    Sports for <span>Everyone</span>
                </h2>

                <p>
                    Select your favourite activity and send a booking request
                    for your preferred date and time.
                </p>
            </div>

            <div class="sports-grid">

                <article class="sport-card">
                    <div class="sport-image">
                        <img
                            src="https://images.unsplash.com/photo-1579952363873-27f3bade9f55?auto=format&fit=crop&w=900&q=85"
                            alt="Football match"
                        >
                        <span class="sport-number">01</span>
                    </div>

                    <div class="sport-card-content">
                        <span class="sport-icon">⚽</span>
                        <h3>Football</h3>

                        <p>
                            Enjoy friendly matches and competitive games on a
                            quality playing surface.
                        </p>

                        <button
                            class="sport-book-button"
                            data-sport="Football"
                        >
                            Book Football <span>→</span>
                        </button>
                    </div>
                </article>

                <article class="sport-card">
                    <div class="sport-image">
                        <img
                            src="https://images.unsplash.com/photo-1531415074968-036ba1b575da?auto=format&fit=crop&w=900&q=85"
                            alt="Cricket player"
                        >
                        <span class="sport-number">02</span>
                    </div>

                    <div class="sport-card-content">
                        <span class="sport-icon">🏏</span>
                        <h3>Cricket</h3>

                        <p>
                            Arrange practice sessions and exciting cricket
                            matches with your team.
                        </p>

                        <button
                            class="sport-book-button"
                            data-sport="Cricket"
                        >
                            Book Cricket <span>→</span>
                        </button>
                    </div>
                </article>

                <article class="sport-card">
                    <div class="sport-image">
                        <img
                            src="https://images.unsplash.com/photo-1626224583764-f87db24ac4ea?auto=format&fit=crop&w=900&q=85"
                            alt="Badminton player"
                        >
                        <span class="sport-number">03</span>
                    </div>

                    <div class="sport-card-content">
                        <span class="sport-icon">🏸</span>
                        <h3>Badminton</h3>

                        <p>
                            Play fast-paced badminton matches in an energetic
                            sporting environment.
                        </p>

                        <button
                            class="sport-book-button"
                            data-sport="Badminton"
                        >
                            Book Badminton <span>→</span>
                        </button>
                    </div>
                </article>

                <article class="sport-card">
                    <div class="sport-image">
                        <img
                            src="https://images.unsplash.com/photo-1546519638-68e109498ffc?auto=format&fit=crop&w=900&q=85"
                            alt="Basketball game"
                        >
                        <span class="sport-number">04</span>
                    </div>

                    <div class="sport-card-content">
                        <span class="sport-icon">🏀</span>
                        <h3>Basketball</h3>

                        <p>
                            Gather your friends and experience an exciting
                            basketball session.
                        </p>

                        <button
                            class="sport-book-button"
                            data-sport="Basketball"
                        >
                            Book Basketball <span>→</span>
                        </button>
                    </div>
                </article>

            </div>
        </div>
    </section>


    <!-- ================= PROMO ================= -->
    <section class="promo-section">
        <div class="promo-overlay"></div>

        <div class="container promo-content">
            <p class="section-label light-label">
                Create Your Moment
            </p>

            <h2>
                Bring Your Team.<br>
                We Will Prepare the Arena.
            </h2>

            <a href="#booking" class="button">
                Reserve a Time Slot
            </a>
        </div>
    </section>


    <!-- ================= AMENITIES ================= -->
    <section class="section amenities-section" id="amenities">
        <div class="container">

            <div class="section-heading">
                <p class="section-label">Arena Facilities</p>

                <h2 class="section-title">
                    Everything You Need for a
                    <span>Great Experience</span>
                </h2>
            </div>

            <div class="amenities-grid">

                <article class="amenity-card">
                    <span class="amenity-icon">◉</span>
                    <h3>Quality Turf</h3>

                    <p>
                        A maintained playing surface designed for enjoyable
                        sporting sessions.
                    </p>
                </article>

                <article class="amenity-card">
                    <span class="amenity-icon">✦</span>
                    <h3>Modern Lighting</h3>

                    <p>
                        Bright lighting helps create a comfortable environment
                        for evening games.
                    </p>
                </article>

                <article class="amenity-card">
                    <span class="amenity-icon">▣</span>
                    <h3>Viewing Areas</h3>

                    <p>
                        Comfortable spaces allow spectators to enjoy the action
                        from a clear position.
                    </p>
                </article>

                <article class="amenity-card">
                    <span class="amenity-icon">P</span>
                    <h3>Parking Space</h3>

                    <p>
                        Convenient parking and accessible road connections for
                        players and visitors.
                    </p>
                </article>

                <article class="amenity-card">
                    <span class="amenity-icon">♨</span>
                    <h3>Food & Beverages</h3>

                    <p>
                        Refreshment options help visitors stay energized during
                        games and events.
                    </p>
                </article>

                <article class="amenity-card">
                    <span class="amenity-icon">★</span>
                    <h3>Event Ready</h3>

                    <p>
                        A flexible venue for sports, entertainment and community
                        gatherings.
                    </p>
                </article>

            </div>
        </div>
    </section>


    <!-- ================= GALLERY ================= -->
    <section class="section gallery-section" id="gallery">
        <div class="container">

            <div class="section-heading centered">
                <p class="section-label">Inside the Action</p>

                <h2 class="section-title">
                    Arena <span>Gallery</span>
                </h2>
            </div>

            <div class="gallery-grid">

                <button
                    class="gallery-item gallery-large"
                    type="button"
                >
                    <img
                        src="https://images.unsplash.com/photo-1579952363873-27f3bade9f55?auto=format&fit=crop&w=1200&q=85"
                        alt="Outdoor football stadium"
                    >

                    <span class="gallery-caption">
                        Match Day
                    </span>
                </button>

                <button class="gallery-item" type="button">
                    <img
                        src="https://images.unsplash.com/photo-1526232761682-d26e03ac148e?auto=format&fit=crop&w=900&q=85"
                        alt="Football on a green field"
                    >

                    <span class="gallery-caption">
                        Quality Field
                    </span>
                </button>

                <button class="gallery-item" type="button">
                    <img
                        src="https://images.unsplash.com/photo-1486286701208-1d58e9338013?auto=format&fit=crop&w=900&q=85"
                        alt="Stadium lights at night"
                    >

                    <span class="gallery-caption">
                        Evening Games
                    </span>
                </button>

                <button class="gallery-item" type="button">
                    <img
                        src="https://images.unsplash.com/photo-1518091043644-c1d4457512c6?auto=format&fit=crop&w=900&q=85"
                        alt="Team football game"
                    >

                    <span class="gallery-caption">
                        Team Spirit
                    </span>
                </button>

                <button
                    class="gallery-item gallery-wide"
                    type="button"
                >
                    <img
    src="https://images.unsplash.com/photo-1777715330440-025d52e54435?auto=format&fit=crop&w=1200&q=85"
    alt="Sports crowd and players"
>
                    <span class="gallery-caption">
                        Community Events
                    </span>
                </button>

            </div>
        </div>
    </section>


    <!-- ================= BASKETBALL FEATURE ================= -->
    <section
        class="section basketball-feature"
        id="basketball"
    >
        <div class="container basketball-grid">

            <div class="basketball-image">
                <img
                    src="https://images.unsplash.com/photo-1546519638-68e109498ffc?auto=format&fit=crop&w=1400&q=90"
                    alt="Players enjoying a basketball game"
                >

                <div class="basketball-image-label">
                    <span>🏀</span>
                    <p>Basketball Experience</p>
                </div>
            </div>

            <div class="basketball-content">
                <p class="section-label light-label">
                    Basketball at Swadesh Arena
                </p>

                <h2>
                    Bring Your Team.
                    <span>Own the Court.</span>
                </h2>

                <p>
                    Enjoy an energetic basketball session with your friends
                    and teammates. The arena provides a suitable environment
                    for practice, friendly matches and team activities.
                </p>

                <div class="basketball-features">

                    <div class="basketball-feature-item">
                        <strong>01</strong>

                        <div>
                            <h3>Team Sessions</h3>

                            <p>
                                Suitable for practice and friendly matches.
                            </p>
                        </div>
                    </div>

                    <div class="basketball-feature-item">
                        <strong>02</strong>

                        <div>
                            <h3>Evening Games</h3>

                            <p>
                                Modern lighting for comfortable evening play.
                            </p>
                        </div>
                    </div>

                    <div class="basketball-feature-item">
                        <strong>03</strong>

                        <div>
                            <h3>Easy Booking</h3>

                            <p>
                                Select your preferred date and time online.
                            </p>
                        </div>
                    </div>

                </div>

                <button
                    type="button"
                    class="button basketball-book-button"
                    onclick="
                        document.getElementById('sport').value = 'Basketball';
                        document.getElementById('booking').scrollIntoView({
                            behavior: 'smooth'
                        });
                    "
                >
                    Book Basketball
                </button>
            </div>

        </div>
    </section>


    <!-- ================= BOOKING ================= -->
    <section class="section booking-section" id="booking">
        <div class="container booking-grid">

            <div class="booking-content">
                <p class="section-label light-label">
                    Booking Request
                </p>

                <h2>
                    Ready to Play?
                    <span>Reserve Your Slot.</span>
                </h2>

                <p>
                    Complete the form with your preferred sport, date and time.
                    This is a demonstration booking request and does not
                    represent an official confirmed reservation.
                </p>

                <div class="booking-points">
                    <div>
                        <span>01</span>
                        <p>Choose your preferred sport</p>
                    </div>

                    <div>
                        <span>02</span>
                        <p>Select a suitable date and time</p>
                    </div>

                    <div>
                        <span>03</span>
                        <p>Submit your booking request</p>
                    </div>
                </div>
            </div>

            <div class="booking-form-card">

                <?php if ($bookingStatus === 'success'): ?>
                    <div class="form-message success-message">
                        Your booking request was submitted successfully.
                    </div>

                <?php elseif ($bookingStatus === 'error'): ?>
                    <div class="form-message error-message">
                        The request could not be submitted. Please try again.
                    </div>
                <?php endif; ?>

                <form
                    action="submit-booking.php"
                    method="POST"
                    class="booking-form"
                    id="bookingForm"
                >

                    <div class="form-row">
                        <div class="form-group">
                            <label for="fullName">
                                Full name
                            </label>

                            <input
                                type="text"
                                id="fullName"
                                name="full_name"
                                placeholder="Enter your full name"
                                required
                            >
                        </div>

                        <div class="form-group">
                            <label for="phone">
                                Phone number
                            </label>

                            <input
                                type="tel"
                                id="phone"
                                name="phone"
                                placeholder="01XXXXXXXXX"
                                required
                            >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">
                            Email address
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="name@example.com"
                            required
                        >
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="sport">
                                Select sport
                            </label>

                            <select
                                id="sport"
                                name="sport"
                                required
                            >
                                <option value="">
                                    Choose a sport
                                </option>

                                <option value="Football">
                                    Football
                                </option>

                                <option value="Cricket">
                                    Cricket
                                </option>

                                <option value="Badminton">
                                    Badminton
                                </option>

                                <option value="Basketball">
                                    Basketball
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="players">
                                Number of players
                            </label>

                            <input
                                type="number"
                                id="players"
                                name="players"
                                min="1"
                                max="50"
                                placeholder="e.g. 10"
                                required
                            >
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="bookingDate">
                                Preferred date
                            </label>

                            <input
                                type="date"
                                id="bookingDate"
                                name="booking_date"
                                required
                            >
                        </div>

                        <div class="form-group">
                            <label for="timeSlot">
                                Preferred time
                            </label>

                            <select
                                id="timeSlot"
                                name="time_slot"
                                required
                            >
                                <option value="">
                                    Choose a time
                                </option>

                                <option value="08:00 AM - 10:00 AM">
                                    08:00 AM – 10:00 AM
                                </option>

                                <option value="10:00 AM - 12:00 PM">
                                    10:00 AM – 12:00 PM
                                </option>

                                <option value="03:00 PM - 05:00 PM">
                                    03:00 PM – 05:00 PM
                                </option>

                                <option value="05:00 PM - 07:00 PM">
                                    05:00 PM – 07:00 PM
                                </option>

                                <option value="07:00 PM - 09:00 PM">
                                    07:00 PM – 09:00 PM
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="message">
                            Additional message
                        </label>

                        <textarea
                            id="message"
                            name="message"
                            rows="4"
                            placeholder="Write any additional request..."
                        ></textarea>
                    </div>

                    <button
                        type="submit"
                        class="button form-submit"
                    >
                        Submit Booking Request
                    </button>

                    <p class="form-note">
                        Demo project: submitting this form does not confirm an
                        official Swadesh Arena booking.
                    </p>

                </form>
            </div>

        </div>
    </section>


    <!-- ================= CONTACT ================= -->
    <section class="section contact-section" id="contact">
        <div class="container">

            <div class="section-heading centered">
                <p class="section-label">
                    Find the Arena
                </p>

                <h2 class="section-title">
                    Visit <span>Swadesh Arena</span>
                </h2>
            </div>

            <div class="contact-grid">

                <div class="contact-information">

                    <div class="contact-card">
                        <span>⌖</span>

                        <div>
                            <h3>Location</h3>

                            <p>
                                Road 8, Swadesh Shornali Abashon,<br>
                                300ft Purbachal Express Highway,<br>
                                Dhaka, Bangladesh
                            </p>
                        </div>
                    </div>

                    <div class="contact-card">
                        <span>☎</span>

                        <div>
                            <h3>Call</h3>

                            <a href="tel:+8801817040504">
                                +880 1817-040504
                            </a>
                        </div>
                    </div>

                    <div class="contact-card">
                        <span>◷</span>

                        <div>
                            <h3>Demo Hours</h3>
                            <p>Every day: 8:00 AM – 9:00 PM</p>
                        </div>
                    </div>

                </div>

                <div class="map-wrapper">
                    <iframe
                        title="Swadesh Arena location"
                        src="https://www.google.com/maps?q=Swadesh%20Arena%20Dhaka&output=embed"
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                    ></iframe>
                </div>

            </div>
        </div>
    </section>

</main>


<!-- ================= FOOTER ================= -->
<footer class="site-footer">
    <div class="container footer-grid">

        <div class="footer-about">
            <a href="#home" class="brand footer-brand">
                <span class="brand-mark">SA</span>

                <span class="brand-text">
                    <strong>SWADESH</strong>
                    <small>ARENA</small>
                </span>
            </a>

            <p>
                A frontend demonstration website inspired by the sporting
                atmosphere and facilities of Swadesh Arena.
            </p>
        </div>

        <div class="footer-links">
            <h3>Explore</h3>

            <a href="#about">About</a>
            <a href="#sports">Sports</a>
            <a href="#amenities">Amenities</a>
            <a href="#gallery">Gallery</a>
        </div>

        <div class="footer-links">
            <h3>Contact</h3>

            <a href="#booking">Booking Request</a>
            <a href="tel:+8801817040504">Call the Arena</a>
            <a href="#contact">Location</a>
        </div>

    </div>

    <div class="footer-bottom">
        <div class="container">
            <p>
                © <span id="currentYear"></span> Swadesh Arena Demo.
                Created for educational demonstration purposes.
            </p>

            <a href="#home">
                Back to top ↑
            </a>
        </div>
    </div>
</footer>


<!-- ================= GALLERY LIGHTBOX ================= -->
<div class="lightbox" id="lightbox" aria-hidden="true">
    <button
        class="lightbox-close"
        id="lightboxClose"
        type="button"
        aria-label="Close gallery image"
    >
        ×
    </button>

    <img id="lightboxImage" src="" alt="">
    <p id="lightboxCaption"></p>
</div>

</body>
</html>