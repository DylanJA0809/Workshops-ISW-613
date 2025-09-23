<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Menú de Workshops</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet">

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    :root {
      --bg-color: #0a0f1a;
      --card-bg: #121b2c;
      --neon-blue: #00f0ff;
      --neon-pink: #ff2ed2;
      --text-color: #e0e0e0;
      --hover-glow: 0 0 12px rgba(0, 255, 255, 0.6);
    }

    body {
      background-color: var(--bg-color);
      color: var(--text-color);
      font-family: 'Orbitron', sans-serif;
      padding-top: 80px;
    }

    h1 {
      text-align: center;
      color: var(--neon-blue);
      margin-bottom: 40px;
      font-weight: 700;
      text-shadow: 0 0 10px var(--neon-blue);
    }

    .card-link {
      text-decoration: none;
    }

    .workshop-card {
      background-color: var(--card-bg);
      border: 2px solid var(--neon-blue);
      border-radius: 15px;
      padding: 25px;
      text-align: center;
      color: var(--neon-blue);
      transition: all 0.3s ease;
      box-shadow: 0 0 6px rgba(0, 255, 255, 0.2);
    }

    .workshop-card:hover {
      transform: translateY(-6px);
      box-shadow: var(--hover-glow);
      background-color: #1c2b42;
    }

    .workshop-card h5 {
      font-size: 1.3rem;
      margin-top: 10px;
      color: var(--text-color);
    }

    footer {
      text-align: center;
      color: #888;
      margin-top: 80px;
      font-size: 0.9rem;
    }

    .icon-glow {
      font-size: 2rem;
      color: var(--neon-pink);
      text-shadow: 0 0 8px var(--neon-pink);
    }
  </style>
</head>
<body>

  <div class="container">
    <h1>🖥️ Menú de Workshops - Programación en Ambiente Web I</h1>
    <div class="row g-4 justify-content-center">

      <?php
        $dirs = array_filter(glob('*'), 'is_dir');
        $dirs = array_filter($dirs, function($dir) {
          return $dir != 'extra' && $dir != '.' && $dir != '..';
        });
        sort($dirs, SORT_NATURAL | SORT_FLAG_CASE);
        foreach ($dirs as $dir) {
          echo "
          <div class='col-md-4 col-sm-6'>
            <a href='$dir/' class='card-link'>
              <div class='workshop-card'>
                <div class='icon-glow'>📁</div>
                <h5>$dir</h5>
              </div>
            </a>
          </div>";
        }
      ?>

    </div>
  </div>

  <footer>
    Desarrollado por Dylan Jiménez Alfaro • <?php echo date("Y"); ?>
  </footer>

</body>
</html>

