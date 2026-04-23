$(window).on("load", function () {
    // Check if we're on a category page
    if ($("body").hasClass("page-category")) {
        // On category pages, show dark logo immediately
        $(".vd-nav-center .logo-dark").css({
            "opacity": "1",
            "visibility": "visible",
            "transform": "translateY(0)"
        });
        $(".vd-nav-center .logo-white").css({
            "opacity": "0",
            "visibility": "hidden"
        });
        // Make navbar links visible immediately
        $(".page-category .vd-navbar a").css({
            "opacity": "1",
            "visibility": "visible",
            "transform": "translateX(0)",
            "color": "#1a1a1a"
        });
    } else {
        // Hide navbar logo initially so it can animate from top (for other pages)
        $(".vd-nav-center .logo-white").css("opacity", "0");
    }

    // Add nav-ready class to trigger navbar animations
    $(".vd-navbar").addClass("nav-ready");
    
    // Trigger hero text animation after navbar animations
    setTimeout(() => {
        $("#hero-text-permanent").addClass("hero-text-ready");
        $(".about-hero-content").addClass("hero-text-ready");
        $(".range-hero-content").addClass("hero-text-ready");
    }, 100); // Small delay to ensure nav-ready class is applied
});

/* ===================================
   MOBILE MENU FUNCTIONALITY
====================================== */
(function() {
    'use strict';
    
    // Mobile menu toggle functionality
    const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
    const mobileMenuClose = document.getElementById('mobile-menu-close');
    const mobileMenuOverlay = document.getElementById('mobile-menu-overlay');
    const body = document.body;
    
    if (mobileMenuToggle && mobileMenuOverlay) {
        // Open menu
        mobileMenuToggle.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            mobileMenuOverlay.classList.add('active');
            mobileMenuToggle.classList.add('active');
            body.classList.add('mobile-menu-open');
        });
        
        // Close menu
        function closeMobileMenu() {
            mobileMenuOverlay.classList.remove('active');
            mobileMenuToggle.classList.remove('active');
            body.classList.remove('mobile-menu-open');
        }
        
        if (mobileMenuClose) {
            mobileMenuClose.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                closeMobileMenu();
            });
            
            // Also handle clicks on the close lines (spans inside the button)
            const closeLines = mobileMenuClose.querySelectorAll('.close-line');
            closeLines.forEach(function(line) {
                line.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    closeMobileMenu();
                });
            });
        }
        
        // Close menu when clicking overlay (not on content)
        mobileMenuOverlay.addEventListener('click', function(e) {
            if (e.target === mobileMenuOverlay) {
                closeMobileMenu();
            }
        });
        
        // Close menu when clicking a menu link
        const mobileMenuLinks = document.querySelectorAll('.mobile-menu-link');
        mobileMenuLinks.forEach(function(link) {
            link.addEventListener('click', function() {
                // Small delay to allow navigation
                setTimeout(closeMobileMenu, 100);
            });
        });
        
        // Close menu on ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && mobileMenuOverlay.classList.contains('active')) {
                closeMobileMenu();
            }
        });
        
        // Prevent body scroll when menu is open (for iOS)
        let scrollPosition = 0;
        mobileMenuToggle.addEventListener('click', function() {
            if (!body.classList.contains('mobile-menu-open')) {
                scrollPosition = window.pageYOffset;
            }
        });
        
        // Handle window resize - close menu if switching to desktop
        window.addEventListener('resize', function() {
            if (window.innerWidth > 991 && mobileMenuOverlay.classList.contains('active')) {
                closeMobileMenu();
            }
        });
    }
})();

jQuery(function ($) {
    "use strict";
    
    // Fix select placeholder color for Project Type dropdown
    $('#project_type').on('change', function() {
        if ($(this).val() !== '') {
            $(this).css('color', '#2b2b2b').addClass('has-value');
        } else {
            $(this).css('color', '#8a8a8a').removeClass('has-value');
        }
    });
    
    // Initialize select placeholder on page load
    $('#project_type').each(function() {
        if ($(this).val() === '' || $(this).val() === null) {
            $(this).css('color', '#8a8a8a').removeClass('has-value');
        } else {
            $(this).css('color', '#2b2b2b').addClass('has-value');
        }
    });

    $(window).on('scroll', function () {

        if ($(this).scrollTop() > 260) { // Set position from top to add class
            
            $('.upper-nav').addClass('hide');
        }
        else {
            $('header').removeClass('header-appear');
            $('.upper-nav').removeClass('hide');
        }

    });

    /* =====================================
      Parallax
   ====================================== */

    if ($(window).width() > 992) {
        $(".parallax").parallaxie({
            speed: 0.55,
            offset:-100,
        });
    }

    if ($(window).width() > 992) {
        $(".parallax1").parallaxie({
            speed: 0.55,
            offset:-150,
        });
    }


    /* ===================================
        Side Menu
    ====================================== */
    if ($("#sidemenu_toggle,#sidemenu_toggle1").length) {
        $("#sidemenu_toggle,#sidemenu_toggle1").on("click", function () {
            $(".side-menu").removeClass("side-menu-opacity");
            $(".pushwrap").toggleClass("active");
            $(".side-menu").addClass("side-menu-active"), $("#close_side_menu").fadeIn(700)
        }), $("#close_side_menu").on("click", function () {
            $(".side-menu").removeClass("side-menu-active"), $(this).fadeOut(200), $(".pushwrap").removeClass("active");
            setTimeout(function(){
            $(".side-menu").addClass("side-menu-opacity");
            }, 500);
        }), $(".side-nav .navbar-nav .nav-link").on("click", function () {
            $(".side-menu").removeClass("side-menu-active"), $("#close_side_menu").fadeOut(200), $(".pushwrap").removeClass("active");
            setTimeout(function(){
                $(".side-menu").addClass("side-menu-opacity");
            }, 500);

        }), $("#btn_sideNavClose").on("click", function () {
            $(".side-menu").removeClass("side-menu-active"), $("#close_side_menu").fadeOut(200), $(".pushwrap").removeClass("active");
            setTimeout(function(){
                $(".side-menu").addClass("side-menu-opacity");
            }, 500);
        });
    }

    /* ===================================
      WOW Animation
   ====================================== */

    if ($(window).width() > 991) {
        var wow = new WOW({
            boxClass: 'wow',
            animateClass: 'animated',
            offset: 0,
            mobile: false,
            live: true
        });
        new WOW().init();
    }


/* ===================================
     Mouse parallax
====================================== */

    if($(window).width() > 991) {


        $('.banner,header').mousemove(function (e) {
            $('[data-depth]').each(function () {
                var depth = $(this).data('depth');
                var amountMovedX = (e.pageX * -depth / 4);
                var amountMovedY = (e.pageY * -depth / 4);

                $(this).css({
                    'transform': 'translate3d(' + amountMovedX + 'px,' + amountMovedY + 'px, 0)',
                });
            });
        });

    }

/* ===================================
    Skill Section Bars
====================================== */

    $(".bar").each(function(){
        $(this).find(".bar-inner").animate({
            width: $(this).attr("data-width")},2000)
    });

    /*=========================================
               Team OWL Carousel
    ===========================================*/
    $('.testimonial-team').owlCarousel({
        loop:true,
        autoplay:false,
        margin: 0,
        nav:false,
        center:true,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 1
            },
            1000: {
                items: 3
            },
        }
    });

    $('#team-circle-right').click(function() {
        var owl = $('.testimonial-team');
        owl.owlCarousel();
        owl.trigger('next.owl.carousel');
    });
    $('#team-circle-left').click(function() {
        var owl = $('.testimonial-team');
        owl.owlCarousel();
        owl.trigger('prev.owl.carousel', [300]);
    });

