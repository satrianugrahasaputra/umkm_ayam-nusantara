<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', $seoTitle ?? 'Ayam Nusantara Victoria | Authentic Indonesian Chicken')</title>
    <meta name="description" content="@yield('meta_description', $seoDescription ?? 'Nikmati cita rasa ayam nusantara dengan resep khas dan bumbu autentik di Semarang.')">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', $seoTitle ?? 'Ayam Nusantara Victoria')">
    <meta property="og:description" content="@yield('meta_description', $seoDescription ?? 'Nikmati cita rasa ayam nusantara dengan resep khas dan bumbu autentik.')">
    <meta property="og:image" content="{{ asset('images/og-image.jpg') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind & Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine.js is included in resources/js/app.js by default in Laravel 12 / Breeze -->

    <!-- Local Business Schema -->
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "FoodEstablishment",
      "name": "Ayam Nusantara Victoria",
      "image": "{{ asset('images/og-image.jpg') }}",
      "telephone": "0812-3486-3389",
      "priceRange": "Rp 25.000–50.000",
      "servesCuisine": "Indonesian Chicken Cuisine",
      "address": {
        "@@type": "PostalAddress",
        "streetAddress": "Ruko Adivasa, Jl. Roda Mas Southpark 2 No.18, Panggung Lor, Kecamatan Semarang Utara",
        "addressLocality": "Kota Semarang",
        "addressRegion": "Jawa Tengah",
        "postalCode": "50177",
        "addressCountry": "ID"
      },
      "geo": {
        "@@type": "GeoCoordinates",
        "latitude": -6.953833,
        "longitude": 110.407983
      },
      "openingHoursSpecification": {
        "@@type": "OpeningHoursSpecification",
        "dayOfWeek": [
          "Monday",
          "Tuesday",
          "Wednesday",
          "Thursday",
          "Friday",
          "Saturday",
          "Sunday"
        ],
        "opens": "10:00",
        "closes": "21:00"
      },
      "aggregateRating": {
        "@@type": "AggregateRating",
        "ratingValue": "4.8",
        "reviewCount": "63"
      }
    }
    </script>
