@extends('layouts.public')

@section('title', 'Program Keahlian — SMK Miyamasuzaka')
@section('page_heading', '5 Program Keahlian Kejuruan')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 py-8 space-y-8">

    <section id="smp" class="bg-white border border-slate-200 rounded-lg p-6 sm:p-8 shadow-sm space-y-4">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between border-b border-slate-200 pb-3 gap-2">
            <div>
                <span class="px-2.5 py-0.5 rounded text-xs font-bold bg-purple-50 text-purple-700 border border-purple-200 font-mono">
                    KODE: SMP-01
                </span>
                <h2 class="text-xl font-extrabold text-slate-900 mt-1">1. Seni Musik Digital & DTM Synthesizer</h2>
            </div>
            <span class="text-xs font-semibold text-slate-500">Durasi: 3 Tahun Pendidikan</span>
        </div>

        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
            Program keahlian yang fokus pada penciptaan karya musik modern menggunakan teknologi Digital Audio Workstation (DAW), pemrograman synthesizer, aransemen harmoni vokal/instrumen, perekaman studio profesional, dan tata suara panggung.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-xs pt-2">
            <div class="p-3.5 bg-slate-50 border border-slate-200 rounded">
                <strong class="text-slate-900 block mb-1">Mata Pelajaran Unggulan:</strong>
                <ul class="list-disc list-inside text-slate-600 space-y-0.5">
                    <li>Seni Musik Digital & DTM Synthesizer</li>
                    <li>Harmoni Piano & Aransemen Akustik</li>
                    <li>Penulisan Lirik Musik & Komposisi Lagu</li>
                </ul>
            </div>
            <div class="p-3.5 bg-slate-50 border border-slate-200 rounded">
                <strong class="text-slate-900 block mb-1">Peluang Karir Lulusan:</strong>
                <p class="text-slate-600 leading-relaxed">
                    Music Producer, Sound Engineer Studio, Arranger Musik, Songwriter, Audio Editor Game/Media.
                </p>
            </div>
        </div>
    </section>

    <section id="far" class="bg-white border border-slate-200 rounded-lg p-6 sm:p-8 shadow-sm space-y-4">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between border-b border-slate-200 pb-3 gap-2">
            <div>
                <span class="px-2.5 py-0.5 rounded text-xs font-bold bg-emerald-50 text-emerald-700 border border-emerald-200 font-mono">
                    KODE: FAR-02
                </span>
                <h2 class="text-xl font-extrabold text-slate-900 mt-1">2. Sains Terapan & Bio-Farmasi Klinis</h2>
            </div>
            <span class="text-xs font-semibold text-slate-500">Durasi: 3 Tahun Pendidikan</span>
        </div>

        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
            Program keahlian yang mendalami analisis kimia farmasi, biologi sel eksperimental, formulasi obat standar laboratorium, pengujian mikrobiologi dasar, dan prosedur etika kesehatan klinis.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-xs pt-2">
            <div class="p-3.5 bg-slate-50 border border-slate-200 rounded">
                <strong class="text-slate-900 block mb-1">Mata Pelajaran Unggulan:</strong>
                <ul class="list-disc list-inside text-slate-600 space-y-0.5">
                    <li>Biologi Terapan & Sains Kedokteran Dasar</li>
                    <li>Kimia Farmasi Terapan & Uji Lab</li>
                    <li>Kesehatan Masyarakat & Etika Medis</li>
                </ul>
            </div>
            <div class="p-3.5 bg-slate-50 border border-slate-200 rounded">
                <strong class="text-slate-900 block mb-1">Peluang Karir Lulusan:</strong>
                <p class="text-slate-600 leading-relaxed">
                    Asisten Tenaga Kefarmasian, Laboran Medis/Klinis, Quality Control Produk Obat & Kosmetik.
                </p>
            </div>
        </div>
    </section>

    <section id="dkv" class="bg-white border border-slate-200 rounded-lg p-6 sm:p-8 shadow-sm space-y-4">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between border-b border-slate-200 pb-3 gap-2">
            <div>
                <span class="px-2.5 py-0.5 rounded text-xs font-bold bg-sky-50 text-sky-700 border border-sky-200 font-mono">
                    KODE: DKV-03
                </span>
                <h2 class="text-xl font-extrabold text-slate-900 mt-1">3. Desain Komunikasi Visual & Media Digital</h2>
            </div>
            <span class="text-xs font-semibold text-slate-500">Durasi: 3 Tahun Pendidikan</span>
        </div>

        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
            Program keahlian yang membekali siswi dengan keterampilan ilustrasi digital, tipografi formal, branding produk kreatif, desain antarmuka aplikasi, fotografi studio, dan seni grafis publikasi modern.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-xs pt-2">
            <div class="p-3.5 bg-slate-50 border border-slate-200 rounded">
                <strong class="text-slate-900 block mb-1">Mata Pelajaran Unggulan:</strong>
                <ul class="list-disc list-inside text-slate-600 space-y-0.5">
                    <li>Desain Grafis Digital & Tipografi Modern</li>
                    <li>Ilustrasi Karakter & Visual Storytelling</li>
                    <li>Fotografi Studio & Media Portofolio</li>
                </ul>
            </div>
            <div class="p-3.5 bg-slate-50 border border-slate-200 rounded">
                <strong class="text-slate-900 block mb-1">Peluang Karir Lulusan:</strong>
                <p class="text-slate-600 leading-relaxed">
                    Graphic Designer, Digital Illustrator, 2D Artist, UI/UX Designer, Creative Content Producer.
                </p>
            </div>
        </div>
    </section>

    <section id="rpl" class="bg-white border border-slate-200 rounded-lg p-6 sm:p-8 shadow-sm space-y-4">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between border-b border-slate-200 pb-3 gap-2">
            <div>
                <span class="px-2.5 py-0.5 rounded text-xs font-bold bg-indigo-50 text-indigo-700 border border-indigo-200 font-mono">
                    KODE: RPL-04
                </span>
                <h2 class="text-xl font-extrabold text-slate-900 mt-1">4. Rekayasa Software & Sistem Informasi</h2>
            </div>
            <span class="text-xs font-semibold text-slate-500">Durasi: 3 Tahun Pendidikan</span>
        </div>

        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
            Program keahlian di bidang pemrograman aplikasi web, perancangan database relasional, arsitektur cloud server, dan pengembangan perangkat lunak sistem informasi akademik terdistribusi.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-xs pt-2">
            <div class="p-3.5 bg-slate-50 border border-slate-200 rounded">
                <strong class="text-slate-900 block mb-1">Mata Pelajaran Unggulan:</strong>
                <ul class="list-disc list-inside text-slate-600 space-y-0.5">
                    <li>Rekayasa Perangkat Lunak & Web Platform</li>
                    <li>Pemrograman Basis Data & Arsitektur Cloud</li>
                    <li>Pengembangan Aplikasi Mobile Interaktif</li>
                </ul>
            </div>
            <div class="p-3.5 bg-slate-50 border border-slate-200 rounded">
                <strong class="text-slate-900 block mb-1">Peluang Karir Lulusan:</strong>
                <p class="text-slate-600 leading-relaxed">
                    Full-stack Web Developer, Junior Software Engineer, Database Administrator, Web Integrator.
                </p>
            </div>
        </div>
    </section>

    <section id="mbm" class="bg-white border border-slate-200 rounded-lg p-6 sm:p-8 shadow-sm space-y-4">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between border-b border-slate-200 pb-3 gap-2">
            <div>
                <span class="px-2.5 py-0.5 rounded text-xs font-bold bg-amber-50 text-amber-700 border border-amber-200 font-mono">
                    KODE: MBM-05
                </span>
                <h2 class="text-xl font-extrabold text-slate-900 mt-1">5. Manajemen Bisnis Pertunjukan & Media</h2>
            </div>
            <span class="text-xs font-semibold text-slate-500">Durasi: 3 Tahun Pendidikan</span>
        </div>

        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
            Program keahlian manajemen operasional pertunjukan seni, pemasaran media digital, tata kelola public relations institusi, akuntansi bisnis kreatif, dan inkubasi rintisan media.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-xs pt-2">
            <div class="p-3.5 bg-slate-50 border border-slate-200 rounded">
                <strong class="text-slate-900 block mb-1">Mata Pelajaran Unggulan:</strong>
                <ul class="list-disc list-inside text-slate-600 space-y-0.5">
                    <li>Manajemen Event Seni & Industri Kreatif</li>
                    <li>Pemasaran Digital & Public Relations</li>
                    <li>Akuntansi Bisnis & Tata Kelola Hiburan</li>
                </ul>
            </div>
            <div class="p-3.5 bg-slate-50 border border-slate-200 rounded">
                <strong class="text-slate-900 block mb-1">Peluang Karir Lulusan:</strong>
                <p class="text-slate-600 leading-relaxed">
                    Event Organizer, Media Planner, Public Relations Officer, Production Assistant, Business Marketer.
                </p>
            </div>
        </div>
    </section>

</div>
@endsection
