<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Keputusan Fuzzy</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-2xl">
        <!-- Card Container -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-8">

            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-2xl font-semibold text-gray-900 mb-2">
                    Hasil Sistem Pendukung Keputusan
                </h1>
                <p class="text-sm text-gray-600">
                    Kelayakan Peminjaman Buku Perpustakaan
                </p>
            </div>

            <!-- Input Data Section -->
            <div class="mb-8">
                <h2 class="text-lg font-medium text-gray-900 mb-4">Data Input</h2>
                <div class="bg-gray-50 rounded-lg p-4 space-y-3">
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">Jumlah Buku</span>
                        <span class="text-sm font-medium text-gray-900">{{ $jumlahBuku }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">Keterlambatan</span>
                        <span class="text-sm font-medium text-gray-900">{{ $keterlambatan }} hari</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">Frekuensi</span>
                        <span class="text-sm font-medium text-gray-900">{{ $frekuensi }} kali/bulan</span>
                    </div>
                </div>
            </div>

            <!-- Result Section -->
            <div class="mb-8">
                <h2 class="text-lg font-medium text-gray-900 mb-4">Hasil Perhitungan</h2>

                <!-- Nilai Kelayakan -->
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 mb-4">
                    <p class="text-sm text-blue-600 mb-1">Nilai Kelayakan</p>
                    <p class="text-3xl font-bold text-blue-700">{{ number_format($hasil, 2) }}</p>
                </div>

                <!-- Keputusan -->
                <div class="bg-green-50 border border-green-200 rounded-lg p-6">
                    <p class="text-sm text-green-600 mb-1">Keputusan</p>
                    <p class="text-xl font-semibold text-green-700">{{ $keputusan }}</p>
                </div>
            </div>

            <!-- Back Button -->
            <a href="/"
                class="inline-flex items-center justify-center w-full bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-2.5 rounded-lg transition duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali ke Form
            </a>
        </div>
    </div>

</body>

</html>