/*=========================================
           Cube Portfolio Initializing
===========================================*/
    $('#js-grid-mosaic').cubeportfolio({
        filters: '#js-filters-mosaic',
        layoutMode: 'grid',
        sortByDimension: true,
        mediaQueries: [{
            width: 1500,
            cols: 2,
        }, {
            width: 1100,
            cols: 2,
        }, {
            width: 768,
            cols: 1,
        }, {
            width: 480,
            cols: 1,
            options: {
                gapHorizontal: 60
            }
        }],
        defaultFilter: '*',
        animationType: 'fadeOut',
        gapHorizontal: 50,
        gapVertical: 50,
        gridAdjustment: 'responsive',
        caption: 'zoom',

        // lightbox
        lightboxDelegate: '.cbp-lightbox',
        lightboxGallery: true,
        lightboxTitleSrc: 'data-title',
        lightboxCounter: '<div class="cbp-popup-lightbox-counter">{{current}} of {{total}}</div>',

        plugins: {
            loadMore: {
                element: "#js-loadMore-lightbox-gallery",
                action: "click",
                loadItems: 5,
            }
        }

    })
        .on('initComplete.cbp', function () {
            // your functionality
            var $this = $(this);
            if ($(".cbp-filter-item-active").attr("data-filter") === "*") {
                $("#js-loadMore-lightbox-gallery").addClass("active");
            } else {
                $("#js-loadMore-lightbox-gallery").removeClass("active");
            }
            $this.find(".cbp-wrapper").find(".cbp-item:not(.cbp-item-off)").each(function (index) {
                $(this).removeClass("even");

                console.log();
                var val = index + 1;
                if ($(this).css('left') !== "0px") {
                    $(this).addClass("even");

                }
            });
        })
        .on('onAfterLoadMore.cbp', function () {
            // your functionality
            var $this = $(this);
            $("#js-loadMore-lightbox-gallery a").addClass("d-none");
            $("#js-loadMore-lightbox-gallery").addClass("active-outer");
            $this.find(".cbp-wrapper").find(".cbp-item:not(.cbp-item-off)").each(function (index) {
                $(this).removeClass("even");
                console.log();
                var val = index + 1;
                if ($(this).css('left') !== "0px") {
                    $(this).addClass("even");
                }
            });
        })
        .on('filterComplete.cbp', function () {
            // your functionality
            var $this = $(this);
            if ($(".cbp-filter-item-active").attr("data-filter") === "*") {
                $("#js-loadMore-lightbox-gallery").addClass("active");
                $("#js-loadMore-lightbox-gallery").removeClass("d-none");
            } else {
                $("#js-loadMore-lightbox-gallery").removeClass("active");
                $("#js-loadMore-lightbox-gallery").addClass("d-none");
            }
            $this.find(".cbp-wrapper").find(".cbp-item:not(.cbp-item-off)").each(function (index) {
                $(this).removeClass("even");
                var val = index + 1;
                if ($(this).css('left') !== "0px") {
                    $(this).addClass("even");
                }
            });
        });

/*=====================================
      Testimonial Carousel
======================================*/
    $('.testimonial-box').owlCarousel({

        loop: true,
        margin: 20,
        slideSpeed: 5000,
        slideTransition: 'linear',
        nav: false,
        dots: false,
        autoplay: true,
        autoplayTimeout: 8000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            },
        }

    });

/*=====================================
      Partners Carousel
======================================*/
    $('.partners-slider').owlCarousel({
        items: 4,
        autoplay: false,
        smartSpeed: 1500,
        autoplayHoverPause: true,
        slideBy: 1,
        mouseDrag:false,
        loop: false,
        margin: 30,
        dots: false,
        nav: false,
        responsive: {
            1200: {
                items: 4,
                touchDrag:false,
                mouseDrag:false,
            },
            768: {
                items: 3,
                touchDrag:false,
                mouseDrag:false,
            },
            480: {
                items: 2,
                touchDrag:true,
                mouseDrag:true,
            },
            320: {
                items: 1,
                touchDrag:true,
                mouseDrag:true,
            },
        }
    });


/*=============================================
     Scroll Top Button
===========================================*/
    $(".scroll").on("click", function (event) {
        event.preventDefault();
        $("html,body").animate({
            scrollTop: $(this.hash).offset().top - 20}, 1200);
    });

    $(".scroll1").on("click", function (event) {
        event.preventDefault();
        $("html,body").animate({
            scrollTop: $(this.hash).offset().top - 180}, 1200);
    });



    /*=============================================
        hot spot
    ===========================================*/

    var pop = $('.map-popup');
    pop.click(function(e) {
        e.stopPropagation();
    });

    $('a.marker').click(function(e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).next('.map-popup').toggleClass('open');
        $(this).parent().siblings().children('.map-popup').removeClass('open');
    });

    $(document).click(function() {
        pop.removeClass('open');
    });

    pop.each(function() {
        var w = $(window).outerWidth(),
            edge = Math.round( ($(this).offset().left) + ($(this).outerWidth()) );
        if( w < edge ) {
            $(this).addClass('edge');
        }
    });

});

/* ===================================
   Veer Dreams – AI Assistant Logic
=================================== */

