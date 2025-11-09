<?php
// TXT dosyasını oku
$oneriler = file("oneriler.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// Rastgele bir öneri seç
$secim = $oneriler[array_rand($oneriler)];
?>
<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <title>Bugün Ne Yapsam?</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">  
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/style.css">
  <script>
function getRandomColor() {
  const letters = '0123456789ABCDEF';
  let color = '#';
  for (let i = 0; i < 6; i++) {
    color += letters[Math.floor(Math.random() * 16)];
  }
  return color;
}

function changeBackground() {
  const color1 = getRandomColor();
  const color2 = getRandomColor();
  const angle = Math.floor(Math.random() * 360);
  const gradient = `linear-gradient(${angle}deg, ${color1}, ${color2})`;
  document.body.style.background = gradient;
  // Rengi localStorage'a kaydet
  localStorage.setItem('backgroundGradient', gradient);
}

// Sayfa yüklendiğinde kaydedilmiş rengi uygula
window.addEventListener('load', function() {
  const savedGradient = localStorage.getItem('backgroundGradient');
  if (savedGradient) {
    document.body.style.background = savedGradient;
  }
});

function yeniOneriyeGit(event) {
  event.preventDefault();
  changeBackground();
  setTimeout(() => {
    window.location.reload();
  }, 100);
}
  </script>

</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

  <div class="card shadow-lg text-center p-5 bounce-left"  style="max-width: 400px;">
    <h2 class="mb-3 text-secondary">Bugün Ne Yapsam?</h2>
    <h4 class="text-primary" id="daktext"><?= htmlspecialchars($secim) ?></h4>

    <form method="post" class="mt-4" onsubmit="yeniOneriyeGit(event)">
      <button type="submit" class="btn">Yeni Öneri Göster!</button>
    </form>

    <p class="mt-4 text-muted small">Sayfayı yenileyerek rastgele öneri alabilirsin.</p>
  </div>

</body>
</html>