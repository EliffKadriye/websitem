<?php
    // Karakter seti ve Başlık
    echo '<meta charset="utf-8">';
    echo "<title>Form Sonuçları | PHP</title>";
    echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">';
?>

<body class="bg-light p-5">
    <div class="container">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h1 class="h3 mb-0">KAYIT FORMUNDAN GELEN VERİLER</h1>
            </div>
            <div class="card-body">
                <p class="text-muted">Bugünün tarihi: <?php echo date("d.m.Y H:i:s"); ?></p>
                <hr>

                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Alan Adı</th>
                            <th>Girilen Veri</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td><b>Ad Soyad:</b></td><td><?php echo $_POST["ad"] ?? "-"; ?></td></tr>
                        <tr><td><b>Şifre (Parola):</b></td><td><?php echo $_POST["parola"] ?? "-"; ?></td></tr>
                        <tr><td><b>E-Posta:</b></td><td><?php echo $_POST["email"] ?? "-"; ?></td></tr>
                        <tr><td><b>Yaş:</b></td><td><?php echo $_POST["yas"] ?? "-"; ?></td></tr>
                        <tr><td><b>Telefon:</b></td><td><?php echo $_POST["telefon"] ?? "-"; ?></td></tr>
                        <tr><td><b>Web Sayfası:</b></td><td><?php echo $_POST["website"] ?? "-"; ?></td></tr>
                        <tr><td><b>Doğum Tarihi:</b></td><td><?php echo $_POST["dogumtarihi"] ?? "-"; ?></td></tr>
                        <tr><td><b>Saat:</b></td><td><?php echo $_POST["saat"] ?? "-"; ?></td></tr>
                        <tr><td><b>Cinsiyet:</b></td><td><?php echo $_POST["cinsiyet"] ?? "-"; ?></td></tr>
                        <tr><td><b>Şehir:</b></td><td><?php echo $_POST["sehir"] ?? "-"; ?></td></tr>
                        <tr><td><b>İletilen Mesaj:</b></td><td><?php echo $_POST["mesaj"] ?? "-"; ?></td></tr>
                        <tr><td><b>Memnuniyet Oranı:</b></td><td><?php echo $_POST["memnuniyet"] ?? "-"; ?></td></tr>
                        <tr><td><b>Favori Renk:</b></td><td><div style="width:30px; height:30px; background:<?php echo $_POST["renk"]; ?>; border-radius:5px;"></div> <?php echo $_POST["renk"]; ?></td></tr>
                        <tr><td><b>Gizli Değişken:</b></td><td><?php echo $_POST["gizli_form_ogesi"] ?? "-"; ?></td></tr>
                        <tr><td><b>Form Tipi:</b></td><td><?php echo $_POST["form_tipi"] ?? "-"; ?></td></tr>
                        
                        <tr>
                            <td><b>Hobiler:</b></td>
                            <td>
                                <?php 
                                    if(isset($_POST["hobiler"])) {
                                        foreach($_POST["hobiler"] as $hobi) {
                                            echo '<span class="badge bg-secondary me-1">' . htmlspecialchars($hobi) . '</span>';
                                        }
                                    } else { echo "Belirtilmedi"; }
                                ?>
                            </td>
                        </tr>

                        <?php if(isset($_FILES["dosya"]) && $_FILES["dosya"]["error"] == 0): ?>
                        <tr>
                            <td><b>Yüklenen Dosya:</b></td>
                            <td>
                                Adı: <?php echo $_FILES["dosya"]["name"]; ?><br>
                                Boyut: <?php echo number_format($_FILES["dosya"]["size"] / 1024, 2); ?> KB
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>

                <div class="text-center mt-4">
                    <a href="iletisim.html" class="btn btn-outline-primary">Forma Geri Dön</a>
                </div>
            </div>
        </div>
    </div>
</body>