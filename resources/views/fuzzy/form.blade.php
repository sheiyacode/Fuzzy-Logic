<!DOCTYPE html>
<html>

<head>
    <title>Sistem Kelayakan Peminjaman Buku</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-md">
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-8">
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-2xl font-semibold text-gray-900 mb-2 text-center">
                    Kelayakan Peminjaman Buku
                </h1>
                <p class="text-sm text-gray-600 text-center">
                    Sistem Pendukung Keputusan Perpustakaan
                </p>
            </div>

            <form action="{{ route('fuzzy.proses') }}" method="post">
                @csrf
                <div>
                    <label for="jumlah_buku" class="block text-sm font-medium text-gray-700 mb-2">
                        Jumlah Buku yang Sedang Dipinjam
                    </label>
                    <input type="number" id="jumlah_buku" name="jumlah_buku" min="0" max="5" required
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition"
                        placeholder="0 - 5">
                </div>

                <!-- Late Days -->
                <div>
                    <label for="keterlambatan" class="block text-sm font-medium text-gray-700 mb-2">
                        Jumlah Hari Keterlambatan
                    </label>
                    <input type="number" id="keterlambatan" name="keterlambatan" min="0" max="14" required
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition"
                        placeholder="0 - 14 hari">
                </div>

                <!-- Frequency -->
                <div>
                    <label for="frekuensi" class="block text-sm font-medium text-gray-700 mb-2">
                        Frekuensi Peminjaman (per bulan)
                    </label>
                    <input type="number" id="frekuensi" name="frekuensi" min="0" max="10" required
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition"
                        placeholder="0 - 10 kali">
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full mt-4 bg-blue-600 hover:bg-blue-700 text-white font-medium py-2.5 rounded-lg transition duration-200">
                    Proses Fuzzy
                </button>
            </form>
        </div>
    </div>

</body>

</html>
