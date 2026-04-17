<?php
require_once 'includes/functions.php';
include 'includes/header.php';

$id = $_GET['id'] ?? '';
$penyakit = get_penyakit_by_id($pdo, $id);

if (!$penyakit) {
    header('Location: katalog.php');
    exit;
}
?>

<main class="pt-32 pb-20 px-6 max-w-screen-xl mx-auto">
    <header class="mb-12">
        <a href="katalog.php" class="inline-flex items-center gap-2 text-primary font-bold mb-6 hover:gap-3 transition-all">
            <span class="material-symbols-outlined">arrow_back</span> Kembali ke Katalog
        </a>
        <h1 class="text-4xl md:text-5xl font-black tracking-tight text-primary mb-4 leading-none"><?= htmlspecialchars($penyakit['nama']) ?></h1>
        <div class="flex items-center gap-2 text-on-surface-variant">
            <span class="material-symbols-outlined text-primary">verified</span>
            <span class="text-sm font-semibold tracking-wide uppercase">Informasi Penyakit Terverifikasi</span>
        </div>
    </header>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        <div class="lg:col-span-8 space-y-8">
            <section class="bg-surface-container-low rounded-xl p-8 border border-primary/10">
                <h2 class="text-2xl font-extrabold text-on-surface mb-6">Deskripsi</h2>
                <p class="text-on-surface leading-relaxed text-lg">
                    <?= nl2br(htmlspecialchars($penyakit['deskripsi'])) ?>
                </p>
            </section>

            <section class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-surface-container-lowest border-l-4 border-primary p-6 rounded-xl shadow-sm">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="material-symbols-outlined text-primary">security</span>
                        <h3 class="font-extrabold text-xl">Langkah Penanganan</h3>
                    </div>
                    <div class="text-on-surface-variant leading-relaxed">
                        <?= nl2br(htmlspecialchars($penyakit['solusi'])) ?>
                    </div>
                </div>
                <div class="bg-surface-container-lowest border-l-4 border-secondary p-6 rounded-xl shadow-sm">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="material-symbols-outlined text-secondary">vaccines</span>
                        <h3 class="font-extrabold text-xl">Tips Pencegahan</h3>
                    </div>
                    <div class="text-on-surface-variant leading-relaxed">
                        <?= nl2br(htmlspecialchars($penyakit['pencegahan'])) ?>
                    </div>
                </div>
            </section>
        </div>

        <aside class="lg:col-span-4">
            <div class="bg-surface-container-low rounded-xl overflow-hidden">
                <div class="w-full h-48 bg-primary-container flex items-center justify-center">
                    <span class="material-symbols-outlined text-6xl text-primary/30">medical_services</span>
                </div>
                <div class="p-6">
                    <h3 class="font-bold text-on-surface mb-2">ID Penyakit</h3>
                    <p class="text-primary font-mono font-bold text-xl"><?= htmlspecialchars($penyakit['id']) ?></p>
                </div>
            </div>
        </aside>
    </div>
</main>

<?php include 'includes/footer.php'; ?>
