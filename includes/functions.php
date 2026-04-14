<?php
require_once 'db.php';

/**
 * Fetch all symptoms from the database
 */
function get_all_gejala($pdo) {
    if (!$pdo) return [];
    $stmt = $pdo->query("SELECT * FROM gejala ORDER BY id ASC");
    return $stmt->fetchAll();
}

/**
 * Forward Chaining Algorithm
 * Returns all diseases with match percentages based on selected symptoms
 */
function get_diagnosa($pdo, $selected_gejala) {
    if (!$pdo || empty($selected_gejala)) return [];

    // Fetch all rules and their associated symptoms
    $stmt = $pdo->query("
        SELECT a.id as id_aturan, a.id_penyakit, ad.id_gejala
        FROM aturan a
        JOIN aturan_detail ad ON a.id = ad.id_aturan
    ");
    $rules_raw = $stmt->fetchAll();

    // Group rules by id_aturan
    $rules = [];
    foreach ($rules_raw as $row) {
        $rules[$row['id_aturan']]['id_penyakit'] = $row['id_penyakit'];
        $rules[$row['id_aturan']]['gejala'][] = $row['id_gejala'];
    }

    $disease_confidence = [];

    foreach ($rules as $rule_id => $rule_data) {
        $rule_gejala = $rule_data['gejala'];
        $id_penyakit = $rule_data['id_penyakit'];

        // Count how many symptoms of this rule are present in the selected symptoms
        $intersection = array_intersect($rule_gejala, $selected_gejala);
        $match_count = count($intersection);
        $total_rule_gejala = count($rule_gejala);

        if ($match_count > 0) {
            $confidence = ($match_count / $total_rule_gejala) * 100;
            if (!isset($disease_confidence[$id_penyakit]) || $confidence > $disease_confidence[$id_penyakit]) {
                $disease_confidence[$id_penyakit] = $confidence;
            }
        }
    }

    if (empty($disease_confidence)) return [];

    arsort($disease_confidence);

    $results = [];
    foreach ($disease_confidence as $id_penyakit => $confidence) {
        $stmt = $pdo->prepare("SELECT * FROM penyakit WHERE id = ?");
        $stmt->execute([$id_penyakit]);
        $penyakit = $stmt->fetch();
        if ($penyakit) {
            $penyakit['confidence'] = round($confidence, 2);
            $results[] = $penyakit;
        }
    }

    return $results;
}

/**
 * Save diagnosis result to history
 */
function save_diagnosa($pdo, $nama_merpati, $id_penyakit, $gejala_terpilih, $confidence) {
    if (!$pdo) return false;
    $stmt = $pdo->prepare("INSERT INTO diagnosa (nama_merpati, id_penyakit, gejala_terpilih, confidence) VALUES (?, ?, ?, ?)");
    return $stmt->execute([$nama_merpati, $id_penyakit, implode(',', $gejala_terpilih), $confidence]);
}

/**
 * Get diagnosis history
 */
function get_riwayat($pdo) {
    if (!$pdo) return [];
    $stmt = $pdo->query("
        SELECT d.*, p.nama as nama_penyakit
        FROM diagnosa d
        LEFT JOIN penyakit p ON d.id_penyakit = p.id
        ORDER BY d.tanggal DESC
    ");
    return $stmt->fetchAll();
}

/**
 * Get all diseases for catalog
 */
function get_all_penyakit($pdo) {
    if (!$pdo) return [];
    $stmt = $pdo->query("SELECT * FROM penyakit ORDER BY id ASC");
    return $stmt->fetchAll();
}

/**
 * Get specific disease by ID
 */
function get_penyakit_by_id($pdo, $id) {
    if (!$pdo) return null;
    $stmt = $pdo->prepare("SELECT * FROM penyakit WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}
?>
