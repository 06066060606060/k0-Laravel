<!DOCTYPE html>
<html lang="fr">

<head>
    @include('parts.head')
</head>

<body class="overflow-x-hidden bg-gray-900 pattern" data-barba="wrapper">
    <navbar>
        @include('parts.navbar')
    </navbar>
    <main>
        @yield('main')
    </main>
    <footer>  
        @include('parts.footer')
    </footer>
    @vite('resources/js/app.js')  

    <script src="https://cdn.jsdelivr.net/npm/@barba/core"></script>
    <script>
       barba.init();
        barba.hooks.afterEnter((data) => {
        const swiper = new Swiper('.swiper-container', {
            loop: true,
            slidesPerView: 1.5,
            spaceBetween: 24,
            centeredSlides: true,
            autoplay: {
                delay: 8000,
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                },
                800: {
                    slidesPerView: 3,
                },
                1100: {
                    slidesPerView: 4,
                },
            },
        })
});

 document.addEventListener('DOMContentLoaded', function() {
        const swiper = new Swiper('.swiper-container', {
            loop: true,
            slidesPerView: 1.5,
            spaceBetween: 24,
            centeredSlides: true,
            autoplay: {
                delay: 8000,
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                },
                800: {
                    slidesPerView: 3,
                },
                1100: {
                    slidesPerView: 4,
                },
            },
        })
    })
    </script>
</body>
</html>
