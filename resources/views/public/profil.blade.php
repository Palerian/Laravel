@extends('layouts.public')

@section('title', 'Profil Sekolah — SMK Miyamasuzaka')
@section('page_heading', 'Profil Sekolah & Visi Misi')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 py-8 space-y-10">

    <section class="bg-white border border-slate-200 rounded-lg p-6 sm:p-8 shadow-sm">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
            <div class="lg:col-span-8 space-y-4">
                <span class="text-xs font-bold uppercase tracking-wider text-purple-700">Sambutan Pimpinan Sekolah</span>
                <h2 class="text-xl sm:text-2xl font-bold text-slate-900 leading-snug">
                    Pendidikan Kejuruan Putri Berkarakter, Berbudi Pekerti, dan Menguasai Teknologi Industri
                </h2>
                <div class="space-y-3 text-xs sm:text-sm text-slate-600 leading-relaxed">
                    <p>
                        Selamat datang di portal resmi <strong>SMK Miyamasuzaka Girls Academy</strong>. Sebagai lembaga pendidikan kejuruan putri yang berakar di kawasan Shibuya, kami mendedikasikan seluruh proses pembelajaran untuk melahirkan praktisi sains handal, musisi digital visioner, perancang grafis berbakat, dan tenaga ahli teknologi informasi yang berintegritas tinggi.
                    </p>
                    <p>
                        Kurikulum kami memadukan penguasaan kompetensi kejuruan praktis dengan pembentukan akhlak mulia dan kedisiplinan belajar yang konsisten.
                    </p>
                </div>
                <div class="pt-2 border-t border-slate-100">
                    <strong class="text-slate-900 block text-xs font-bold">Shizuka Asahina, M.Ed.</strong>
                    <span class="text-[11px] text-purple-700 font-semibold">Kepala SMK Miyamasuzaka</span>
                </div>
            </div>

            <div class="lg:col-span-4 bg-slate-50 border border-slate-200 rounded-lg p-5 space-y-3 text-xs">
                <div class="flex items-center gap-3 border-b border-slate-200 pb-3">
                    <div class="w-12 h-12 bg-purple-700 text-white rounded flex items-center justify-center font-bold text-2xl shadow-sm shrink-0">
                        宮
                    </div>
                    <div>
                        <span class="font-bold text-slate-900 block">Identitas Sekolah</span>
                        <span class="text-[11px] text-purple-700 font-semibold">NPSN: 20260412</span>
                    </div>
                </div>

                <div class="space-y-2 text-slate-600">
                    <div><strong>Nama Resmi:</strong> SMK Miyamasuzaka Girls Academy</div>
                    <div><strong>Status:</strong> Swasta Unggulan (Akreditasi A)</div>
                    <div><strong>Jenjang:</strong> Sekolah Menengah Kejuruan (SMK)</div>
                    <div><strong>Kurikulum:</strong> Kurikulum Merdeka Kejuruan & Vokasi</div>
                    <div><strong>Waktu Belajar:</strong> Pagi (Senin - Sabtu)</div>
                </div>
            </div>
        </div>
    </section>

    <section class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white border border-slate-200 rounded-lg p-6 shadow-sm space-y-3">
            <div class="flex items-center gap-2">
                <span class="w-2.5 h-2.5 bg-purple-700 rounded-full"></span>
                <h3 class="text-sm font-bold uppercase tracking-wider text-slate-900">Visi Sekolah</h3>
            </div>
            <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                "Menjadi pusat keunggulan pendidikan vokasi putri terkemuka yang menghasilkan lulusan berakhlak mulia, berdaya saing global, mandiri, dan unggul dalam penguasaan sains terapan, seni media kreatif, serta teknologi informasi digital."
            </p>
        </div>

        <div class="bg-white border border-slate-200 rounded-lg p-6 shadow-sm space-y-3">
            <div class="flex items-center gap-2">
                <span class="w-2.5 h-2.5 bg-purple-700 rounded-full"></span>
                <h3 class="text-sm font-bold uppercase tracking-wider text-slate-900">Misi Sekolah</h3>
            </div>
            <ul class="text-xs sm:text-sm text-slate-600 space-y-2 list-disc list-inside leading-relaxed">
                <li>Menyelenggarakan proses pembelajaran kejuruan berkualitas berbasis praktik industri dan teknologi mutakhir.</li>
                <li>Membina kepribadian siswi yang disiplin, berintegritas, mandiri, dan berbudaya luhur.</li>
                <li>Menyediakan sarana laboratorium sains, studio audio digital, dan fasilitas komputer standar industri.</li>
                <li>Menjalin kemitraan strategis dengan dunia usaha dan industri untuk penyerapan lulusan optimal.</li>
            </ul>
        </div>
    </section>

    <section class="bg-white border border-slate-200 rounded-lg p-6 sm:p-8 shadow-sm space-y-6">
        <div class="border-b border-slate-200 pb-3">
            <span class="text-xs font-bold uppercase tracking-wider text-purple-700">Fasilitas Penunjang</span>
            <h3 class="text-lg font-bold text-slate-900 mt-0.5">Sarana & Prasarana Kampus Miyamasuzaka</h3>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 text-xs">
            <div class="p-4 bg-slate-50 border border-slate-200 rounded-lg space-y-2">
                <h4 class="font-bold text-slate-900">1. Studio Audio & Musik Digital DTM</h4>
                <p class="text-slate-600 leading-relaxed">Dilengkapi audio workstation DAW, keyboard synthesizer, interface recording, dan ruang kedap akustik.</p>
            </div>

            <div class="p-4 bg-slate-50 border border-slate-200 rounded-lg space-y-2">
                <h4 class="font-bold text-slate-900">2. Laboratorium Sains Bio-Farmasi</h4>
                <p class="text-slate-600 leading-relaxed">Fasilitas mikroskop digital, perangkat analisa kimia, ruang inkubasi, dan instrumen uji steril.</p>
            </div>

            <div class="p-4 bg-slate-50 border border-slate-200 rounded-lg space-y-2">
                <h4 class="font-bold text-slate-900">3. Fasilitas Panahan Tradisional</h4>
                <p class="text-slate-600 leading-relaxed">Arena latihan konsentrasi, ketenangan pikiran, dan pelestarian disiplin olahraga tradisional.</p>
            </div>

            <div class="p-4 bg-slate-50 border border-slate-200 rounded-lg space-y-2">
                <h4 class="font-bold text-slate-900">4. Laboratorium Rekayasa Perangkat Lunak</h4>
                <p class="text-slate-600 leading-relaxed">Workstation PC berspesifikasi tinggi, server database lokal, dan koneksi internet serat optik kecepatan tinggi.</p>
            </div>

            <div class="p-4 bg-slate-50 border border-slate-200 rounded-lg space-y-2">
                <h4 class="font-bold text-slate-900">5. Studio Desain Komunikasi Visual</h4>
                <p class="text-slate-600 leading-relaxed">Meja gambar digital pen-display, kamera DSLR/Mirrorless fotografi, dan perangkat cetak portofolio.</p>
            </div>

            <div class="p-4 bg-slate-50 border border-slate-200 rounded-lg space-y-2">
                <h4 class="font-bold text-slate-900">6. Perpustakaan & Ruang Belajar Mandiri</h4>
                <p class="text-slate-600 leading-relaxed">Koleksi referensi ilmiah, jurnal kejuruan, partitur musik, dan ruang baca nyaman ber-AC.</p>
            </div>
        </div>
    </section>

</div>
@endsection
