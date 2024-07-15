<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BetaMovies - @yield('title')</title>

    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ url('icons/video.png') }}" type="image/x-icon">

    {{-- bootstrap cdn --}}
    {{-- <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}"> --}}
    <link href="{{ url('css/custom.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ url('css/style.css') }}">

    {{-- Carouse Slider --}}
    <link rel="stylesheet"
        href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css') }}"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet"
        href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css') }}"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    @include('layouts._header')
    <br><br>

    @if (session('error'))
        <h6 class="alert alert-danger text-center" style="font-weight: normal;">
            {{ session('error') }}</h6>
    @endif

    @yield('content')

    @include('layouts._footer')

    {{-- Carousel CDN --}}
    <script>
        (() => {
            'use strict'

            const getStoredTheme = () => localStorage.getItem('theme')
            const setStoredTheme = theme => localStorage.setItem('theme', theme)

            const getPreferredTheme = () => {
                const storedTheme = getStoredTheme()
                if (storedTheme) {
                    return storedTheme
                }

                return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
            }

            const setTheme = theme => {
                if (theme === 'auto') {
                    document.documentElement.setAttribute('data-bs-theme', (window.matchMedia(
                        '(prefers-color-scheme: dark)').matches ? 'dark' : 'light'))
                } else {
                    document.documentElement.setAttribute('data-bs-theme', theme)
                }
            }

            setTheme(getPreferredTheme())

            const showActiveTheme = (theme, focus = false) => {
                const themeSwitcher = document.querySelector('.dropdown-menu')

                if (!themeSwitcher) {
                    return
                }

                const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`)

                document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
                    element.classList.remove('active')
                    element.setAttribute('aria-pressed', 'false')
                })

                btnToActive.classList.add('active')
                btnToActive.setAttribute('aria-pressed', 'true')

                if (focus) {
                    btnToActive.focus()
                }
            }

            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
                const storedTheme = getStoredTheme()
                if (storedTheme !== 'light' && storedTheme !== 'dark') {
                    setTheme(getPreferredTheme())
                }
            })

            window.addEventListener('DOMContentLoaded', () => {
                showActiveTheme(getPreferredTheme())

                document.querySelectorAll('[data-bs-theme-value]')
                    .forEach(toggle => {
                        toggle.addEventListener('click', () => {
                            const theme = toggle.getAttribute('data-bs-theme-value')
                            setStoredTheme(theme)
                            setTheme(theme)
                            showActiveTheme(theme, true)
                        })
                    })
            })
        })()
    </script>
    <script src="{{ url('js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js') }}"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ url('js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ url('js/script.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js"
        integrity="sha512-jNDtFf7qgU0eH/+Z42FG4fw3w7DM/9zbgNPe3wfJlCylVDTT3IgKW5r92Vy9IHa6U50vyMz5gRByIu4YIXFtaQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- <script>
        $(document).ready(function() {
            $("img").lazyload();
        });
    </script> --}}
    <script>
        // Create an Intersection Observer instance
        let observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    // Load the image when it comes into view
                    entry.target.src = entry.target.dataset.src;
                    observer.unobserve(entry.target); // Stop observing once loaded
                }
            });
        });

        // Select all images with data-src attribute
        document.querySelectorAll('img[data-src]').forEach(img => {
            observer.observe(img); // Start observing each image
        });

        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
</body>

</html>
