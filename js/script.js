document.addEventListener("DOMContentLoaded", () => {
    const header = document.getElementById("siteHeader");
    const menuToggle = document.getElementById("menuToggle");
    const navWrapper = document.getElementById("navWrapper");
    const navLinks = document.querySelectorAll(".nav-link");

    const bookingForm = document.getElementById("bookingForm");
    const bookingDate = document.getElementById("bookingDate");
    const sportSelect = document.getElementById("sport");
    const phoneInput = document.getElementById("phone");

    const sportBookingButtons =
        document.querySelectorAll(
    ".sport-book-button, .basketball-book-button"
);

    const galleryItems = document.querySelectorAll(".gallery-item");
    const lightbox = document.getElementById("lightbox");
    const lightboxImage = document.getElementById("lightboxImage");
    const lightboxCaption = document.getElementById("lightboxCaption");
    const lightboxClose = document.getElementById("lightboxClose");

    const currentYear = document.getElementById("currentYear");


    // =============================================
    // HEADER BACKGROUND ON SCROLL
    // =============================================

    function updateHeader() {
        if (window.scrollY > 40) {
            header.classList.add("scrolled");
        } else {
            header.classList.remove("scrolled");
        }
    }

    updateHeader();

    window.addEventListener("scroll", updateHeader);


    // =============================================
    // MOBILE NAVIGATION
    // =============================================

    function closeMobileMenu() {
        menuToggle.classList.remove("active");
        navWrapper.classList.remove("open");

        menuToggle.setAttribute("aria-expanded", "false");

        document.body.classList.remove("menu-open");
    }

    menuToggle.addEventListener("click", () => {
        const menuIsOpen = navWrapper.classList.toggle("open");

        menuToggle.classList.toggle("active", menuIsOpen);

        menuToggle.setAttribute(
            "aria-expanded",
            menuIsOpen ? "true" : "false"
        );

        document.body.classList.toggle("menu-open", menuIsOpen);
    });

    navWrapper.querySelectorAll("a").forEach((link) => {
        link.addEventListener("click", closeMobileMenu);
    });

    window.addEventListener("resize", () => {
        if (window.innerWidth > 850) {
            closeMobileMenu();
        }
    });


    // =============================================
    // ACTIVE NAVIGATION LINK
    // =============================================

    const pageSections = document.querySelectorAll("main section[id]");

    function updateActiveNavigation() {
        const scrollPosition = window.scrollY + 160;

        pageSections.forEach((section) => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.offsetHeight;
            const sectionId = section.getAttribute("id");

            if (
                scrollPosition >= sectionTop &&
                scrollPosition < sectionTop + sectionHeight
            ) {
                navLinks.forEach((link) => {
                    link.classList.remove("active");

                    if (link.getAttribute("href") === `#${sectionId}`) {
                        link.classList.add("active");
                    }
                });
            }
        });
    }

    updateActiveNavigation();

    window.addEventListener("scroll", updateActiveNavigation);


    // =============================================
    // SPORT BOOKING BUTTONS
    // =============================================

    sportBookingButtons.forEach((button) => {
        button.addEventListener("click", () => {
            const selectedSport = button.dataset.sport;

            sportSelect.value = selectedSport;

            document.getElementById("booking").scrollIntoView({
                behavior: "smooth"
            });

            setTimeout(() => {
                sportSelect.focus();
            }, 700);
        });
    });


    // =============================================
    // MINIMUM BOOKING DATE
    // =============================================

    if (bookingDate) {
        const today = new Date();

        const year = today.getFullYear();
        const month = String(today.getMonth() + 1).padStart(2, "0");
        const day = String(today.getDate()).padStart(2, "0");

        bookingDate.min = `${year}-${month}-${day}`;
    }


    // =============================================
    // BOOKING FORM VALIDATION
    // =============================================

    if (bookingForm) {
        bookingForm.addEventListener("submit", (event) => {
            const cleanedPhone = phoneInput.value.replace(
                /[\s\-()]/g,
                ""
            );

            const bangladeshPhonePattern =
                /^(?:\+?88)?01[3-9]\d{8}$/;

            if (!bangladeshPhonePattern.test(cleanedPhone)) {
                event.preventDefault();

                alert(
                    "Please enter a valid Bangladeshi phone number, for example: 01712345678"
                );

                phoneInput.focus();

                return;
            }

            const selectedDate = new Date(
                `${bookingDate.value}T00:00:00`
            );

            const today = new Date();

            today.setHours(0, 0, 0, 0);

            if (selectedDate < today) {
                event.preventDefault();

                alert("Please select today or a future booking date.");

                bookingDate.focus();
            }
        });
    }


    // =============================================
    // GALLERY LIGHTBOX
    // =============================================

    function closeLightbox() {
        lightbox.classList.remove("open");
        lightbox.setAttribute("aria-hidden", "true");

        document.body.classList.remove("menu-open");

        lightboxImage.src = "";
        lightboxCaption.textContent = "";
    }

    galleryItems.forEach((item) => {
        item.addEventListener("click", () => {
            const selectedImage = item.querySelector("img");
            const selectedCaption =
                item.querySelector(".gallery-caption");

            lightboxImage.src = selectedImage.src;
            lightboxImage.alt = selectedImage.alt;

            lightboxCaption.textContent =
                selectedCaption?.textContent || selectedImage.alt;

            lightbox.classList.add("open");
            lightbox.setAttribute("aria-hidden", "false");

            document.body.classList.add("menu-open");
        });
    });

    lightboxClose.addEventListener("click", closeLightbox);

    lightbox.addEventListener("click", (event) => {
        if (event.target === lightbox) {
            closeLightbox();
        }
    });

    document.addEventListener("keydown", (event) => {
        if (
            event.key === "Escape" &&
            lightbox.classList.contains("open")
        ) {
            closeLightbox();
        }
    });


    // =============================================
    // SCROLL REVEAL ANIMATION
    // =============================================

    const revealElements = document.querySelectorAll(
        [
            ".section-heading",
            ".about-images",
            ".about-content",
            ".sport-card",
            ".amenity-card",
            ".gallery-item",
            ".booking-content",
            ".booking-form-card",
            ".contact-card",
            ".map-wrapper"
        ].join(",")
    );

    revealElements.forEach((element) => {
        element.classList.add("reveal");
    });

    const revealObserver = new IntersectionObserver(
        (entries, observer) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("visible");
                    observer.unobserve(entry.target);
                }
            });
        },
        {
            threshold: 0.12
        }
    );

    revealElements.forEach((element) => {
        revealObserver.observe(element);
    });


    // =============================================
    // CURRENT FOOTER YEAR
    // =============================================

    if (currentYear) {
        currentYear.textContent = new Date().getFullYear();
    }
});
// Basketball booking button
document.addEventListener("DOMContentLoaded", () => {
    const basketballButton = document.querySelector(
        ".basketball-book-button"
    );

    const basketballSport = document.getElementById("sport");
    const bookingSection = document.getElementById("booking");

    if (
        basketballButton &&
        basketballSport &&
        bookingSection
    ) {
        basketballButton.addEventListener("click", () => {
            basketballSport.value = "Basketball";

            bookingSection.scrollIntoView({
                behavior: "smooth",
                block: "start"
            });
        });
    }
});/* Remove booking status message after 5 seconds */

const bookingMessage = document.querySelector(".form-message");

if (bookingMessage) {
    const currentUrl = new URL(window.location.href);
    currentUrl.searchParams.delete("status");

    window.history.replaceState(
        {},
        document.title,
        currentUrl.pathname + currentUrl.search + currentUrl.hash
    );

    setTimeout(() => {
        bookingMessage.style.transition = "opacity 0.3s ease";
        bookingMessage.style.opacity = "0";

        setTimeout(() => {
            bookingMessage.remove();
        }, 300);
    }, 5000);
}