</head>
<body class="font-sans bg-brand-accent/30 text-gray-800 antialiased min-h-screen flex flex-col" x-data="{ mobileMenuOpen: false }">

    <!-- Header Navbar -->
    <header class="sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b border-brand-primary/10 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="{{ route('home') }}" class="flex items-center gap-2">
                        <span class="text-2xl font-extrabold text-brand-primary font-poppins tracking-wider flex items-center">
                            AYAM <span class="text-brand-secondary ml-1.5">NUSANTARA</span>
                        </span>
                    </a>
                </div>

                <!-- Desktop Nav -->
                <nav class="hidden md:flex space-x-8 text-sm font-semibold tracking-wide uppercase">
                    <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-brand-primary border-b-2 border-brand-primary' : 'text-gray-600 hover:text-brand-primary' }} pb-1 transition-colors duration-200">Home</a>
                    <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'text-brand-primary border-b-2 border-brand-primary' : 'text-gray-600 hover:text-brand-primary' }} pb-1 transition-colors duration-200">About Us</a>
                    <a href="{{ route('menu') }}" class="{{ request()->routeIs('menu') ? 'text-brand-primary border-b-2 border-brand-primary' : 'text-gray-600 hover:text-brand-primary' }} pb-1 transition-colors duration-200">Menu</a>
                    <a href="{{ route('reviews') }}" class="{{ request()->routeIs('reviews') ? 'text-brand-primary border-b-2 border-brand-primary' : 'text-gray-600 hover:text-brand-primary' }} pb-1 transition-colors duration-200">Reviews</a>
                    <a href="{{ route('gallery') }}" class="{{ request()->routeIs('gallery') ? 'text-brand-primary border-b-2 border-brand-primary' : 'text-gray-600 hover:text-brand-primary' }} pb-1 transition-colors duration-200">Gallery</a>
                    <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'text-brand-primary border-b-2 border-brand-primary' : 'text-gray-600 hover:text-brand-primary' }} pb-1 transition-colors duration-200">Contact</a>
                </nav>

                <!-- Action CTA -->
                <div class="hidden lg:flex items-center gap-4">
                    <a href="https://wa.me/6281234863389" target="_blank" class="bg-brand-primary hover:bg-brand-primary/95 text-white px-5  py-2.5 rounded-full font-bold shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all text-sm flex items-center gap-2">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.514 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.502-5.724-1.455L0 24zm6.59-4.846c1.6.95 3.188 1.449 4.825 1.451 5.436 0 9.86-4.37 9.864-9.799.002-2.63-1.023-5.101-2.885-6.968C16.63 1.97 14.162 1.05 11.59 1.05c-5.442 0-9.87 4.372-9.874 9.802-.001 1.782.478 3.524 1.39 5.074l-1.014 3.705 3.84-.988c1.558.85 3.112 1.285 4.705 1.285zm11.387-7.731c-.301-.151-1.784-.879-2.057-.978-.275-.099-.475-.149-.675.151-.199.3-.775.979-.95 1.178-.176.2-.351.224-.652.075-3.007-1.503-4.379-2.514-5.698-4.782-.351-.6-.351-1.002-.15-1.202.18-.179.402-.474.602-.712.2-.237.266-.4.4-.666.133-.267.067-.5-.034-.7-.101-.2-.676-1.629-.925-2.227-.244-.588-.492-.51-.675-.519-.176-.008-.376-.01-.577-.01-.2 0-.527.075-.803.376-.276.3-.1.547-.1.745s.124 1.284 1.348 2.508c1.224 1.224 2.508 1.348 2.508 1.348h.001c.198.1.446.076.645-.124 1.224-1.224 1.348-1.348 1.348-1.348h.001c.2-.2.527-.075.803-.075.276 0 .526.075.802.276.276.2.3.527.3.745s-.075.645-.224.95c-.15.3-.645.776-1.178 1.178-.533.402-1.002.351-1.202.15z"/></svg>
                        Order via WhatsApp
                    </a>
                </div>

                <!-- Hamburger -->
                <div class="flex items-center md:hidden">
                    <button x-on:click="mobileMenuOpen = !mobileMenuOpen" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-500 hover:text-brand-primary hover:bg-gray-100 focus:outline-none transition" aria-controls="mobile-menu" aria-expanded="false">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': mobileMenuOpen, 'inline-flex': !mobileMenuOpen }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': !mobileMenuOpen, 'inline-flex': mobileMenuOpen }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="mobileMenuOpen" class="md:hidden bg-white border-t border-brand-primary/10" id="mobile-menu" x-on:click.away="mobileMenuOpen = false">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 text-center">
                <a href="{{ route('home') }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('home') ? 'bg-brand-primary text-white' : 'text-gray-700 hover:bg-brand-accent/50 hover:text-brand-primary' }}">Home</a>
                <a href="{{ route('about') }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('about') ? 'bg-brand-primary text-white' : 'text-gray-700 hover:bg-brand-accent/50 hover:text-brand-primary' }}">About Us</a>
                <a href="{{ route('menu') }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('menu') ? 'bg-brand-primary text-white' : 'text-gray-700 hover:bg-brand-accent/50 hover:text-brand-primary' }}">Menu</a>
                <a href="{{ route('reviews') }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('reviews') ? 'bg-brand-primary text-white' : 'text-gray-700 hover:bg-brand-accent/50 hover:text-brand-primary' }}">Reviews</a>
                <a href="{{ route('gallery') }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('gallery') ? 'bg-brand-primary text-white' : 'text-gray-700 hover:bg-brand-accent/50 hover:text-brand-primary' }}">Gallery</a>
                <a href="{{ route('contact') }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('contact') ? 'bg-brand-primary text-white' : 'text-gray-700 hover:bg-brand-accent/50 hover:text-brand-primary' }}">Contact</a>
                <div class="pt-4 pb-2">
                    <a href="https://wa.me/6281234863389" target="_blank" class="w-full inline-flex justify-center items-center bg-brand-primary text-white px-5 py-3 rounded-full font-bold shadow-md text-sm gap-2">
                        Order via WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-brand-dark text-white border-t-4 border-brand-secondary mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Branding -->
                <div class="md:col-span-1 space-y-4">
                    <span class="text-2xl font-extrabold text-white tracking-wider font-poppins">
                        AYAM <span class="text-brand-secondary">NUSANTARA</span>
                    </span>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        Menyajikan cita rasa autentik hidangan ayam tradisional khas Indonesia dengan resep otentik warisan leluhur.
                    </p>
                    <div class="flex items-center gap-2">
                        <span class="bg-brand-secondary text-brand-dark text-xs font-bold px-2.5 py-1 rounded">★ 4.8 / 5 Rating</span>
                    </div>
                </div>

                <!-- Navigation Links -->
                <div class="space-y-4">
                    <h3 class="text-brand-secondary font-bold text-lg uppercase font-poppins">Quick Links</h3>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="{{ route('home') }}" class="hover:text-white transition">Home</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-white transition">About Us</a></li>
                        <li><a href="{{ route('menu') }}" class="hover:text-white transition">Our Menu</a></li>
                        <li><a href="{{ route('reviews') }}" class="hover:text-white transition">Customer Reviews</a></li>
                        <li><a href="{{ route('gallery') }}" class="hover:text-white transition">Gallery Showcase</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-white transition">Contact Us</a></li>
                    </ul>
                </div>

                <!-- Open Hours -->
                <div class="space-y-4">
                    <h3 class="text-brand-secondary font-bold text-lg uppercase font-poppins">Opening Hours</h3>
                    <p class="text-sm text-gray-400 leading-relaxed">
                        Kami buka setiap hari untuk melayani Anda:<br>
                        <span class="text-white font-semibold">10:00 – 21:00 WIB</span>
                    </p>
                    <div class="mt-4">
                        <span class="text-xs text-gray-500 uppercase tracking-widest block mb-2">Layanan kami:</span>
                        <div class="flex flex-wrap gap-2 text-xs">
                            <span class="bg-white/10 text-white px-2.5 py-1 rounded">Dine In</span>
                            <span class="bg-white/10 text-white px-2.5 py-1 rounded">Pickup</span>
                            <span class="bg-white/10 text-white px-2.5 py-1 rounded">Online Order</span>
                        </div>
                    </div>
                </div>

                <!-- Contact & Address -->
                <div class="space-y-4">
                    <h3 class="text-brand-secondary font-bold text-lg uppercase font-poppins">Contact Info</h3>
                    <p class="text-sm text-gray-400 leading-relaxed">
                        <strong class="text-white">Alamat:</strong><br>
                        Ruko Adivasa, Jl. Roda Mas Southpark 2 No.18, Panggung Lor, Semarang Utara, Kota Semarang 50177
                    </p>
                    <p class="text-sm text-gray-400">
                        <strong class="text-white">Telepon:</strong><br>
                        <a href="tel:081234863389" class="hover:text-brand-secondary transition">0812-3486-3389</a>
                    </p>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div class="border-t border-white/10 mt-12 pt-6 text-center text-xs text-gray-500 flex flex-col sm:flex-row items-center justify-between gap-4">
                <p>&copy; {{ date('Y') }} Ayam Nusantara Victoria. All Rights Reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
