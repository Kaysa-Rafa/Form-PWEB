<?php include __DIR__ . '/partials/header.php'; ?>
<div class="card p-3 text-center">
  <h4>Canvas Minecraft</h4>
  <canvas id="mc" width="400" height="400" style="border:2px solid #333;"></canvas>
</div>

<script>
const c = document.getElementById('mc'), ctx2 = c.getContext('2d');
// draw simple pixel-block creeper-like face
ctx2.fillStyle='#0b3'; ctx2.fillRect(50,50,300,300);
ctx2.fillStyle='#032'; ctx2.fillRect(110,110,60,60);
ctx2.fillRect(230,110,60,60);
ctx2.fillRect(140,230,120,60);
</script>

<?php include __DIR__ . '/partials/footer.php'; ?>
