<?php
// Formdan gelen verileri alıyoruz 
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Öğrenci numarasını e-postadan ayıklıyoruz (Mesajda kullanmak için)
$userNo = explode('@', $email)[0];

// Ödev kuralı: Şifre öğrenci numarası olmalı, kullanıcı adı tam mail olmalı 
if ($email == "b251210037@sakarya.edu.tr" && $password == "Elif.10115346696") {
    // Başarılı giriş mesajı 
    echo "<div style='text-align:center; margin-top:50px; font-family:sans-serif;'>
            <h1>Hoşgeldiniz " . htmlspecialchars($userNo) . "</h1>
            <p>Başarıyla giriş yaptınız. Ana sayfaya yönlendiriliyorsunuz...</p>
          </div>";
    header("Refresh: 3; url=index.html");
} else {
    // Hatalı giriş veya boş alan durumunda yönlendirme 
    echo "<script>alert('Hatalı kullanıcı adı veya şifre!'); window.location.href='login.html';</script>";
}
?>
