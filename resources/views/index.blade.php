<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waste Management Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'slide-up': 'slideUp 0.6s ease-out',
                        'bounce-slow': 'bounce 2s infinite',
                        'pulse-slow': 'pulse 3s infinite'
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0', transform: 'translateY(10px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        },
                        slideUp: {
                            '0%': { opacity: '0', transform: 'translateY(30px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="min-h-screen bg-gradient-to-br from-indigo-900 via-purple-900 to-pink-800 p-4">
    <!-- Floating Background Elements -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-10 left-10 w-20 h-20 bg-white/10 rounded-full animate-bounce-slow"></div>
        <div class="absolute top-32 right-20 w-16 h-16 bg-blue-300/20 rounded-full animate-pulse-slow"></div>
        <div class="absolute bottom-20 left-1/4 w-12 h-12 bg-green-300/15 rounded-full animate-bounce-slow" style="animation-delay: 1s"></div>
        <div class="absolute bottom-40 right-1/3 w-8 h-8 bg-yellow-300/20 rounded-full animate-pulse-slow" style="animation-delay: 2s"></div>
    </div>

    <div class="container mx-auto max-w-7xl relative z-10">
        <!-- Header Section -->
        <div class="text-center mb-8 animate-fade-in">
            <div class="bg-white/10 backdrop-blur-lg rounded-3xl p-8 border border-white/20 shadow-2xl">
                <div class="flex items-center justify-center gap-4 mb-4">
                    <div class="bg-gradient-to-r from-green-400 to-blue-500 p-4 rounded-2xl">
                        <i class="fas fa-recycle text-3xl text-white"></i>
                    </div>
                    <h1 class="text-4xl md:text-5xl font-bold text-white">
                        Waste Management
                    </h1>
                </div>
                <p class="text-white/80 text-lg">Sistem Pengelolaan Sampah Terintegrasi</p>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 border border-white/20 hover:bg-white/20 transition-all duration-300 hover:scale-105 animate-slide-up">
                <div class="flex items-center gap-4">
                    <div class="bg-gradient-to-r from-green-400 to-emerald-500 p-3 rounded-xl">
                        <i class="fas fa-leaf text-2xl text-white"></i>
                    </div>
                    <div>
                        <div class="text-2xl font-bold text-white">{{ number_format($totalOrganik, 2) }}</div>
                        <div class="text-white/70 text-sm">Total Organik</div>
                    </div>
                </div>
            </div>
            
            <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 border border-white/20 hover:bg-white/20 transition-all duration-300 hover:scale-105 animate-slide-up" style="animation-delay: 0.1s">
                <div class="flex items-center gap-4">
                    <div class="bg-gradient-to-r from-blue-400 to-cyan-500 p-3 rounded-xl">
                        <i class="fas fa-bottle-water text-2xl text-white"></i>
                    </div>
                    <div>
                        <div class="text-2xl font-bold text-white">{{ number_format($totalPlastik, 2) }}</div>
                        <div class="text-white/70 text-sm">Total Plastik</div>
                    </div>
                </div>
            </div>
            
            <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 border border-white/20 hover:bg-white/20 transition-all duration-300 hover:scale-105 animate-slide-up" style="animation-delay: 0.2s">
                <div class="flex items-center gap-4">
                    <div class="bg-gradient-to-r from-yellow-400 to-orange-500 p-3 rounded-xl">
                        <i class="fas fa-hammer text-2xl text-white"></i>
                    </div>
                    <div>
                        <div class="text-2xl font-bold text-white">{{ number_format($totalLogam, 2) }}</div>
                        <div class="text-white/70 text-sm">Total Logam</div>
                    </div>
                </div>
            </div>
            
            <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 border border-white/20 hover:bg-white/20 transition-all duration-300 hover:scale-105 animate-slide-up" style="animation-delay: 0.3s">
                <div class="flex items-center gap-4">
                    <div class="bg-gradient-to-r from-purple-400 to-pink-500 p-3 rounded-xl">
                        <i class="fas fa-users text-2xl text-white"></i>
                    </div>
                    <div>
                        <div class="text-2xl font-bold text-white">{{ $totalNasabah }}</div>
                        <div class="text-white/70 text-sm">Total Nasabah</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Form Section -->
            <div class="lg:col-span-2">
                <div class="bg-white/10 backdrop-blur-lg rounded-3xl p-8 border border-white/20 shadow-2xl animate-slide-up">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="bg-gradient-to-r from-green-400 to-blue-500 p-3 rounded-xl">
                            <i class="fas fa-plus-circle text-xl text-white"></i>
                        </div>
                        <h4 class="text-2xl font-bold text-white">Input Data Sampah</h4>
                    </div>
                    
                    <form method="POST" action="{{ route('waste.store') }}" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="flex items-center gap-2 text-white font-semibold">
                                    <i class="fas fa-user text-blue-400"></i>
                                    Nama Nasabah
                                </label>
                                <input type="text" name="customer" class="w-full bg-white/90 backdrop-blur border-2 border-white/30 rounded-xl px-4 py-3 text-gray-800 focus:border-blue-400 focus:bg-white focus:outline-none transition-all duration-300 hover:bg-white" placeholder="Masukkan Nama Nasabah" required>
                            </div>
                            
                            <div class="space-y-2">
                                <label class="flex items-center gap-2 text-white font-semibold">
                                    <i class="fas fa-map-marker-alt text-red-400"></i>
                                    Wilayah
                                </label>
                                <select name="region" class="w-full bg-white/90 backdrop-blur border-2 border-white/30 rounded-xl px-4 py-3 text-gray-800 focus:border-blue-400 focus:bg-white focus:outline-none transition-all duration-300 hover:bg-white">
                                    <option value="" disabled selected>Pilih wilayah</option>
                                    <option value="DKI Jakarta">DKI Jakarta</option>
                                    <option value="Jawa Barat">Jawa Barat</option>
                                    <option value="Jawa Tengah">Jawa Tengah</option>
                                    <option value="Jawa Timur">Jawa Timur</option>
                                    <option value="Sumatera Utara">Sumatera Utara</option>
                                    <option value="Sumatera Barat">Sumatera Barat</option>
                                    <option value="Kalimantan Timur">Kalimantan Timur</option>
                                    <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                                    <option value="Bali">Bali</option>
                                    <option value="Papua">Papua</option>
                                </select>
                            </div>
                            
                            <div class="space-y-2">
                                <label class="flex items-center gap-2 text-white font-semibold">
                                    <i class="fas fa-trash text-green-400"></i>
                                    Jenis Sampah
                                </label>
                                <select name="waste_type" class="w-full bg-white/90 backdrop-blur border-2 border-white/30 rounded-xl px-4 py-3 text-gray-800 focus:border-blue-400 focus:bg-white focus:outline-none transition-all duration-300 hover:bg-white">
                                    <option value="" disabled selected>Pilih jenis sampah</option>
                                    <option value="Organik">🌱 Organik</option>
                                    <option value="Plastik">♻️ Plastik</option>
                                    <option value="Logam">🔨 Logam</option>
                                    <option value="Kaca">🪟 Kaca</option>
                                    <option value="B3">⚠️ B3 (Berbahaya)</option>
                                </select>
                            </div>
                            
                            <div class="space-y-2">
                                <label class="flex items-center gap-2 text-white font-semibold">
                                    <i class="fas fa-truck text-orange-400"></i>
                                    Metode Pengumpulan
                                </label>
                                <select name="method" class="w-full bg-white/90 backdrop-blur border-2 border-white/30 rounded-xl px-4 py-3 text-gray-800 focus:border-blue-400 focus:bg-white focus:outline-none transition-all duration-300 hover:bg-white">
                                    <option value="" disabled selected>Pilih metode</option>
                                    <option value="Door-to-door">🚪 Door-to-door</option>
                                    <option value="Drop-off">📦 Drop-off</option>
                                    <option value="TPS">🏢 TPS</option>
                                </select>
                            </div>
                            
                            <div class="space-y-2">
                                <label class="flex items-center gap-2 text-white font-semibold">
                                    <i class="fas fa-weight text-purple-400"></i>
                                    Berat (kg)
                                </label>
                                <input type="number" name="weight" class="w-full bg-white/90 backdrop-blur border-2 border-white/30 rounded-xl px-4 py-3 text-gray-800 focus:border-blue-400 focus:bg-white focus:outline-none transition-all duration-300 hover:bg-white" min="0" step="0.01" required placeholder="0.00">
                            </div>
                            
                            <div class="space-y-2">
                                <label class="flex items-center gap-2 text-white font-semibold">
                                    <i class="fas fa-calendar text-cyan-400"></i>
                                    Tanggal
                                </label>
                                <input type="date" name="date" class="w-full bg-white/90 backdrop-blur border-2 border-white/30 rounded-xl px-4 py-3 text-gray-800 focus:border-blue-400 focus:bg-white focus:outline-none transition-all duration-300 hover:bg-white" required>
                            </div>
                        </div>
                        
                        <div class="flex justify-end pt-4">
                            <button type="submit" class="bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white font-bold py-3 px-8 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 flex items-center gap-2">
                                <i class="fas fa-save"></i>
                                Simpan Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Quick Actions -->
            <div class="space-y-6">
                <!-- Quick Stats -->
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 border border-white/20 animate-slide-up">
                    <h5 class="text-white font-bold text-lg mb-4 flex items-center gap-2">
                        <i class="fas fa-chart-pie text-yellow-400"></i>
                        Statistik Hari Ini
                    </h5>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center">
                            <span class="text-white/80">Total Sampah</span>
                            <span class="text-white font-bold">{{ number_format($totalSampahHariIni, 2) }} kg</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-white/80">Nasabah Aktif</span>
                            <span class="text-white font-bold">{{ $nasabahAktifHariIni }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-white/80">Pengumpulan</span>
                            <span class="text-white font-bold">{{ $pengumpulanHariIni }} kali</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Data Table Section -->
        <div class="mt-8">
            <div class="bg-white/10 backdrop-blur-lg rounded-3xl p-8 border border-white/20 shadow-2xl animate-slide-up">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center gap-3">
                        <div class="bg-gradient-to-r from-indigo-500 to-purple-600 p-3 rounded-xl">
                            <i class="fas fa-table text-xl text-white"></i>
                        </div>
                        <h4 class="text-2xl font-bold text-white">Rekap Data Sampah</h4>
                    </div>
                    <div class="flex gap-2">
                        <form method="GET" class="flex flex-wrap gap-2 mb-4">
                            <input type="date" name="filter_date" value="{{ request('filter_date') }}" class="px-3 py-2 rounded-xl border border-white/30">
                            <input type="text" name="filter_customer" placeholder="Nama Nasabah" value="{{ request('filter_customer') }}" class="px-3 py-2 rounded-xl border border-white/30">
                            <select name="filter_region" class="px-3 py-2 rounded-xl border border-white/30">
                                <option value="">Semua Wilayah</option>
                                <option value="DKI Jakarta">DKI Jakarta</option>
                                <option value="Jawa Barat">Jawa Barat</option>
                                <option value="Jawa Tengah">Jawa Tengah</option>
                                <option value="Jawa Timur">Jawa Timur</option>
                                <option value="Sumatera Utara">Sumatera Utara</option>
                                <option value="Sumatera Barat">Sumatera Barat</option>
                                <option value="Kalimantan Timur">Kalimantan Timur</option>
                                <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                                <option value="Bali">Bali</option>
                                <option value="Papua">Papua</option>
                            </select>
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-xl">Filter</button>
                            <a href="{{ route('dashboard') }}" class="bg-gray-400 text-white px-4 py-2 rounded-xl">Refresh</a>
                        </form>
                    </div>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-white/20">
                                <th class="text-left py-4 px-4 text-white font-semibold">
                                    <div class="flex items-center gap-2">
                                        <i class="fas fa-user text-blue-400"></i>
                                        Nasabah
                                    </div>
                                </th>
                                <th class="text-left py-4 px-4 text-white font-semibold">
                                    <div class="flex items-center gap-2">
                                        <i class="fas fa-map-marker-alt text-red-400"></i>
                                        Wilayah
                                    </div>
                                </th>
                                <th class="text-left py-4 px-4 text-white font-semibold">
                                    <div class="flex items-center gap-2">
                                        <i class="fas fa-trash text-green-400"></i>
                                        Jenis
                                    </div>
                                </th>
                                <th class="text-left py-4 px-4 text-white font-semibold">
                                    <div class="flex items-center gap-2">
                                        <i class="fas fa-truck text-orange-400"></i>
                                        Metode
                                    </div>
                                </th>
                                <th class="text-left py-4 px-4 text-white font-semibold">
                                    <div class="flex items-center gap-2">
                                        <i class="fas fa-weight text-purple-400"></i>
                                        Berat (kg)
                                    </div>
                                </th>
                                <th class="text-left py-4 px-4 text-white font-semibold">
                                    <div class="flex items-center gap-2">
                                        <i class="fas fa-calendar text-cyan-400"></i>
                                        Tanggal
                                    </div>
                                </th>
                                <th class="text-left py-4 px-4 text-white font-semibold">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $item)
                            <tr class="border-b border-white/10 hover:bg-white/5 transition-colors duration-200">
                                <td class="py-4 px-4 text-white/90">{{ $item->customer ? $item->customer : '-' }}</td>
                                <td class="py-4 px-4 text-white/90">{{ $item->region }}</td>
                                <td class="py-4 px-4">
                                    <span class="bg-green-500/20 text-green-300 px-3 py-1 rounded-full text-sm">
                                        {{ $item->waste_type }}
                                    </span>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="bg-blue-500/20 text-blue-300 px-3 py-1 rounded-full text-sm">
                                        {{ $item->method }}
                                    </span>
                                </td>
                                <td class="py-4 px-4 text-white/90 font-semibold">{{ $item->weight }}</td>
                                <td class="py-4 px-4 text-white/90">{{ $item->date }}</td>
                                <td class="py-4 px-4">
                                    <div class="flex gap-2">
                                        <a href="{{ route('waste.edit', $item->id) }}" class="bg-blue-500/20 hover:bg-blue-500/30 text-blue-300 p-2 rounded-lg transition-all duration-200">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('waste.destroy', $item->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500/20 hover:bg-red-500/30 text-red-300 p-2 rounded-lg transition-all duration-200">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination -->
                <div class="flex justify-between items-center mt-6 pt-6 border-t border-white/20">
                    <div class="text-white/70">
                        Menampilkan {{ $data->firstItem() }}-{{ $data->lastItem() }} dari {{ $data->total() }} data
                    </div>
                    <div class="flex gap-2">
                        @if ($data->lastPage() > 1)
                            {{ $data->links() }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Add some interactivity
        document.addEventListener('DOMContentLoaded', function() {
            // Animate elements on scroll
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-fade-in');
                    }
                });
            });

            // Add hover effects to form elements
            const formElements = document.querySelectorAll('input, select');
            formElements.forEach(element => {
                element.addEventListener('focus', function() {
                    this.parentElement.classList.add('scale-105');
                });
                
                element.addEventListener('blur', function() {
                    this.parentElement.classList.remove('scale-105');
                });
            });

            // Auto-set today's date
            const dateInput = document.querySelector('input[type="date"]');
            if (dateInput) {
                dateInput.valueAsDate = new Date();
            }
        });
    </script>
</body>
</html>