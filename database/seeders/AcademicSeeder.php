<?php

namespace Database\Seeders;

use App\Models\Guru;
use App\Models\Jadwal;
use App\Models\MataPelajaran;
use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AcademicSeeder extends Seeder
{
    public function run(): void
    {
        if (DB::getDriverName() === 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            Nilai::truncate();
            Jadwal::truncate();
            Siswa::truncate();
            MataPelajaran::truncate();
            Guru::truncate();
            User::truncate();
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        } else {
            Nilai::query()->delete();
            Jadwal::query()->delete();
            Siswa::query()->delete();
            MataPelajaran::query()->delete();
            Guru::query()->delete();
            User::query()->delete();
        }

        $avatars = ['mafuyu', 'mafuyu-alt'];
        $password = Hash::make('password');

        $admin = User::create([
            'email' => 'admin@miyamasuzaka.test',
            'name' => 'Administrator Miyamasuzaka',
            'password' => $password,
            'email_verified_at' => now(),
            'avatar' => 'mafuyu',
            'role' => User::ROLE_ADMIN,
            'jabatan' => 'Super Administrator SIA',
        ]);

        $staffMembers = [
            [
                'email' => 'tu@miyamasuzaka.test',
                'name' => 'Erika Sasaki, S.AP.',
                'avatar' => 'mafuyu',
                'jabatan' => 'Kepala Tata Usaha & Administrasi',
            ],
            [
                'email' => 'it@miyamasuzaka.test',
                'name' => 'Daisuke Suzuki, M.Kom.',
                'avatar' => 'mafuyu-alt',
                'jabatan' => 'Staf TU Bagian IT & Administrator Sistem',
            ],
            [
                'email' => 'kesiswaan@miyamasuzaka.test',
                'name' => 'Kazutoshi Sawada, S.Sos.',
                'avatar' => 'mafuyu',
                'jabatan' => 'Staf TU Kesiswaan & Administrasi',
            ],
            [
                'email' => 'koperasi@miyamasuzaka.test',
                'name' => 'Yoko Yoshida, A.Md.',
                'avatar' => 'mafuyu-alt',
                'jabatan' => 'Pengelola Koperasi Siswi & Sarpras',
            ],
            [
                'email' => 'lab@miyamasuzaka.test',
                'name' => 'Kenji Ishida, S.T.',
                'avatar' => 'mafuyu',
                'jabatan' => 'Laboran Studio Musik DTM & Bio-Farmasi',
            ],
        ];

        foreach ($staffMembers as $staff) {
            User::create([
                'email' => $staff['email'],
                'name' => $staff['name'],
                'password' => $password,
                'email_verified_at' => now(),
                'avatar' => $staff['avatar'],
                'role' => User::ROLE_STAFF,
                'jabatan' => $staff['jabatan'],
            ]);
        }

        $coreTeachers = [
            ['name' => 'Shizuka Asahina, M.Ed.', 'email' => 'kepsek@miyamasuzaka.test', 'nip' => '197504122000012001', 'mapel' => 'Etika Medis & Kebijakan Pendidikan', 'phone' => '0812-5468-0001', 'avatar' => 'mafuyu', 'jabatan' => 'Kepala Sekolah SMK Miyamasuzaka'],
            ['name' => 'Reiko Shinonome, M.Sn.', 'email' => 'wakakur@miyamasuzaka.test', 'nip' => '198009222005012002', 'mapel' => 'Seni Lukis & Teori Warna Lanjut', 'phone' => '0812-5468-0002', 'avatar' => 'mafuyu-alt', 'jabatan' => 'Wakil Kepala Sekolah Bidang Kurikulum'],
            ['name' => 'Tomoya Aoyagi, S.Pd.', 'email' => 'wakasis@miyamasuzaka.test', 'nip' => '198205152007011003', 'mapel' => 'Pendidikan Karakter & Kepemimpinan Putri', 'phone' => '0812-5468-0003', 'avatar' => 'mafuyu', 'jabatan' => 'Wakil Kepala Sekolah Bidang Kesiswaan'],
            ['name' => 'Dr. Makoto Asahina, Sp.F.', 'email' => 'makoto@miyamasuzaka.test', 'nip' => '197601102001011004', 'mapel' => 'Sains Terapan & Bio-Farmasi Klinis', 'phone' => '0812-5468-0004', 'avatar' => 'mafuyu', 'jabatan' => 'Kepala Program Keahlian Bio-Farmasi'],
            ['name' => 'Minato Yoisaki, M.Mus.', 'email' => 'minato@miyamasuzaka.test', 'nip' => '197803192003011005', 'mapel' => 'Komposisi Musik Digital & DTM Synthesizer', 'phone' => '0812-5468-0005', 'avatar' => 'mafuyu-alt', 'jabatan' => 'Kepala Program Seni Musik DTM'],
            ['name' => 'Yukiko Hinomori, S.Pd.', 'email' => 'hinomori@miyamasuzaka.test', 'nip' => '198406202008012006', 'mapel' => 'Olahraga Tradisional: Seni Memanah (Kyudo)', 'phone' => '0812-5468-0006', 'avatar' => 'mafuyu', 'jabatan' => 'Guru PJOK & Pembina Dojo Kyudo'],
            ['name' => 'Chiyo Mochizuki, S.S., M.Pd.', 'email' => 'guru@miyamasuzaka.test', 'nip' => '198511302010012007', 'mapel' => 'Bahasa & Sastra Terapan', 'phone' => '0812-5468-0007', 'avatar' => 'mafuyu-alt', 'jabatan' => 'Guru Bahasa'],
        ];

        $teacherFirstNames = ['Kaori', 'Shizuka', 'Ayumi', 'Emi', 'Yoko', 'Mayumi', 'Tomoko', 'Akiko', 'Noriko', 'Keiko', 'Yuko', 'Miyuki', 'Yukiko', 'Naoko', 'Chie', 'Haruko', 'Sayuri', 'Megumi', 'Michiko', 'Satomi'];
        $teacherLastNames = ['Asahina', 'Hinomori', 'Mochizuki', 'Tenma', 'Hoshino', 'Hanasato', 'Kiritani', 'Momoi', 'Shinonome', 'Akiyama', 'Yoisaki', 'Otori', 'Kusanagi', 'Azusawa', 'Shiraishi', 'Tanaka', 'Sato', 'Suzuki', 'Takahashi', 'Watanabe'];

        $guruModels = [];

        foreach ($coreTeachers as $gt) {
            $user = User::create([
                'name' => $gt['name'],
                'email' => $gt['email'],
                'password' => $password,
                'email_verified_at' => now(),
                'avatar' => $gt['avatar'],
                'role' => User::ROLE_GURU,
                'jabatan' => $gt['jabatan'] ?? 'Tenaga Pendidik (Guru)',
            ]);

            $guruModels[] = Guru::create([
                'user_id' => $user->id,
                'nama' => $gt['name'],
                'nip' => $gt['nip'],
                'mata_pelajaran' => $gt['mapel'],
                'no_telepon' => $gt['phone'],
            ]);
        }

        for ($i = count($guruModels) + 1; $i <= 45; $i++) {
            $fname = $teacherFirstNames[$i % count($teacherFirstNames)];
            $lname = $teacherLastNames[($i * 3) % count($teacherLastNames)];
            $name = "{$lname} {$fname}, S.Pd., M.Ed.";
            $email = "guru{$i}@miyamasuzaka.test";

            $user = User::create([
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'email_verified_at' => now(),
                'avatar' => $avatars[$i % count($avatars)],
                'role' => User::ROLE_GURU,
                'jabatan' => 'Tenaga Pendidik (Guru)',
            ]);

            $guruModels[] = Guru::create([
                'user_id' => $user->id,
                'nama' => $name,
                'nip' => '198' . (70 + ($i % 25)) . sprintf('%04d', $i) . '200' . ($i % 9) . '01',
                'mata_pelajaran' => 'Pendidik Kejuruan SMK Miyamasuzaka',
                'no_telepon' => '0812-5468-' . (1000 + $i),
            ]);
        }

        $subjectNames = [
            ['code' => 'SMK-SMP01', 'name' => 'Seni Musik Digital & DTM Synthesizer', 'sks' => 3],
            ['code' => 'SMK-SMP02', 'name' => 'Harmoni Piano & Aransemen Akustik', 'sks' => 3],
            ['code' => 'SMK-SMP03', 'name' => 'Penulisan Lirik Musik & Komposisi Lagu', 'sks' => 3],
            ['code' => 'SMK-FAR01', 'name' => 'Biologi Terapan & Sains Kedokteran Dasar', 'sks' => 3],
            ['code' => 'SMK-FAR02', 'name' => 'Kimia Farmasi Terapan & Uji Laboratorium', 'sks' => 3],
            ['code' => 'SMK-FAR03', 'name' => 'Kesehatan Masyarakat & Etika Medis', 'sks' => 2],
            ['code' => 'SMK-DKV01', 'name' => 'Desain Grafis Digital & Tipografi Modern', 'sks' => 3],
            ['code' => 'SMK-DKV02', 'name' => 'Ilustrasi Karakter & Visual Storytelling', 'sks' => 2],
            ['code' => 'SMK-DKV03', 'name' => 'Fotografi Studio & Media Portofolio', 'sks' => 2],
            ['code' => 'SMK-RPL01', 'name' => 'Rekayasa Perangkat Lunak & Web Platform', 'sks' => 3],
            ['code' => 'SMK-RPL02', 'name' => 'Pemrograman Basis Data & Arsitektur Cloud', 'sks' => 3],
            ['code' => 'SMK-RPL03', 'name' => 'Pengembangan Aplikasi Mobile Interaktif', 'sks' => 2],
            ['code' => 'SMK-MBM01', 'name' => 'Manajemen Event Seni & Industri Kreatif', 'sks' => 3],
            ['code' => 'SMK-MBM02', 'name' => 'Pemasaran Digital & Public Relations', 'sks' => 3],
            ['code' => 'SMK-MBM03', 'name' => 'Akuntansi Bisnis & Tata Kelola Hiburan', 'sks' => 2],
            ['code' => 'SMK-JPN01', 'name' => 'Bahasa Komunikasi Terapan', 'sks' => 2],
            ['code' => 'SMK-ING01', 'name' => 'Bahasa Inggris Bisnis & Komunikasi Global', 'sks' => 2],
            ['code' => 'SMK-MTK01', 'name' => 'Matematika Terapan & Logika Komputasi', 'sks' => 3],
            ['code' => 'SMK-FIS01', 'name' => 'Fisika Akustik & Gelombang Bunyi', 'sks' => 2],
            ['code' => 'SMK-KIM01', 'name' => 'Kimia Analitik Dasar & Biokimia', 'sks' => 2],
            ['code' => 'SMK-BIO01', 'name' => 'Biologi Sel & Genetika Eksperimental', 'sks' => 2],
            ['code' => 'SMK-PJK01', 'name' => 'Pendidikan Jasmani & Olahraga Panahan', 'sks' => 2],
            ['code' => 'SMK-PKN01', 'name' => 'Pendidikan Pancasila & Kewarganegaraan', 'sks' => 2],
            ['code' => 'SMK-EKO01', 'name' => 'Kewirausahaan & Inkubasi Startup Media', 'sks' => 2],
            ['code' => 'SMK-AGM01', 'name' => 'Pendidikan Karakter, Moral & Budi Pekerti', 'sks' => 2],
            ['code' => 'SMK-SEJ01', 'name' => 'Sejarah Perkembangan Seni & Budaya', 'sks' => 2],
            ['code' => 'SMK-IND01', 'name' => 'Bahasa Indonesia Komunikasi Profesional', 'sks' => 2],
            ['code' => 'SMK-SNI01', 'name' => 'Apresiasi Seni Musik & Budaya Visual', 'sks' => 2],
        ];

        $mapelModels = [];
        foreach ($subjectNames as $idx => $s) {
            $assignedGuru = $guruModels[$idx % count($guruModels)];
            $mapelModels[] = MataPelajaran::create([
                'kode' => $s['code'],
                'nama' => $s['name'],
                'guru_id' => $assignedGuru->id,
            ]);
        }

        $kelasList = [
            'X-SMP-1', 'X-SMP-2', 'X-FAR-1', 'X-DKV-1', 'X-RPL-1', 'X-MBM-1',
            'XI-SMP-1', 'XI-SMP-2', 'XI-FAR-1', 'XI-DKV-1', 'XI-RPL-1', 'XI-MBM-1',
            'XII-SMP-1', 'XII-SMP-2', 'XII-FAR-1', 'XII-DKV-1', 'XII-RPL-1', 'XII-MBM-1',
        ];

        $namedStudents = [
            ['name' => 'Asahina Mafuyu', 'email' => 'mafuyu@murid.miyamasuzaka.test', 'nis' => '20260001', 'kelas' => 'XI-FAR-1', 'alamat' => 'Miyamasuzaka 2-Chome, Shibuya-ku, Tokyo', 'avatar' => 'mafuyu'],
            ['name' => 'Hoshino Ichika', 'email' => 'ichika@murid.miyamasuzaka.test', 'nis' => '20260002', 'kelas' => 'XI-SMP-1', 'alamat' => 'Shibuya 1-Chome, Tokyo', 'avatar' => 'mafuyu-alt'],
            ['name' => 'Tenma Saki', 'email' => 'saki@murid.miyamasuzaka.test', 'nis' => '20260003', 'kelas' => 'XI-SMP-1', 'alamat' => 'Aoyama, Minato-ku, Tokyo', 'avatar' => 'mafuyu'],
            ['name' => 'Mochizuki Honami', 'email' => 'honami@murid.miyamasuzaka.test', 'nis' => '20260004', 'kelas' => 'XI-SMP-2', 'alamat' => 'Harajuku, Shibuya-ku, Tokyo', 'avatar' => 'mafuyu-alt'],
            ['name' => 'Hinomori Shiho', 'email' => 'shiho@murid.miyamasuzaka.test', 'nis' => '20260005', 'kelas' => 'XI-SMP-2', 'alamat' => 'Ebisu, Shibuya-ku, Tokyo', 'avatar' => 'mafuyu'],
            ['name' => 'Hanasato Minori', 'email' => 'minori@murid.miyamasuzaka.test', 'nis' => '20260006', 'kelas' => 'XI-MBM-1', 'alamat' => 'Shibuya Dogenzaka, Tokyo', 'avatar' => 'mafuyu-alt'],
            ['name' => 'Kiritani Haruka', 'email' => 'haruka@murid.miyamasuzaka.test', 'nis' => '20260007', 'kelas' => 'XI-MBM-1', 'alamat' => 'Roppongi, Minato-ku, Tokyo', 'avatar' => 'mafuyu'],
            ['name' => 'Momoi Airi', 'email' => 'airi@murid.miyamasuzaka.test', 'nis' => '20260008', 'kelas' => 'XI-MBM-1', 'alamat' => 'Omotesando, Shibuya-ku, Tokyo', 'avatar' => 'mafuyu-alt'],
            ['name' => 'Hinomori Shizuku', 'email' => 'shizuku@murid.miyamasuzaka.test', 'nis' => '20260009', 'kelas' => 'XII-FAR-1', 'alamat' => 'Ebisu, Shibuya-ku, Tokyo', 'avatar' => 'mafuyu'],
            ['name' => 'Azusawa Kohane', 'email' => 'kohane@murid.miyamasuzaka.test', 'nis' => '20260010', 'kelas' => 'X-SMP-1', 'alamat' => 'Shibuya Center-gai, Tokyo', 'avatar' => 'mafuyu-alt'],
            ['name' => 'Shiraishi An', 'email' => 'an@murid.miyamasuzaka.test', 'nis' => '20260011', 'kelas' => 'X-SMP-1', 'alamat' => 'Vivid Street, Shibuya-ku, Tokyo', 'avatar' => 'mafuyu'],
            ['name' => 'Shinonome Ena', 'email' => 'ena@murid.miyamasuzaka.test', 'nis' => '20260012', 'kelas' => 'XII-DKV-1', 'alamat' => 'Shibuya Sakuragaoka, Tokyo', 'avatar' => 'mafuyu-alt'],
            ['name' => 'Akiyama Mizuki', 'email' => 'mizuki@murid.miyamasuzaka.test', 'nis' => '20260013', 'kelas' => 'XI-DKV-1', 'alamat' => 'Shibuya Udagawacho, Tokyo', 'avatar' => 'mafuyu'],
            ['name' => 'Yoisaki Kanade', 'email' => 'kanade@murid.miyamasuzaka.test', 'nis' => '20260014', 'kelas' => 'XII-SMP-1', 'alamat' => 'Shibuya Jingumae, Tokyo', 'avatar' => 'mafuyu-alt'],
            ['name' => 'Otori Emu', 'email' => 'emu@murid.miyamasuzaka.test', 'nis' => '20260015', 'kelas' => 'X-MBM-1', 'alamat' => 'Phoenix Wonderland, Shibuya, Tokyo', 'avatar' => 'mafuyu'],
            ['name' => 'Kusanagi Nene', 'email' => 'nene@murid.miyamasuzaka.test', 'nis' => '20260016', 'kelas' => 'XI-RPL-1', 'alamat' => 'Shibuya Daikanyama, Tokyo', 'avatar' => 'mafuyu-alt'],
        ];

        $studentFirstNames = [
            'Yui', 'Rin', 'Aoi', 'Hina', 'Mio', 'Sakura', 'Nanami', 'Akari', 'Mei', 'Yuna',
            'Sora', 'Honoka', 'Kanon', 'Misaki', 'Ayaka', 'Koharu', 'Riko', 'Shiori', 'Rei', 'Kokoro',
            'Kotone', 'Mirei', 'Suzu', 'Hikari', 'Manami', 'Fuka', 'Ami', 'Haruhi', 'Momoka', 'Saki',
            'Chihiro', 'Sayaka', 'Madoka', 'Rena', 'Asuka', 'Kasumi', 'Arisa', 'Tae', 'Saaya', 'Rimi',
            'Yukina', 'Sayo', 'Lisa', 'Ako', 'Rinko', 'Ran', 'Moca', 'Himari', 'Tomoe', 'Tsugumi'
        ];

        $studentLastNames = [
            'Asahina', 'Hinomori', 'Mochizuki', 'Tenma', 'Hoshino', 'Hanasato', 'Kiritani', 'Momoi',
            'Shinonome', 'Akiyama', 'Yoisaki', 'Otori', 'Kusanagi', 'Azusawa', 'Shiraishi', 'Minato',
            'Takahashi', 'Watanabe', 'Ito', 'Yamamoto', 'Nakamura', 'Kobayashi', 'Kato', 'Yoshida',
            'Yamada', 'Sasaki', 'Yamaguchi', 'Saito', 'Matsumoto', 'Inoue', 'Kimura', 'Hayashi', 'Shimizu'
        ];

        $addresses = [
            'Miyamasuzaka 1-Chome, Shibuya-ku, Tokyo',
            'Miyamasuzaka 2-Chome, Shibuya-ku, Tokyo',
            'Shibuya Sakuragaoka-cho, Shibuya-ku, Tokyo',
            'Shibuya Jingumae 3-Chome, Tokyo',
            'Shibuya Daikanyama-cho, Tokyo',
            'Shibuya Ebisu-Nishi, Tokyo',
            'Shibuya Dogenzaka 2-Chome, Tokyo',
            'Shibuya Udagawacho, Tokyo',
            'Shibuya Nanpeidaicho, Tokyo',
            'Shibuya Shoto 1-Chome, Tokyo',
            'Aoyama 2-Chome, Minato-ku, Tokyo',
            'Harajuku 4-Chome, Shibuya-ku, Tokyo',
        ];

        $siswaModels = [];

        foreach ($namedStudents as $idx => $st) {
            $user = User::create([
                'name' => $st['name'],
                'email' => $st['email'],
                'password' => $password,
                'email_verified_at' => now(),
                'avatar' => $st['avatar'],
                'role' => User::ROLE_MURID,
                'jabatan' => 'Peserta Didik (Siswi)',
            ]);

            $siswa = Siswa::create([
                'user_id' => $user->id,
                'nama' => $st['name'],
                'nis' => $st['nis'],
                'kelas' => $st['kelas'],
                'jenis_kelamin' => 'P',
                'alamat' => $st['alamat'],
                'tanggal_lahir' => '2008-' . sprintf('%02d', ($idx % 12) + 1) . '-' . sprintf('%02d', (($idx * 3) % 27) + 1),
            ]);

            $siswaModels[] = $siswa;
        }

        $totalTarget = 600;
        $currentCount = count($siswaModels);

        for ($i = $currentCount + 1; $i <= $totalTarget; $i++) {
            $fname = $studentFirstNames[($i * 7) % count($studentFirstNames)];
            $lname = $studentLastNames[($i * 11) % count($studentLastNames)];
            $nama = "{$lname} {$fname}";
            $nis = '2026' . sprintf('%04d', $i);
            $kelas = $kelasList[$i % count($kelasList)];
            $alamat = $addresses[$i % count($addresses)];
            $email = "siswi{$i}@murid.miyamasuzaka.test";

            $userId = null;
            if ($i <= 100) {
                $user = User::create([
                    'name' => $nama,
                    'email' => $email,
                    'password' => $password,
                    'email_verified_at' => now(),
                    'avatar' => $avatars[$i % count($avatars)],
                    'role' => User::ROLE_MURID,
                    'jabatan' => 'Peserta Didik (Siswi)',
                ]);
                $userId = $user->id;
            }

            $siswa = Siswa::create([
                'user_id' => $userId,
                'nama' => $nama,
                'nis' => $nis,
                'kelas' => $kelas,
                'jenis_kelamin' => 'P',
                'alamat' => $alamat,
                'tanggal_lahir' => '2008-' . sprintf('%02d', ($i % 12) + 1) . '-' . sprintf('%02d', (($i * 2) % 27) + 1),
            ]);

            $siswaModels[] = $siswa;
        }

        $hariList = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        $timeSlots = [
            ['07:30:00', '09:00:00'],
            ['09:15:00', '10:45:00'],
            ['11:00:00', '12:30:00'],
            ['13:15:00', '14:45:00'],
            ['15:00:00', '16:30:00'],
            ['16:45:00', '18:00:00'],
        ];

        foreach ($kelasList as $kelasIdx => $kelas) {
            foreach ($hariList as $hariIdx => $hari) {
                $slot = $timeSlots[($kelasIdx + $hariIdx) % count($timeSlots)];
                $mapel = $mapelModels[($kelasIdx * 3 + $hariIdx * 2) % count($mapelModels)];

                Jadwal::create([
                    'kelas' => $kelas,
                    'mapel_id' => $mapel->id,
                    'hari' => $hari,
                    'jam_mulai' => $slot[0],
                    'jam_selesai' => $slot[1],
                ]);
            }
        }

        $evalTypes = ['Tugas', 'UH', 'UTS', 'UAS', 'Praktik Kejuruan'];

        $mafuyuStudent = $siswaModels[0];
        foreach ($mapelModels as $mapel) {
            Nilai::create([
                'siswa_id' => $mafuyuStudent->id,
                'mapel_id' => $mapel->id,
                'jenis_nilai' => 'UAS',
                'nilai' => 100,
            ]);
            Nilai::create([
                'siswa_id' => $mafuyuStudent->id,
                'mapel_id' => $mapel->id,
                'jenis_nilai' => 'UTS',
                'nilai' => 98,
            ]);
        }

        foreach (array_slice($siswaModels, 1, 60) as $sIdx => $st) {
            $sampleMapels = array_slice($mapelModels, ($sIdx * 2) % (count($mapelModels) - 4), 4);
            foreach ($sampleMapels as $mIdx => $mapel) {
                $baseScore = 78 + (($sIdx + $mIdx * 3) % 21);
                Nilai::create([
                    'siswa_id' => $st->id,
                    'mapel_id' => $mapel->id,
                    'jenis_nilai' => $evalTypes[($sIdx + $mIdx) % count($evalTypes)],
                    'nilai' => min(98, $baseScore),
                ]);
            }
        }
    }
}
