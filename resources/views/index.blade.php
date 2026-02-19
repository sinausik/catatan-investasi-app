<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catatan Investasi</title>
    <link rel="icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">

    <!-- Navbar -->
    <nav class="bg-white shadow-sm">
        <div class="max-w-6xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-xl font-bold text-indigo-600">
                Catatan Investasi
            </h1>

            <div class="space-x-4">
                <a href="/admin/login" class="text-gray-600 hover:text-indigo-600">
                    Login
                </a>
                <a href="#fitur"
                   class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">
                    Daftar
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <section class="py-20">
        <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-10 items-center">
            <div>
                <h2 class="text-4xl md:text-5xl font-bold leading-tight">
                    Kelola Portfolio Investasi
                    <span class="text-indigo-600">Dengan Mudah</span>
                </h2>

                <p class="mt-6 text-lg text-gray-600">
                    Pantau saham, emas, dan crypto dalam satu dashboard.
                    Update harga otomatis dari Yahoo & Treasury.
                </p>

                <div class="mt-8 space-x-4">
                    <a href="#fitur"
                       class="bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700 transition">
                        Mulai Sekarang
                    </a>

                    <a href="#fitur"
                       class="border border-gray-300 px-6 py-3 rounded-lg hover:bg-gray-100 transition">
                        Lihat Fitur
                    </a>
                </div>
            </div>

            <div>
                <div class="bg-white shadow-xl rounded-2xl p-6">
                    <div class="h-4 bg-gray-200 rounded mb-4 w-1/3"></div>
                    <div class="h-4 bg-gray-200 rounded mb-4"></div>
                    <div class="h-4 bg-gray-200 rounded mb-4"></div>
                    <div class="h-4 bg-gray-200 rounded mb-4"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features -->
    <section id="fitur" class="bg-white py-20">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h3 class="text-3xl font-bold mb-12">
                Fitur Utama
            </h3>

            <div class="grid md:grid-cols-3 gap-10">
                <div class="p-6 rounded-xl shadow-sm border">
                    <h4 class="text-xl font-semibold mb-3">
                        Multi Asset
                    </h4>
                    <p class="text-gray-600">
                        Saham, emas, dan crypto dalam satu sistem.
                    </p>
                </div>

                <div class="p-6 rounded-xl shadow-sm border">
                    <h4 class="text-xl font-semibold mb-3">
                        Auto Price Update
                    </h4>
                    <p class="text-gray-600">
                        Sinkronisasi harga dari Yahoo & Treasury API.
                    </p>
                </div>

                <div class="p-6 rounded-xl shadow-sm border">
                    <h4 class="text-xl font-semibold mb-3">
                        Tracking Portfolio
                    </h4>
                    <p class="text-gray-600">
                        Hitung profit, loss, dan total nilai investasi.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-20 bg-indigo-600 text-white text-center">
        <div class="max-w-4xl mx-auto px-6">
            <h3 class="text-3xl font-bold">
                Siap Mengelola Investasimu Lebih Rapi?
            </h3>

            <p class="mt-4 text-lg text-indigo-100">
                Buat akun gratis dan mulai catat portfolio sekarang.
            </p>

            <a href="https://www.rchtechno.com/contact/"
               class="inline-block mt-8 bg-white text-indigo-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                Daftar Gratis
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-400 py-6 text-center text-sm">
        © {{ date('Y') }} Catatan Investasi. All rights reserved. | Powered by RCH Techno
    </footer>

</body>
</html>