$(document).ready(function () {
    // Fix select placeholder color
    $('.enquire-form select.form-control').on('change', function() {
        if ($(this).val() !== '') {
            $(this).removeClass('select-placeholder').css('color', '#2b2b2b');
        } else {
            $(this).addClass('select-placeholder').css('color', '#8a8a8a');
        }
    });
    

    setBotMood("normal");

    function setBotMood(mood) {
        const face = $("#ai-bot-face");

        if (mood === "normal") {
            face.attr("src", "furniture/img/ai-bot-normal.webp");
        }

        if (mood === "thinking") {
            face.attr("src", "furniture/img/ai-bot-thinking.webp");
        }

        if (mood === "excited") {
            face.attr("src", "furniture/img/ai-bot-happy.webp");
        }
    }

    // Toggle Bot using Image Trigger
    $("#ai-bot-trigger").on("click", function () {
        $("#ai-bot").toggleClass("open");
    });

    // Close Bot using Close Button
    $(document).on("click", "#ai-bot-close", function () {
        $("#ai-bot").removeClass("open");
        // Also hide the action buttons when chat closes
        $("#chatbot-google-signin-circle").removeClass('show');
        $("#chatbot-whatsapp-circle").removeClass('show');
        $("#chatbot-phone-circle").removeClass('show');
    });

    function scrollBot() {
        let botBox = $("#ai-bot-messages");
        botBox.scrollTop(botBox[0].scrollHeight);
    }

    // NEW NAVIGATION-FOCUSED CHATBOT (All pages)
    {
        // Detect current page for context
        function getCurrentPageContext() {
            const path = window.location.pathname;
            const page = path.split('/').pop() || 'index.html';
            
            if (page === 'index.html' || page === '' || page === '/') {
                return 'Homepage';
            } else if (page === 'collections.html') {
                return 'Collections Page';
            } else if (page === 'our-range.html') {
                return 'Our Range Page';
            } else if (page === 'about.html') {
                return 'About Page';
            } else if (page === 'clients.html') {
                return 'Clients Page';
            } else if (page === 'enquire.html') {
                return 'Enquire Page';
            } else if (page === 'location.html') {
                return 'Location Page';
            } else if (page === 'catalogue.html') {
                return 'Catalogue Page';
            } else if (page.startsWith('category-')) {
                const categoryName = page.replace('category-', '').replace('.html', '').replace(/-/g, ' ');
                return categoryName.charAt(0).toUpperCase() + categoryName.slice(1) + ' Category';
            }
            return 'Website';
        }
        let chatbotState = "initial"; // initial, browse-collections, need-help, custom-bulk
        let currentContext = "Homepage"; // Track what page/collection user is viewing
        
        // Load stored user data from localStorage
        function getUserData() {
            return {
                name: localStorage.getItem('chatbot_user_name') || '',
                email: localStorage.getItem('chatbot_user_email') || ''
            };
        }
        
        // Store user data in localStorage
        function storeUserData(name, email) {
            if (name) localStorage.setItem('chatbot_user_name', name);
            if (email) localStorage.setItem('chatbot_user_email', email);
        }

        // Handle button clicks
        $(document).on("click", ".bot-msg-button", function() {
            const action = $(this).data("action");
            handleButtonAction(action);
        });

        // Handle text input (minimal - mostly button-based) - removed since input field is gone
        
        function openWhatsAppFollowUp() {
            const userData = getUserData();
            const userName = userData.name || "";
            let message = `Hello! I'm interested in learning more about ${currentContext}. Could you please provide more information?`;
            
            if (userName) {
                message = `Hello! My name is ${userName}. I'm interested in learning more about ${currentContext}. Could you please provide more information?`;
            }
            
            const whatsappUrl = `https://wa.me/919996223444?text=${encodeURIComponent(message)}`;
            window.open(whatsappUrl, "_blank");
            
            addBotMessage("Opening WhatsApp for you... 💬");
            setBotMood("excited");
            
            setTimeout(() => {
                chatbotState = "initial";
                addBotMessage("Is there anything else I can help you with?");
                addFollowUpButtons();
            }, 2000);
        }
        
        function openEmailFollowUp() {
            const userData = getUserData();
            const userName = userData.name || "";
            const userEmail = userData.email || "";
            
            const subject = encodeURIComponent(`Follow-up Request - ${currentContext}`);
            const body = encodeURIComponent(
                `Hello Veer Dreams Team,\n\nI'm interested in learning more about ${currentContext}.\n\nCould you please provide more information?\n\n${userName ? `Name: ${userName}\n` : ''}${userEmail ? `Email: ${userEmail}\n` : ''}`
            );
            
            const emailUrl = `mailto:info@veerdreams.com?subject=${subject}&body=${body}`;
            window.location.href = emailUrl;
            
            addBotMessage("Opening your email client... 📧");
            
            setTimeout(() => {
                chatbotState = "initial";
                addBotMessage("Is there anything else I can help you with?");
                addFollowUpButtons();
            }, 2000);
        }

        function handleButtonAction(action) {
            $("#ai-bot-messages").append(`<div class="user-msg">${action.replace(/-/g, ' ')}</div>`);
            scrollBot();
            setBotMood("thinking");
            showTyping(() => {
                setBotMood("normal");
                
                switch(action) {
                    case "browse-collections":
                        chatbotState = "browse-collections";
                        currentContext = "Collections";
                        addBotMessage("Great! Which collection interests you?");
                        addCollectionButtons();
                        break;
                    
                    case "need-help":
                        chatbotState = "need-help";
                        currentContext = "Furniture Selection";
                        addBotMessage("Where will the furniture be used?");
                        addLocationButtons();
                        break;
                    
                    case "custom-bulk":
                        chatbotState = "custom-bulk";
                        currentContext = "Custom / Bulk Enquiry";
                        addBotMessage("This looks like a custom or bulk requirement. Our team handles these personally.");
                        addEnquiryButton();
                        break;
                    
                    case "collection-signature":
                        currentContext = "Signature Collection";
                        addBotMessage("Taking you to the Signature Collection...");
                        setTimeout(() => {
                            window.location.href = "collections.html?collection=signature#signature-collection";
                        }, 500);
                        break;
                    
                    case "collection-garden":
                        currentContext = "Garden & Terrace Collection";
                        addBotMessage("Taking you to the Garden & Terrace Collection...");
                        setTimeout(() => {
                            window.location.href = "collections.html?collection=garden#garden-collection";
                        }, 500);
                        break;
                    
                    case "collection-poolside":
                        currentContext = "Poolside & Leisure Collection";
                        addBotMessage("Taking you to the Poolside & Leisure Collection...");
                        setTimeout(() => {
                            window.location.href = "collections.html?collection=poolside#poolside-collection";
                        }, 500);
                        break;
                    
                    case "location-garden":
                        currentContext = "Garden Furniture";
                        addBotMessage("Perfect! For garden spaces, I suggest browsing our <b>Our Range</b> page for the best options.");
                        addOurRangeButton();
                        addFollowUpOption();
                        break;
                    
                    case "location-poolside":
                        currentContext = "Poolside Furniture";
                        addBotMessage("Great choice! For poolside areas, I suggest browsing our <b>Our Range</b> page for suitable options.");
                        addOurRangeButton();
                        addFollowUpOption();
                        break;
                    
                    case "location-balcony":
                        currentContext = "Balcony Furniture";
                        addBotMessage("For balconies, I suggest browsing our <b>Our Range</b> page for compact options.");
                        addOurRangeButton();
                        addFollowUpOption();
                        break;
                    
                    case "location-commercial":
                        currentContext = "Commercial Space Furniture";
                        addBotMessage("For commercial spaces, please check our <b>Our Range</b> page or contact us for bulk orders.");
                        addOurRangeButton();
                        addFollowUpOption();
                        break;
                    
                    case "request-followup":
                        addOptionalContactPrompt();
                        break;
                    
                    case "open-enquiry":
                        addBotMessage("Opening the enquiry page for you...");
                        setTimeout(() => {
                            window.location.href = "enquire.html";
                        }, 500);
                        break;
                    
                    case "view-range":
                        currentContext = "Our Range";
                        addBotMessage("Taking you to Our Range...");
                        setTimeout(() => {
                            window.location.href = "our-range.html";
                        }, 500);
                        break;
                    
                    case "followup-whatsapp":
                        openWhatsAppFollowUp();
                        break;
                    
                    case "followup-email":
                        openEmailFollowUp();
                        break;
                    
                    case "no-contact":
                        addBotMessage("No problem! Feel free to browse our collections anytime. 😊");
                        chatbotState = "initial";
                        setTimeout(() => {
                            addBotMessage("Is there anything else I can help you with?");
                            addFollowUpButtons();
                        }, 1500);
                        break;
                }
            });
        }

        function addCollectionButtons() {
            const buttons = `
                <div class="bot-msg-buttons">
                    <button class="bot-msg-button" data-action="collection-signature">Signature Collection</button>
                    <button class="bot-msg-button" data-action="collection-garden">Garden & Terrace Collection</button>
                    <button class="bot-msg-button" data-action="collection-poolside">Poolside & Leisure Collection</button>
                </div>
            `;
            $("#ai-bot-messages").append(`<div class="bot-msg">${buttons}</div>`);
            scrollBot();
        }

        function addLocationButtons() {
            const buttons = `
                <div class="bot-msg-buttons">
                    <button class="bot-msg-button" data-action="location-garden">Garden</button>
                    <button class="bot-msg-button" data-action="location-poolside">Poolside</button>
                    <button class="bot-msg-button" data-action="location-balcony">Balcony</button>
                    <button class="bot-msg-button" data-action="location-commercial">Commercial Space</button>
                </div>
            `;
            $("#ai-bot-messages").append(`<div class="bot-msg">${buttons}</div>`);
            scrollBot();
        }

        function addEnquiryButton() {
            const button = `
                <div class="bot-msg-buttons">
                    <button class="bot-msg-button" data-action="open-enquiry">Open Enquiry Page</button>
                </div>
            `;
            $("#ai-bot-messages").append(`<div class="bot-msg">${button}</div>`);
            scrollBot();
        }

        function addOurRangeButton() {
            const button = `
                <div class="bot-msg-buttons">
                    <button class="bot-msg-button" data-action="view-range">View Our Range</button>
                </div>
            `;
            $("#ai-bot-messages").append(`<div class="bot-msg">${button}</div>`);
            scrollBot();
        }


        function addOptionalContactPrompt() {
            addBotMessage("How would you like us to follow up?");
            const buttons = `
                <div class="bot-msg-buttons">
                    <button class="bot-msg-button" data-action="followup-whatsapp">Follow up on WhatsApp</button>
                    <button class="bot-msg-button" data-action="followup-email">Follow up via Email</button>
                    <button class="bot-msg-button" data-action="no-contact">No, thanks</button>
                </div>
            `;
            $("#ai-bot-messages").append(`<div class="bot-msg">${buttons}</div>`);
            scrollBot();
        }

        function addFollowUpOption() {
            setTimeout(() => {
                const button = `
                    <div class="bot-msg-buttons">
                        <button class="bot-msg-button" data-action="request-followup">Request Follow-up</button>
                    </div>
                `;
                $("#ai-bot-messages").append(`<div class="bot-msg">${button}</div>`);
                scrollBot();
            }, 1000);
        }

        function addFollowUpButtons() {
            const buttons = `
                <div class="bot-msg-buttons">
                    <button class="bot-msg-button" data-action="browse-collections">Browse Collections</button>
                    <button class="bot-msg-button" data-action="view-range">View Our Range</button>
                    <button class="bot-msg-button" data-action="no-contact">No, thanks</button>
                </div>
            `;
            $("#ai-bot-messages").append(`<div class="bot-msg">${buttons}</div>`);
            scrollBot();
        }

        function resetToInitial() {
            chatbotState = "initial";
            currentContext = getCurrentPageContext();
            addBotMessage("Hi 👋 What are you looking for today?");
            const buttons = `
                <div class="bot-msg-buttons">
                    <button class="bot-msg-button" data-action="browse-collections">Browse Collections</button>
                    <button class="bot-msg-button" data-action="need-help">Need Help Choosing</button>
                    <button class="bot-msg-button" data-action="custom-bulk">Custom / Bulk Enquiry</button>
                </div>
            `;
            $("#ai-bot-messages").append(`<div class="bot-msg">${buttons}</div>`);
            scrollBot();
        }
        
        // Initialize chatbot on page load
        // Check if initial buttons already exist (from HTML), if not, add them
        if ($("#ai-bot-messages .bot-msg-buttons").length === 0) {
            // Clear any old messages and add new initial message
            $("#ai-bot-messages").html('');
            addBotMessage("Hi 👋 What are you looking for today?");
            const buttons = `
                <div class="bot-msg-buttons">
                    <button class="bot-msg-button" data-action="browse-collections">Browse Collections</button>
                    <button class="bot-msg-button" data-action="need-help">Need Help Choosing</button>
                    <button class="bot-msg-button" data-action="custom-bulk">Custom / Bulk Enquiry</button>
                </div>
            `;
            $("#ai-bot-messages").append(`<div class="bot-msg">${buttons}</div>`);
            scrollBot();
        }

        function addBotMessage(message) {
            $("#ai-bot-messages").append(`<div class="bot-msg">${message}</div>`);
            scrollBot();
        }

        function showTyping(callback) {
            $("#ai-bot-messages").append(`
                <div class="bot-msg typing" id="typing">
                    <span></span><span></span><span></span>
                </div>
            `);
            scrollBot();
            setTimeout(() => {
                $("#typing").remove();
                if (callback) callback();
            }, 800);
        }

    }

    let lastScrollTop = 0;

    $(window).on("scroll", function () {
        let st = $(this).scrollTop();
        let navbar = $(".vd-navbar");

        // At the top: navbar should be transparent (no background)
        if (st <= 80) {
            navbar.removeClass("fixed scrolled nav-hidden");
            lastScrollTop = st;
            return;
        }

        // Past hero section: navbar should be fixed
        navbar.addClass("fixed");

        // Scroll DOWN → hide navbar (always when scrolling down)
        if (st > lastScrollTop) {
            navbar.addClass("nav-hidden").removeClass("scrolled");
        } 
        // Scroll UP → show navbar with background
        else if (st < lastScrollTop) {
            navbar.removeClass("nav-hidden").addClass("scrolled");
        }

        lastScrollTop = st;
    });

    /* =================================
    HERO SKIP SCROLL
    ================================= */

    $(".hero-scroll-arrow").on("click", function () {
        // Find the hero section (either .banner, .about-hero-section, .range-hero-section, .collections-intro-section, or .clients-hero-section)
        const heroSection = $(".banner").length ? $(".banner") : 
                          ($(".about-hero-section").length ? $(".about-hero-section") : 
                          ($(".range-hero-section").length ? $(".range-hero-section") : 
                          ($(".collections-intro-section").length ? $(".collections-intro-section") : 
                          $(".clients-hero-section"))));
        const nextSection = heroSection.next();

        if (!nextSection.length) return;

        $("html, body").animate(
            {
                scrollTop: nextSection.offset().top
            },
            500   // fast & smooth
        );
    });

    // ABOUT SECTION SLIDESHOW
    (function() {
        const slides = $('.about-slide');
        const indicators = $('.about-indicator');
        let currentSlide = 0;
        let slideInterval;
        let touchStartX = 0;
        let touchEndX = 0;
        const SLIDE_DURATION = 2500; // 2.5 seconds exactly

        // Function to show a specific slide
        function showSlide(index) {
            slides.removeClass('active');
            indicators.removeClass('active');
            
            slides.eq(index).addClass('active');
            indicators.eq(index).addClass('active');
            
            currentSlide = index;
        }

        // Function to go to next slide
        function nextSlide() {
            const next = (currentSlide + 1) % slides.length;
            showSlide(next);
        }

        // Function to go to previous slide
        function prevSlide() {
            const prev = (currentSlide - 1 + slides.length) % slides.length;
            showSlide(prev);
        }

        // Start auto-cycle with consistent timing
        function startSlideshow() {
            stopSlideshow(); // Clear any existing interval first
            slideInterval = setInterval(nextSlide, SLIDE_DURATION);
        }

        // Stop auto-cycle
        function stopSlideshow() {
            if (slideInterval) {
                clearInterval(slideInterval);
                slideInterval = null;
            }
        }

        // Initialize slideshow
        if (slides.length > 0) {
            showSlide(0);
            startSlideshow();

            // Indicator click handlers
            indicators.on('click', function() {
                const slideIndex = $(this).data('slide');
                if (slideIndex !== currentSlide) {
                    showSlide(slideIndex);
                }
                startSlideshow(); // Restart with consistent timing
            });

            // Touch events for swipe
            const slideshowContainer = $('.about-slideshow-container');
            
            slideshowContainer.on('touchstart', function(e) {
                touchStartX = e.originalEvent.touches[0].clientX;
            });

            slideshowContainer.on('touchend', function(e) {
                touchEndX = e.originalEvent.changedTouches[0].clientX;
                handleSwipe();
            });

            // Mouse events for desktop swipe simulation
            let mouseStartX = 0;
            let mouseDown = false;

            slideshowContainer.on('mousedown', function(e) {
                mouseStartX = e.clientX;
                mouseDown = true;
            });

            $(document).on('mouseup', function(e) {
                if (mouseDown) {
                    const mouseEndX = e.clientX;
                    const diff = mouseStartX - mouseEndX;
                    
                    // Swipe threshold: 50px
                    if (Math.abs(diff) > 50) {
                        if (diff > 0) {
                            nextSlide(); // Swipe left = next
                        } else {
                            prevSlide(); // Swipe right = previous
                        }
                    }
                    mouseDown = false;
                    startSlideshow(); // Restart with consistent timing
                }
            });

            // Handle swipe gesture
            function handleSwipe() {
                const swipeDistance = touchStartX - touchEndX;
                const swipeThreshold = 50; // Minimum distance for a swipe

                if (Math.abs(swipeDistance) > swipeThreshold) {
                    if (swipeDistance > 0) {
                        nextSlide(); // Swipe left = next slide
                    } else {
                        prevSlide(); // Swipe right = previous slide
                    }
                    startSlideshow(); // Restart with consistent timing
                }
            }

            // Pause on hover but resume with same timing
            slideshowContainer.on('mouseenter', stopSlideshow);
            slideshowContainer.on('mouseleave', function() {
                // Restart immediately when mouse leaves
                startSlideshow();
            });
        }
    })();

    // Category Filtering Functionality
    function filterCategories() {
        const categoryFilter = $('#category-filter').val() || 'all';
        const collectionFilter = $('#collection-filter').val() || 'all';
        
        $('.category-card').each(function() {
            const $card = $(this);
            const cardCategory = $card.data('category') || '';
            const cardCollection = $card.data('collection') || '';
            
            let showCard = true;
            
            // Filter by category
            if (categoryFilter !== 'all' && cardCategory !== categoryFilter) {
                showCard = false;
            }
            
            // Filter by collection (supports multiple collections per card)
            if (collectionFilter !== 'all' && cardCollection) {
                const cardCollections = cardCollection.split(' ').filter(c => c.trim() !== '');
                if (!cardCollections.includes(collectionFilter)) {
                    showCard = false;
                }
            } else if (collectionFilter !== 'all' && !cardCollection) {
                showCard = false;
            }
            
            // Show or hide card with animation
            if (showCard) {
                $card.fadeIn(300).removeClass('filtered-out');
            } else {
                $card.fadeOut(300).addClass('filtered-out');
            }
        });
    }
    
    // Attach filter event listeners
    $('#category-filter, #collection-filter').on('change', function() {
        filterCategories();
    });

    // Auto-filter and scroll when arriving from collection CTA
    $(document).ready(function() {
        // Check for collection parameter in URL
        const urlParams = new URLSearchParams(window.location.search);
        const collectionParam = urlParams.get('collection');
        
        if (collectionParam && ['signature', 'garden', 'poolside'].includes(collectionParam)) {
            // Scroll to categories section
            const categoriesSection = $('#categories-section');
            if (categoriesSection.length) {
                setTimeout(function() {
                    $('html, body').animate({
                        scrollTop: categoriesSection.offset().top - 100
                    }, 800);
                }, 300);
            }
            
            // Set the collection filter and trigger filtering
            setTimeout(function() {
                $('#collection-filter').val(collectionParam);
                filterCategories();
            }, 500);
        }
    });

    // Product Popup Functionality - DISABLED to prevent layout shifts
    /*
    let popupTimeout;
    
    $('.product-card').each(function() {
        const $card = $(this);
        const $image = $card.find('.product-image');
        const $popup = $card.find('.product-popup');
        const $info = $card.find('.product-info');
        let isInfoHovered = false;
        
        // Track when hovering over product-info
        $info.on('mouseenter', function(e) {
            e.stopPropagation();
            isInfoHovered = true;
            hidePopup($card);
        });
        
        $info.on('mouseleave', function() {
            isInfoHovered = false;
        });
        
        // Show popup on image hover
        $image.on('mouseenter', function() {
            if (!isInfoHovered) {
                clearTimeout(popupTimeout);
                showPopup($card);
            }
        });
        
        // Hide popup when leaving image area (but not if going to popup)
        $image.on('mouseleave', function(e) {
            const relatedTarget = e.relatedTarget;
            if (!$(relatedTarget).closest('.product-popup').length && !isInfoHovered) {
                popupTimeout = setTimeout(function() {
                    hidePopup($card);
                }, 100);
            }
        });
        
        // Keep popup open when hovering over it
        $popup.on('mouseenter', function() {
            clearTimeout(popupTimeout);
            if (!$info.is(':hover')) {
                showPopup($card);
            }
        });
        
        // Hide popup on mouse leave from card
        $card.on('mouseleave', function() {
            clearTimeout(popupTimeout);
            hidePopup($card);
        });
    });
    
    function showPopup($card) {
        const $popup = $card.find('.product-popup');
        const $allCards = $('.product-card');
        const totalProducts = $allCards.length;
        const currentIndex = $allCards.index($card);
        // Popup height = 525px
        const popupHeight = 525;
        
        $card.addClass('has-popup-open');
        $popup.css({
            'opacity': '1',
            'visibility': 'visible',
            'transform': 'translateY(0)'
        });
        
        // Case 1: ≤3 products - only shift footer, don't shift products
        if (totalProducts <= 3) {
            // Add padding to section to accommodate popup (pushes footer down)
            $('.category-page-section').css({
                'padding-bottom': (100 + popupHeight) + 'px',
                'transition': 'padding-bottom 0.4s ease'
            });
        } 
        // Case 2: >3 products - skip products 2 and 3, shift from product 4 onwards
        else {
            // Products 2 and 3 (index 1 and 2) don't move
            // Product 4 (index 3) and onwards shift down
            $card.nextAll('.product-card').each(function(index) {
                const productIndex = currentIndex + index + 1;
                // Skip products 2 and 3 (indices 1 and 2 in 0-based, so 1 and 2)
                // Only shift products starting from index 3 (4th product)
                if (productIndex >= 3) {
                    $(this).css({
                        'margin-top': popupHeight + 'px',
                        'transition': 'margin-top 0.4s ease'
                    });
                }
            });
            
            // Shift footer
            $('.category-page-section').css({
                'padding-bottom': (100 + popupHeight) + 'px',
                'transition': 'padding-bottom 0.4s ease'
            });
        }
    }
    
    function hidePopup($card) {
        const $popup = $card.find('.product-popup');
        $card.removeClass('has-popup-open');
        $popup.css({
            'opacity': '0',
            'visibility': 'hidden',
            'transform': 'translateY(-20px)'
        });
        
        // Reset all products
        $('.product-card').each(function() {
            $(this).css({
                'margin-top': '0',
                'transition': 'margin-top 0.4s ease'
            });
        });
        
        // Reset footer padding
        $('.category-page-section').css({
            'padding-bottom': '100px',
            'transition': 'padding-bottom 0.4s ease'
        });
        
        // Also reset any cards that might have been shifted
        $('.product-card').css({
            'margin-top': '',
            'transition': ''
        });
    }
    */
    
    // Testimonials Carousel for Clients Page
    if ($('.testimonials-carousel').length) {
        let currentSlide = 0;
        const slides = $('.testimonial-slide');
        const indicators = $('.testimonial-indicators .indicator');
        const totalSlides = slides.length;
        const SLIDE_DURATION = 2000; // 2 seconds exactly - consistent timing
        let carouselInterval = null;
        let isPaused = false;
        
        // Initialize first slide
        showSlide(0);
        
        function showSlide(index) {
            // Ensure index is within bounds
            if (index < 0) index = totalSlides - 1;
            if (index >= totalSlides) index = 0;
            
            currentSlide = index;
            slides.removeClass('active');
            indicators.removeClass('active');
            
            slides.eq(index).addClass('active');
            indicators.eq(index).addClass('active');
        }
        
        function nextSlide() {
            const nextIndex = (currentSlide + 1) % totalSlides;
            showSlide(nextIndex);
        }
        
        function startCarousel() {
            // Clear any existing interval
            if (carouselInterval) {
                clearInterval(carouselInterval);
            }
            // Start with consistent 2-second intervals
            carouselInterval = setInterval(function() {
                if (!isPaused) {
                    nextSlide();
                }
            }, SLIDE_DURATION);
        }
        
        // Start the carousel
        startCarousel();
        
        // Click on indicators
        indicators.on('click', function() {
            const slideIndex = $(this).index();
            showSlide(slideIndex);
            // Restart interval immediately to maintain consistent timing
            startCarousel();
        });
        
        // Pause on hover
        $('.testimonials-carousel').on('mouseenter', function() {
            isPaused = true;
            if (carouselInterval) {
                clearInterval(carouselInterval);
            }
        }).on('mouseleave', function() {
            isPaused = false;
            // Restart immediately when mouse leaves
            startCarousel();
        });
    }

    /* ============================================
       ENQUIRE PAGE FUNCTIONALITY
    ============================================ */
    // Smooth scroll for hero button
    $('.enquire-hero-btn').on('click', function(e) {
        e.preventDefault();
        const target = $(this.getAttribute('href'));
        if (target.length) {
            $('html, body').animate({
                scrollTop: target.offset().top - 100
            }, 800);
        }
    });

    // Floating labels functionality
    $('.enquire-form .form-control').on('focus blur change', function() {
        const $this = $(this);
        const $label = $this.siblings('.floating-label');
        
        if ($this.val() !== '' || $this.is(':focus')) {
            $this.addClass('has-value');
            $label.addClass('active');
        } else {
            $this.removeClass('has-value');
            $label.removeClass('active');
        }
    });

    // Initialize labels on page load
    $('.enquire-form .form-control').each(function() {
        const $this = $(this);
        if ($this.val() !== '' || $this.is('select') && $this.val() !== '') {
            $this.addClass('has-value');
            $this.siblings('.floating-label').addClass('active');
        }
    });
    
    // Special handling for textarea - no placeholder collision
    $('#message').on('focus', function() {
        $(this).siblings('.floating-label').addClass('active');
    });

    // Select dropdown styling
    $('#enquiry_type').on('change', function() {
        if ($(this).val() !== '') {
            $(this).css('color', '#2b2b2b').addClass('has-value');
            $(this).siblings('.floating-label').addClass('active');
        } else {
            $(this).css('color', '#8a8a8a').removeClass('has-value');
            $(this).siblings('.floating-label').removeClass('active');
        }
    });

    // Form validation and submission
    $('#enquire-form').on('submit', function(e) {
        e.preventDefault();
        
        let isValid = true;
        const $form = $(this);
        
        // Clear previous errors
        $form.find('.form-error').text('');
        $form.find('.form-control').removeClass('error');
        
        // Validate each required field
        $form.find('input[required], select[required], textarea[required]').each(function() {
            const $field = $(this);
            const value = $field.val().trim();
            
            if (value === '') {
                isValid = false;
                $field.addClass('error');
                $field.siblings('.form-error').text('This field is required');
            } else if ($field.attr('type') === 'email' && !isValidEmail(value)) {
                isValid = false;
                $field.addClass('error');
                $field.siblings('.form-error').text('Please enter a valid email address');
            } else if ($field.attr('type') === 'tel' && !isValidPhone(value)) {
                isValid = false;
                $field.addClass('error');
                $field.siblings('.form-error').text('Please enter a valid phone number');
            }
        });
        
        if (isValid) {
            // Get form data
            const formData = {
                name: $('#name').val().trim() || $('#full_name').val().trim(),
                email: $('#email').val().trim(),
                phone: $('#phone').val().trim(),
                message: $('#message').val().trim()
            };
            
            // Disable submit button
            const $submitBtn = $form.find('button[type="submit"]');
            const originalBtnText = $submitBtn.html();
            $submitBtn.prop('disabled', true).html('<span>Submitting...</span>');
            
            // Send data to server
            $.ajax({
                url: 'submit-enquiry.php',
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        // Show success message
                        $('#form-success').fadeIn(300);
                        $form[0].reset();
                        $form.find('.form-control').removeClass('has-value');
                        $form.find('.floating-label').removeClass('active');
                        
                        // Scroll to success message
                        $('html, body').animate({
                            scrollTop: $('#form-success').offset().top - 100
                        }, 500);
                    } else {
                        alert(response.message || 'An error occurred. Please try again.');
                        $submitBtn.prop('disabled', false).html(originalBtnText);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', error, xhr.responseText);
                    alert('Failed to submit enquiry. Please try again.');
                    $submitBtn.prop('disabled', false).html(originalBtnText);
                }
            });
        }
    });
    
    // Helper functions
    function isValidEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }
    
    function isValidPhone(phone) {
        const re = /^[\d\s\-\+\(\)]+$/;
        return re.test(phone) && phone.replace(/\D/g, '').length >= 10;
    }

    // Texture Filter Functionality for Category Pages
    function filterProductsByTexture() {
        const textureFilter = $('.texture-filter-select, #texture-filter').val() || 'all';
        
        $('.product-card').each(function() {
            const $card = $(this);
            const cardTexture = $card.data('texture') || '';
            
            let showCard = true;
            
            // Filter by texture
            if (textureFilter !== 'all' && cardTexture !== textureFilter) {
                showCard = false;
            }
            
            // Show or hide card with animation
            if (showCard) {
                $card.fadeIn(300).removeClass('filtered-out');
            } else {
                $card.fadeOut(300).addClass('filtered-out');
            }
        });
    }
    
    // Attach texture filter event listener for category pages
    $('.texture-filter-select, #texture-filter').on('change', function() {
        filterProductsByTexture();
    });
    
    // Show all products on page load (default to "all")
    if ($('.texture-filter-select, #texture-filter').length) {
        // Ensure all products are visible on load
        $('.product-card').fadeIn(0).removeClass('filtered-out');
        // Set filter to "all" if not already set
        $('.texture-filter-select, #texture-filter').val('all');
    }

    // ABOUT HERO VIDEO FORWARD-REVERSE LOOP
    (function() {
        const video = document.getElementById('about-hero-video');
        if (!video) return;
        
        let isReversing = false;
        let animationFrameId = null;
        let lastFrameTime = null;
        let reverseStartTime = null;
        let reverseStartVideoTime = 0;
        
        // Get video duration when metadata is loaded
        video.addEventListener('loadedmetadata', function() {
            video.currentTime = 0;
            video.play();
        });
        
        // When video ends, start reverse playback
        video.addEventListener('ended', function() {
            if (!isReversing) {
                isReversing = true;
                reverseStartTime = performance.now();
                reverseStartVideoTime = video.duration;
                video.pause();
                startReversePlayback();
            }
        });
        
        function startReversePlayback() {
            if (!isReversing || !video) return;
            
            function reverseFrame(timestamp) {
                if (!isReversing || !video) {
                    if (animationFrameId) {
                        cancelAnimationFrame(animationFrameId);
                        animationFrameId = null;
                    }
                    return;
                }
                
                // Initialize timing on first frame
                if (lastFrameTime === null) {
                    lastFrameTime = timestamp;
                    animationFrameId = requestAnimationFrame(reverseFrame);
                    return;
                }
                
                // Calculate smooth time delta (in seconds)
                const deltaTime = (timestamp - lastFrameTime) / 1000;
                lastFrameTime = timestamp;
                
                // Calculate elapsed time since reverse started
                const elapsedSinceReverse = (timestamp - reverseStartTime) / 1000;
                
                // Calculate new video time (going backwards)
                const newTime = Math.max(0, reverseStartVideoTime - elapsedSinceReverse);
                video.currentTime = newTime;
                
                // If we've reached the beginning, switch to forward and continue loop
                if (newTime <= 0.1) {
                    isReversing = false;
                    lastFrameTime = null;
                    reverseStartTime = null;
                    video.currentTime = 0;
                    
                    // Small delay to ensure smooth transition
                    setTimeout(function() {
                        video.play();
                    }, 50);
                    
                    if (animationFrameId) {
                        cancelAnimationFrame(animationFrameId);
                        animationFrameId = null;
                    }
                    return;
                }
                
                animationFrameId = requestAnimationFrame(reverseFrame);
            }
            
            // Start reverse animation
            lastFrameTime = null;
            animationFrameId = requestAnimationFrame(reverseFrame);
        }
        
        // Clean up on page unload
        window.addEventListener('beforeunload', function() {
            if (animationFrameId) {
                cancelAnimationFrame(animationFrameId);
            }
        });
    })();

    // OUR RANGE HERO VIDEO FORWARD-REVERSE LOOP
    (function() {
        const video = document.getElementById('range-hero-video');
        if (!video) return;
        
        let isReversing = false;
        let animationFrameId = null;
        let lastFrameTime = null;
        let reverseStartTime = null;
        let reverseStartVideoTime = 0;
        
        // Get video duration when metadata is loaded
        video.addEventListener('loadedmetadata', function() {
            video.currentTime = 0;
            video.play();
        });
        
        // When video ends, start reverse playback
        video.addEventListener('ended', function() {
            if (!isReversing) {
                isReversing = true;
                reverseStartTime = performance.now();
                reverseStartVideoTime = video.duration;
                video.pause();
                startReversePlayback();
            }
        });
        
        function startReversePlayback() {
            if (!isReversing || !video) return;
            
            function reverseFrame(timestamp) {
                if (!isReversing || !video) {
                    if (animationFrameId) {
                        cancelAnimationFrame(animationFrameId);
                        animationFrameId = null;
                    }
                    return;
                }
                
                // Initialize timing on first frame
                if (lastFrameTime === null) {
                    lastFrameTime = timestamp;
                    animationFrameId = requestAnimationFrame(reverseFrame);
                    return;
                }
                
                // Calculate smooth time delta (in seconds)
                const deltaTime = (timestamp - lastFrameTime) / 1000;
                lastFrameTime = timestamp;
                
                // Calculate elapsed time since reverse started
                const elapsedSinceReverse = (timestamp - reverseStartTime) / 1000;
                
                // Calculate new video time (going backwards)
                const newTime = Math.max(0, reverseStartVideoTime - elapsedSinceReverse);
                video.currentTime = newTime;
                
                // If we've reached the beginning, switch to forward and continue loop
                if (newTime <= 0.1) {
                    isReversing = false;
                    lastFrameTime = null;
                    reverseStartTime = null;
                    video.currentTime = 0;
                    
                    // Small delay to ensure smooth transition
                    setTimeout(function() {
                        video.play();
                    }, 50);
                    
                    if (animationFrameId) {
                        cancelAnimationFrame(animationFrameId);
                        animationFrameId = null;
                    }
                    return;
                }
                
                animationFrameId = requestAnimationFrame(reverseFrame);
            }
            
            // Start reverse animation
            lastFrameTime = null;
            animationFrameId = requestAnimationFrame(reverseFrame);
        }
        
        // Clean up on page unload
        window.addEventListener('beforeunload', function() {
            if (animationFrameId) {
                cancelAnimationFrame(animationFrameId);
            }
        });
    })();

    // Collection Pop-up Functionality
    $('.collection-expand-btn').on('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        
        const $btn = $(this);
        const collectionId = $btn.data('collection');
        const $card = $btn.closest('.collection-card');
        const $popup = $card.find('.collection-popup[data-popup="' + collectionId + '"]');
        const $allCards = $('.collections-showcase-section .collection-card');
        
        // Check if this card is already expanded
        const isExpanded = $card.hasClass('is-expanded');
        
        if (isExpanded) {
            // Collapse this card
            $card.removeClass('is-expanded');
            $allCards.removeClass('is-dimmed');
            
            // Smooth scroll to card top
            $('html, body').animate({
                scrollTop: $card.offset().top - 100
            }, 500);
        } else {
            // Collapse all other cards first
            $allCards.removeClass('is-expanded');
            $allCards.removeClass('is-dimmed');
            
            // Expand this card
            $card.addClass('is-expanded');
            
            // Dim other cards
            $allCards.not($card).addClass('is-dimmed');
            
            // Smooth scroll to show the expanded content
            setTimeout(function() {
                $('html, body').animate({
                    scrollTop: $card.offset().top - 50
                }, 600);
            }, 100);
        }
    });
    
    // Close pop-up when clicking outside
    $(document).on('click', function(e) {
        if (!$(e.target).closest('.collection-card').length) {
            $('.collections-showcase-section .collection-card').removeClass('is-expanded');
            $('.collections-showcase-section .collection-card').removeClass('is-dimmed');
        }
    });
    
    // Prevent pop-up from closing when clicking inside it
    $('.collection-popup').on('click', function(e) {
        e.stopPropagation();
    });

    // Clients Carousel Animation Enhancement
    if ($('#clients-carousel-track').length) {
        const $track = $('#clients-carousel-track');
        const $slides = $track.find('.client-slide');
        
        // Ensure smooth infinite loop
        $track.on('animationiteration', function() {
            // Reset position for seamless loop
            if ($track.css('animation-play-state') !== 'paused') {
                // Animation will continue seamlessly due to duplicate slides
            }
        });
        
        // Pause on hover for better UX
        $('.clients-carousel-wrapper').on('mouseenter', function() {
            $track.css('animation-play-state', 'paused');
        }).on('mouseleave', function() {
            $track.css('animation-play-state', 'running');
        });
    }

    // Chatbot Google Sign-In Handler (Works on all pages)
    let chatbotGoogleClientId = null;
    
    function initChatbotGoogleSignIn() {
        fetch('get-google-config.php')
            .then(response => response.json())
            .then(data => {
                if (data.enabled && data.client_id) {
                    chatbotGoogleClientId = data.client_id;
                    
                    // Wait for Google API
                    function waitForGoogle() {
                        if (typeof google !== 'undefined' && google.accounts && google.accounts.id) {
                            // Initialize Google Sign-In
                            google.accounts.id.initialize({
                                client_id: chatbotGoogleClientId,
                                callback: handleChatbotGoogleSignIn,
                                auto_select: false,
                                cancel_on_tap_outside: true
                            });
                            
                            // Create a hidden Google Sign-In button container
                            let hiddenGoogleBtn = document.getElementById('hidden-google-signin-btn');
                            if (!hiddenGoogleBtn) {
                                hiddenGoogleBtn = document.createElement('div');
                                hiddenGoogleBtn.id = 'hidden-google-signin-btn';
                                hiddenGoogleBtn.style.display = 'none';
                                document.body.appendChild(hiddenGoogleBtn);
                                
                                // Render Google button in hidden container
                                google.accounts.id.renderButton(hiddenGoogleBtn, {
                                    theme: 'outline',
                                    size: 'large',
                                    text: 'sign_in_with',
                                    width: 200
                                });
                            }
                            
                            // Set up chatbot circle button click
                            const chatbotCircleBtn = document.getElementById('chatbot-google-signin-circle');
                            if (chatbotCircleBtn) {
                                chatbotCircleBtn.addEventListener('click', function(e) {
                                    e.preventDefault();
                                    e.stopPropagation();
                                    
                                    // Find and click the hidden Google button
                                    setTimeout(() => {
                                        const googleBtn = hiddenGoogleBtn.querySelector('div[role="button"]');
                                        if (googleBtn) {
                                            googleBtn.click();
                                        } else {
                                            // Fallback: try prompt
                                            google.accounts.id.prompt();
                                        }
                                    }, 100);
                                });
                            }
                        } else {
                            setTimeout(waitForGoogle, 100);
                        }
                    }
                    waitForGoogle();
                } else {
                    // Hide Google Sign-In button if not configured
                    const googleSigninCircle = document.getElementById('chatbot-google-signin-circle');
                    if (googleSigninCircle) {
                        googleSigninCircle.style.display = 'none';
                    }
                }
            })
            .catch(error => {
                console.log('Google Sign-In not configured for chatbot');
                const googleSigninCircle = document.getElementById('chatbot-google-signin-circle');
                if (googleSigninCircle) {
                    googleSigninCircle.style.display = 'none';
                }
            });
    }

    function handleChatbotGoogleSignIn(response) {
        // Decode the JWT token to get user info
        const parts = response.credential.split('.');
        const payload = JSON.parse(atob(parts[1].replace(/-/g, '+').replace(/_/g, '/')));
        
        // Save to database via our API
        fetch('save-chatbot-contact.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                name: payload.name || '',
                email: payload.email || '',
                phone: '' // Google doesn't provide phone
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                // Hide Google Sign-In circle button
                const googleSigninCircle = document.getElementById('chatbot-google-signin-circle');
                if (googleSigninCircle) {
                    googleSigninCircle.classList.add('hidden');
                }
                
                // Show success message in chatbot
                const messagesDiv = document.getElementById('ai-bot-messages');
                if (messagesDiv) {
                    const successMsg = document.createElement('div');
                    successMsg.className = 'bot-msg';
                    successMsg.innerHTML = '✅ Thank you! Your contact information has been shared with us. We\'ll get in touch with you soon!';
                    messagesDiv.appendChild(successMsg);
                    messagesDiv.scrollTop = messagesDiv.scrollHeight;
                }
            } else {
                alert('Error: ' + (data.message || 'Failed to save contact information'));
            }
        })
        .catch(error => {
            console.error('Error saving contact:', error);
            alert('Error saving contact information. Please try again.');
        });
    }

    // Show/hide action buttons (WhatsApp & Google Sign-In) when chat opens/closes
    $("#ai-bot-trigger").on("click", function () {
        setTimeout(function() {
            const chatBot = $("#ai-bot");
            const googleCircle = $("#chatbot-google-signin-circle");
            const whatsappCircle = $("#chatbot-whatsapp-circle");
            const phoneCircle = $("#chatbot-phone-circle");
            
            if (chatBot.hasClass("open")) {
                // Chat is open, show buttons above it (higher position to avoid overlay with close button)
                googleCircle.addClass('show');
                googleCircle.css({
                    'bottom': '530px',
                    'right': '30px'
                });
                
                whatsappCircle.addClass('show');
                whatsappCircle.css({
                    'bottom': '530px',
                    'right': '100px'
                });
                
                phoneCircle.addClass('show');
                phoneCircle.css({
                    'bottom': '530px',
                    'right': '170px'
                });
            } else {
                // Chat is closed, hide buttons
                googleCircle.removeClass('show');
                whatsappCircle.removeClass('show');
                phoneCircle.removeClass('show');
            }
        }, 100);
    });

    // Initialize chatbot Google Sign-In when page loads
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(initChatbotGoogleSignIn, 1000);
        });
    } else {
        setTimeout(initChatbotGoogleSignIn, 1000);
    }

    /* ===================================
       PRODUCT ENQUIRY BUTTON HANDLER
       Handles product enquiry buttons on category pages
    ==================================== */
    $(document).on('click', '.product-enquire-btn', function(e) {
        e.preventDefault();
        
        const $button = $(this);
        const productName = $button.data('product-name') || '';
        const productCategory = $button.data('product-category') || '';
        
        // Check if user is signed in with Google (has user data)
        const userData = JSON.parse(localStorage.getItem('userData') || '{}');
        
        if (userData.name && userData.email) {
            // User is signed in, submit enquiry directly
            submitProductEnquiry({
                name: userData.name,
                email: userData.email,
                phone: userData.phone || '',
                productName: productName,
                productCategory: productCategory
            });
        } else {
            // User not signed in, redirect to enquire page with product info
            const params = new URLSearchParams();
            if (productName) params.set('product', encodeURIComponent(productName));
            if (productCategory) params.set('category', encodeURIComponent(productCategory));
            
            window.location.href = 'enquire.html' + (params.toString() ? '?' + params.toString() : '');
        }
    });
    
    function submitProductEnquiry(data) {
        // Show loading state
        const $button = $('.product-enquire-btn[data-product-name="' + data.productName + '"]');
        const originalText = $button.html();
        $button.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Submitting...');
        
        // Create message with product info
        let message = `I am interested in ${data.productName}`;
        if (data.productCategory) {
            message += ` from the ${data.productCategory} category`;
        }
        message += '. Please provide more information.';
        
        // Submit enquiry
        $.ajax({
            url: 'submit-enquiry.php',
            type: 'POST',
            data: {
                name: data.name,
                email: data.email,
                phone: data.phone,
                message: message,
                product_name: data.productName,
                product_category: data.productCategory
            },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    // Show success message
                    showProductEnquiryMessage('success', response.message || 'Thank you! Your enquiry has been submitted successfully.');
                    $button.html('<i class="fas fa-check"></i> Enquiry Sent');
                    
                    // Reset button after 3 seconds
                    setTimeout(function() {
                        $button.prop('disabled', false).html(originalText);
                    }, 3000);
                } else {
                    // Show error message
                    showProductEnquiryMessage('error', response.message || 'Failed to submit enquiry. Please try again.');
                    $button.prop('disabled', false).html(originalText);
                }
            },
            error: function(xhr, status, error) {
                console.error('Enquiry submission error:', error);
                showProductEnquiryMessage('error', 'An error occurred. Please try again or visit the Enquire page.');
                $button.prop('disabled', false).html(originalText);
            }
        });
    }
    
    function showProductEnquiryMessage(type, message) {
        // Remove existing message if any
        $('.product-enquiry-message').remove();
        
        // Create message element
        const $message = $('<div class="product-enquiry-message ' + (type === 'success' ? 'product-enquiry-success' : 'product-enquiry-error') + '">' + message + '</div>');
        $('body').append($message);
        
        // Show message
        setTimeout(function() {
            $message.addClass('show');
        }, 100);
        
        // Hide message after 5 seconds
        setTimeout(function() {
            $message.removeClass('show');
            setTimeout(function() {
                $message.remove();
            }, 300);
        }, 5000);
    }

});