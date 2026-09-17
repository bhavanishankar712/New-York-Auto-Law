function stickyNav() {
    if (window.scrollY > 10) {
        document.querySelector('#header').classList.add("f-nav");
    } else {
        document.querySelector('#header').classList.remove("f-nav");
    }
};

jQuery(document).ready(function () {
    stickyNav();
    jQuery(window).scroll(function () { stickyNav(); });
});


jQuery(function ($) {

    // Hide submenus & add dropdown icon
    $('.mobinav .menu-item-has-children > .sub-menu').hide();
    $('.mobinav .menu-item-has-children').append('<span class="drop close"></span>');

    // Global function for inline onclick
    window.toggleMenu = function () {
        $('.mobinav').toggleClass('open');
        $('body').toggleClass('menu-open');
    };

    // Hamburger
    $('.hamb').click(function () {
        toggleMenu();
    });

    // Submenu
    $(document).on('click', '.mobinav .drop', function () {
        $(this).toggleClass('open close').siblings('.sub-menu').slideToggle(300);
        $(this).parent().siblings().find('.sub-menu').slideUp(300);
        $(this).parent().siblings().find('.drop').removeClass('open').addClass('close');
    });

});


document.addEventListener("DOMContentLoaded", () => {
    const section = document.querySelector(".hmcase-sec");
    if (!section) return;

    const counters = section.querySelectorAll(".counter");

    const observer = new IntersectionObserver(([entry]) => {
        if (!entry.isIntersecting) return;

        counters.forEach((counter) => {
            const value = counter.dataset.value || "";
            const suffix = counter.dataset.suffix || "";

            const match = value.match(/^(\d+)(.*)$/);

            if (!match) {
                counter.textContent = value + suffix;
                return;
            }

            const target = +match[1];
            const text = match[2];

            // If HTML value is 0:
            // First show 500, then animate back to 0
            if (target === 0) {
                const duration = 1800;
                const start = performance.now();

                counter.textContent = "500" + text + suffix;

                function animate(time) {
                    const progress = Math.min(
                        (time - start) / duration,
                        1
                    );

                    const current = Math.floor(
                        500 * (1 - progress)
                    );

                    counter.textContent = current + text + suffix;

                    if (progress < 1) {
                        requestAnimationFrame(animate);
                    } else {
                        counter.textContent = "0" + text + suffix;
                    }
                }

                requestAnimationFrame(animate);
                return;
            }

            const duration = 1800;
            const start = performance.now();

            function animate(time) {
                const progress = Math.min(
                    (time - start) / duration,
                    1
                );

                const current = Math.floor(
                    target * (1 - Math.pow(1 - progress, 3))
                );

                counter.textContent = current + text + suffix;

                if (progress < 1) {
                    requestAnimationFrame(animate);
                } else {
                    counter.textContent = value + suffix;
                }
            }

            requestAnimationFrame(animate);
        });

        observer.unobserve(section);
    }, {
        threshold: 0.2
    });

    observer.observe(section);
});




jQuery(document).ready(function ($) {
    jQuery('.hm-testi-blk').owlCarousel({
        loop: true,
        touchDrag: true,
        mouseDrag: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        nav: true,
        dots: false,
        items: 3,
        margin: 30,
        autoplay: true,
        responsive: {
            0: {
                items: 1
            },
            1025: {
                items: 3,
                margin: 20,
            },
            1281: {
                items: 3,
                margin: 22,
            },
            1441: {
                items: 3,
                margin: 25,
            },
            1650: {
                items: 3
            },
        }
    });
});



// Mobile Script

jQuery(document).ready(function () {
    mobilesliders();
    jQuery(window).resize(mobilesliders);

    function mobilesliders() {
        if (jQuery(window).width() <= 1024) {
            jQuery('.awards-blk').addClass('owl-carousel').owlCarousel({
                loop: true,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                touchDrag: true,
                items: 1,
                mouseDrag: true,
                nav: false,
                dots: true,
                margin: 20,
            });
        } else {
            jQuery('.awards-blk').trigger('destroy.owl.carousel').removeClass('owl-carousel');
        }
    }
});


// Tabbing script

jQuery(document).ready(function ($) {

    $('.tab-btn-group .tab-btn').on('click', function (e) {
        e.preventDefault();

        const $this = $(this);
        const index = $this.index();

        // Buttons
        $this
            .addClass('tab-btn-active')
            .siblings('.tab-btn')
            .removeClass('tab-btn-active');

        // Content
        const $tabContent = $this
            .closest('.tabs-block')
            .find('.tab-content-area .tab-pane')
            .eq(index);

        $tabContent
            .addClass('tab-pane-active')
            .siblings('.tab-pane')
            .removeClass('tab-pane-active');
    });

});