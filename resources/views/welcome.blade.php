<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Swabuana - Dashboard</title>
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    :root {
      --color-primary: #1e40af;
      --color-primary-light: #3b82f6;
      --color-bg: #eff6ff;
    }
  </style>
</head>
<body class="bg-[#eff6ff] text-[#1e40af] font-sans min-h-screen flex flex-col">
  <!-- navbar.php -->
<header class="bg-[#1e3a8a] text-white flex justify-between items-center px-6 py-4 shadow-md">
  <div class="text-2xl font-bold">Swabuana</div>
  <nav class="space-x-6">
    <a href="dashboard.php" class="hover:underline hover:text-[#bfdbfe] font-semibold">Dashboard</a>
    <a href="pengiriman.php" class="hover:underline hover:text-[#bfdbfe] font-semibold">Pengiriman</a>
    <a href="laporan.php" class="hover:underline hover:text-[#bfdbfe] font-semibold">Laporan</a>
    <a href="akun.php" class="hover:underline hover:text-[#bfdbfe] font-semibold">Akun</a>
  </nav>
</header>

  <main class="flex-grow max-w-7xl mx-auto px-6 py-10">
    <h1 class="text-4xl font-extrabold mb-8">Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
      <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-semibold mb-2 text-[#1e40af]">Total Kiriman Hari Ini</h2>
        <p class="text-gray-700 text-lg">125 Paket</p>
      </div>
      <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-semibold mb-2 text-[#1e40af]">Paket Dalam Perjalanan</h2>
        <p class="text-gray-700 text-lg">43 Paket</p>
      </div>
      <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-semibold mb-2 text-[#1e40af]">Paket Terkirim</h2>
        <p class="text-gray-700 text-lg">97 Paket</p>
      </div>
      <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-semibold mb-2 text-[#1e40af]">Penghasilan Bulan Ini</h2>
        <p class="text-gray-700 text-lg">Rp 35.000.000</p>
      </div>
    </div>

    <!-- Track Paket Section -->
    <section>
      <h2 class="text-3xl font-semibold mb-6 text-[#1e40af]">Lacak Paket</h2>

      <!-- Form Input Nomor Resi -->
      <form id="trackForm" class="mb-8 flex max-w-md gap-4">
        <input
          type="text"
          id="trackingNumber"
          name="trackingNumber"
          placeholder="Masukkan Nomor Resi"
          required
          class="flex-grow px-4 py-2 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
        />
        <button
          type="submit"
          class="bg-[#1e40af] hover:bg-[#3b82f6] text-white px-6 rounded font-semibold transition"
        >
          Lacak
        </button>
      </form>

      <!-- Tabel Tracking (Dummy Data) -->
      <div class="overflow-x-auto bg-white rounded-lg shadow-md">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-[#1e40af] text-white">
            <tr>
              <th class="px-6 py-3 text-left text-sm font-semibold">Nomor Resi</th>
              <th class="px-6 py-3 text-left text-sm font-semibold">Status</th>
              <th class="px-6 py-3 text-left text-sm font-semibold">Lokasi Terakhir</th>
              <th class="px-6 py-3 text-left text-sm font-semibold">Tanggal Update</th>
            </tr>
          </thead>
          <tbody id="trackingTableBody" class="divide-y divide-gray-200">
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">SWB123456789</td>
              <td class="px-6 py-4 whitespace-nowrap text-blue-600 font-semibold">Dalam Perjalanan</td>
              <td class="px-6 py-4 whitespace-nowrap">Jakarta</td>
              <td class="px-6 py-4 whitespace-nowrap">19 Mei 2025</td>
            </tr>
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">SWB987654321</td>
              <td class="px-6 py-4 whitespace-nowrap text-green-600 font-semibold">Terkirim</td>
              <td class="px-6 py-4 whitespace-nowrap">Bandung</td>
              <td class="px-6 py-4 whitespace-nowrap">18 Mei 2025</td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>
  </main>

  <footer class="bg-[#1e3a8a] text-white text-center py-4 mt-10">
    &copy; 2025 Swabuana. All rights reserved.
  </footer>

  <script>
    const form = document.getElementById('trackForm');
    const tableBody = document.getElementById('trackingTableBody');

    form.addEventListener('submit', function(event) {
      event.preventDefault();
      const trackingNumber = document.getElementById('trackingNumber').value.trim();
      if (!trackingNumber) return;

      // Contoh data dummy yang bisa dikembangkan dengan fetch API ke backend
      const dummyData = {
        SWB123456789: {
          status: 'Dalam Perjalanan',
          lokasi: 'Jakarta',
          tanggal: '19 Mei 2025'
        },
        SWB987654321: {
          status: 'Terkirim',
          lokasi: 'Bandung',
          tanggal: '18 Mei 2025'
        }
      };

      const data = dummyData[trackingNumber.toUpperCase()];

      if (data) {
        tableBody.innerHTML = `
          <tr>
            <td class="px-6 py-4 whitespace-nowrap">${trackingNumber.toUpperCase()}</td>
            <td class="px-6 py-4 whitespace-nowrap ${
              data.status === 'Terkirim' ? 'text-green-600' : 'text-blue-600'
            } font-semibold">${data.status}</td>
            <td class="px-6 py-4 whitespace-nowrap">${data.lokasi}</td>
            <td class="px-6 py-4 whitespace-nowrap">${data.tanggal}</td>
          </tr>
        `;
      } else {
        tableBody.innerHTML = `
          <tr>
            <td colspan="4" class="px-6 py-4 text-center text-red-600 font-semibold">
              Nomor resi tidak ditemukan.
            </td>
          </tr>
        `;
      }

      form.reset();
    });
  </script>
</body>
</html>
