<?php
// Formdan gelen verileri alıyoruz 
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

$dogru_email = "kadriye.yalcinkaya@ogr.sakarya.edu.tr";
// HATA BURADAYDI: Virgül yerine noktalı virgül kullanmalısınız
$dogru_password = "b251210037"; 

// Öğrenci numarasını e-postadan ayıklıyoruz
$userNo = explode('@', $email)[0];

// Giriş kontrolü
if ($email === $dogru_email && $password === $dogru_password) {
    // Başarılı giriş mesajı 
    // NOT: header() fonksiyonundan önce ekrana çıktı (echo) verirseniz yönlendirme hata verebilir.
    // Bu yüzden önce mesajı hazırlayıp yönlendirmeyi PHP veya HTML ile yapıyoruz.
    echo "<div style='text-align:center; margin-top:50px; font-family:sans-serif;'>
            <h1>Hoşgeldiniz " . htmlspecialchars($userNo) . "</h1>
            <p>Başarıyla giriş yaptınız. Ana sayfaya yönlendiriliyorsunuz...</p>
          </div>";
    
    header("Refresh: 3; url=index.html");
} else {
    // Hatalı giriş durumunda
    echo "<script>alert('Hatalı kullanıcı adı veya şifre!'); window.location.href='login.html';</script>";
}
?>