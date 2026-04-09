<?php
include 'includes/header.php';
?>

<main class="pt-24 pb-20 px-6 max-w-screen-xl mx-auto">
    <!-- Hero Section -->
    <header class="mb-16 text-center">
        <span class="inline-block px-4 py-1 bg-primary-container text-on-primary-container rounded-full text-xs font-bold mb-4 uppercase tracking-widest">
            Tentang Kami
        </span>
        <h1 class="text-4xl md:text-6xl font-black tracking-tight text-primary mb-6 leading-none">The Clinical Naturalist</h1>
        <p class="text-on-surface-variant max-w-2xl mx-auto text-lg leading-relaxed">
            Sistem Pakar Diagnosa Penyakit Burung Merpati yang menggabungkan kecerdasan buatan dengan keahlian patologi avian.
        </p>
    </header>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center mb-20">
        <div>
            <h2 class="text-3xl font-extrabold text-on-surface mb-6">Misi Kami</h2>
            <p class="text-on-surface-variant leading-relaxed mb-6">
                The Clinical Naturalist hadir untuk memberikan akses cepat dan akurat bagi para pemelihara merpati dalam mengidentifikasi potensi masalah kesehatan pada unggas mereka. Dengan menggunakan metode <strong>Forward Chaining</strong>, sistem kami menganalisis gejala secara sistematis untuk mencapai kesimpulan klinis yang tepat.
            </p>
            <div class="space-y-4">
                <div class="flex items-start gap-4">
                    <span class="material-symbols-outlined text-primary p-2 bg-primary/10 rounded-lg">speed</span>
                    <div>
                        <h3 class="font-bold">Analisis Cepat</h3>
                        <p class="text-sm text-on-surface-variant">Dapatkan hasil diagnosa dalam hitungan detik berdasarkan input gejala.</p>
                    </div>
                </div>
                <div class="flex items-start gap-4">
                    <span class="material-symbols-outlined text-primary p-2 bg-primary/10 rounded-lg">verified</span>
                    <div>
                        <h3 class="font-bold">Terverifikasi Pakar</h3>
                        <p class="text-sm text-on-surface-variant">Basis pengetahuan yang disusun berdasarkan literatur medis kedokteran hewan.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-surface-container-low p-8 rounded-3xl border border-primary/10">
            <img src="https://images.unsplash.com/photo-1551300730-490bbe5785a2?q=80&w=1471&auto=format&fit=crop" alt="Pigeon Research" class="rounded-2xl shadow-xl mb-6 object-cover h-64 w-full">
            <blockquote class="italic text-on-surface-variant border-l-4 border-primary pl-4">
                "Kesehatan merpati Anda adalah prioritas kami. Deteksi dini adalah kunci dari kesuksesan pengobatan."
            </blockquote>
        </div>
    </div>

    <!-- Features Section -->
    <section class="bg-inverse-surface text-surface p-12 rounded-3xl mb-20">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-black mb-4 text-surface">Teknologi di Balik Layar</h2>
            <p class="text-surface/70 max-w-xl mx-auto">Kami menggunakan pendekatan berbasis data untuk memastikan akurasi diagnosa.</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-8">
            <div class="text-center p-6 border border-surface/10 rounded-2xl">
                <h3 class="text-xl font-bold mb-2 text-surface">Forward Chaining</h3>
                <p class="text-sm text-surface/60">Mesin inferensi yang bergerak dari fakta (gejala) menuju kesimpulan (penyakit).</p>
            </div>
            <div class="text-center p-6 border border-surface/10 rounded-2xl">
                <h3 class="text-xl font-bold mb-2 text-surface">Dynamic Data</h3>
                <p class="text-sm text-surface/60">Integrasi database MySQL untuk pengelolaan pengetahuan penyakit yang mutakhir.</p>
            </div>
            <div class="text-center p-6 border border-surface/10 rounded-2xl">
                <h3 class="text-xl font-bold mb-2 text-surface">Material UI</h3>
                <p class="text-sm text-surface/60">Antarmuka modern berbasis Material Design 3 untuk pengalaman pengguna yang optimal.</p>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="text-center">
        <h2 class="text-3xl font-extrabold mb-8">Siap Memulai Diagnosa?</h2>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="konsultasi.php" class="px-10 py-4 bg-primary text-on-primary rounded-xl font-bold hover:bg-primary-dim transition-all shadow-lg hover:shadow-primary/20">
                Mulai Konsultasi Gratis
            </a>
            <a href="katalog.php" class="px-10 py-4 bg-surface-container-high text-on-surface rounded-xl font-bold hover:bg-surface-container-highest transition-all">
                Lihat Katalog Penyakit
            </a>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
