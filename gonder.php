<?php
    // XSS koruması için yardımcı fonksiyon
    function clean($value) {
        return htmlspecialchars(trim($value ?? ''), ENT_QUOTES, 'UTF-8');
    }
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Sonuçları | PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f0f4f8; }
        .card { border: none; border-radius: 16px; }
        .card-header { border-radius: 16px 16px 0 0 !important; }
        .table td:first-child { width: 200px; font-weight: 600; background: #f8f9fa; }
        .color-preview { display: inline-block; width: 28px; height: 28px; border-radius: 6px; vertical-align: middle; border: 1px solid #ddd; margin-right: 8px; }
    </style>
</head>
<body class="bg-light p-4">
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-success text-white py-3">
            <h1 class="h4 mb-0 text-center">✅ FORM VERİLERİ BAŞARIYLA ALINDI</h1>
        </div>
        <div class="card-body p-4">
            <p class="text-muted text-center mb-4">
                <i class="bi bi-clock"></i> Gönderim zamanı: <strong><?php echo date("d.m.Y H:i:s"); ?></strong>
            </p>

            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Alan</th>
                        <th>Girilen Değer</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Ad Soyad</td>
                        <td><?= clean($_POST["ad"] ?? '') ?: '<span class="text-muted">—</span>' ?></td>
                    </tr>
                    <tr>
                        <td>Şifre (Parola)</td>
                        <td>
                            <?php 
                                $parola = $_POST["parola"] ?? '';
                                echo $parola ? str_repeat('•', mb_strlen($parola)) : '<span class="text-muted">—</span>';
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>E-Posta</td>
                        <td><?= clean($_POST["email"] ?? '') ?: '<span class="text-muted">—</span>' ?></td>
                    </tr>
                    <tr>
                        <td>Yaş</td>
                        <td><?= clean($_POST["yas"] ?? '') ?: '<span class="text-muted">—</span>' ?></td>
                    </tr>
                    <tr>
                        <td>Telefon</td>
                        <td><?= clean($_POST["telefon"] ?? '') ?: '<span class="text-muted">—</span>' ?></td>
                    </tr>
                    <tr>
                        <td>Web Sayfası</td>
                        <td>
                            <?php 
                                $web = clean($_POST["website"] ?? '');
                                echo $web ? '<a href="' . $web . '" target="_blank">' . $web . '</a>' : '<span class="text-muted">—</span>';
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Doğum Tarihi</td>
                        <td><?= clean($_POST["dogumtarihi"] ?? '') ?: '<span class="text-muted">—</span>' ?></td>
                    </tr>
                    <tr>
                        <td>Saat</td>
                        <td><?= clean($_POST["saat"] ?? '') ?: '<span class="text-muted">—</span>' ?></td>
                    </tr>
                    <tr>
                        <td>Cinsiyet</td>
                        <td><?= clean($_POST["cinsiyet"] ?? '') ?: '<span class="text-muted">—</span>' ?></td>
                    </tr>
                    <tr>
                        <td>Şehir</td>
                        <td><?= clean($_POST["sehir"] ?? '') ?: '<span class="text-muted">—</span>' ?></td>
                    </tr>
                    <tr>
                        <td>Mesaj</td>
                        <td><?= nl2br(clean($_POST["mesaj"] ?? '')) ?: '<span class="text-muted">—</span>' ?></td>
                    </tr>
                    <tr>
                        <td>Memnuniyet Oranı</td>
                        <td>
                            <?php 
                                $mem = clean($_POST["memnuniyet"] ?? '');
                                if ($mem !== '') {
                                    echo '<div class="d-flex align-items-center gap-2">';
                                    echo '<div class="progress flex-grow-1" style="height:20px;">';
                                    echo '<div class="progress-bar bg-success" style="width:' . $mem . '%">' . $mem . '%</div>';
                                    echo '</div></div>';
                                } else {
                                    echo '<span class="text-muted">—</span>';
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Favori Renk</td>
                        <td>
                            <?php 
                                $renk = clean($_POST["renk"] ?? '');
                                if ($renk) {
                                    echo '<span class="color-preview" style="background:' . $renk . ';"></span>' . $renk;
                                } else {
                                    echo '<span class="text-muted">—</span>';
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Hobiler</td>
                        <td>
                            <?php 
                                if (!empty($_POST["hobiler"])) {
                                    foreach ($_POST["hobiler"] as $hobi) {
                                        echo '<span class="badge bg-primary me-1 mb-1 p-2">' . clean($hobi) . '</span>';
                                    }
                                } else {
                                    echo '<span class="text-muted">Belirtilmedi</span>';
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Gizli Değişken</td>
                        <td><?= clean($_POST["gizli_form_ogesi"] ?? '') ?: '<span class="text-muted">—</span>' ?></td>
                    </tr>
                    <tr>
                        <td>Form Tipi</td>
                        <td><?= clean($_POST["form_tipi"] ?? '') ?: '<span class="text-muted">—</span>' ?></td>
                    </tr>

                    <?php if (isset($_FILES["dosya"]) && $_FILES["dosya"]["error"] === 0): ?>
                    <tr>
                        <td>Yüklenen Dosya</td>
                        <td>
                            📎 <strong><?= clean($_FILES["dosya"]["name"]) ?></strong><br>
                            <small class="text-muted">Boyut: <?= number_format($_FILES["dosya"]["size"] / 1024, 2) ?> KB
                            | Tür: <?= clean($_FILES["dosya"]["type"]) ?></small>
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <div class="text-center mt-4">
                <a href="iletisim.html" class="btn btn-outline-primary btn-lg">
                    ← Forma Geri Dön
                </a>
            </div>
        </div>
    </div>
</div>
</body>
</html>