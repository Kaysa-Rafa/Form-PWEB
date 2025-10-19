<?php include __DIR__ . '/partials/header.php'; ?>

<div class="form-container">
  <h2>🧱 Tambah Dunia Minecraft</h2>

  <form action="index.php?action=submit" method="POST" enctype="multipart/form-data">
    <label>Nama Dunia</label>
    <input type="text" name="world_name" required>

    <label>Biome</label>
    <select name="biome" required>
      <option value="">-- Pilih Biome --</option>
      <option value="Plains">🌾 Plains</option>
      <option value="Forest">🌲 Forest</option>
      <option value="Desert">🏜️ Desert</option>
      <option value="Jungle">🌴 Jungle</option>
      <option value="Taiga">🌲 Taiga</option>
      <option value="Savanna">🌻 Savanna</option>
      <option value="Snowy Tundra">❄️ Snowy Tundra</option>
      <option value="Mountains">⛰️ Mountains</option>
      <option value="Swamp">🪵 Swamp</option>
      <option value="Nether Wastes">🔥 Nether Wastes</option>
      <option value="Crimson Forest">❤️ Crimson Forest</option>
      <option value="Warped Forest">💙 Warped Forest</option>
      <option value="Basalt Deltas">⚫ Basalt Deltas</option>
      <option value="End Highlands">🌌 End Highlands</option>
      <option value="End Midlands">🌙 End Midlands</option>
      <option value="End Barrens">🌑 End Barrens</option>
    </select>

    <label>Seed Dunia</label>
    <input type="text" name="seed" required>

    <label>Screenshot Dunia (Opsional)</label>
    <input type="file" name="screenshot" accept="image/*">

    <label>Tanda Tangan (gunakan mouse)</label>
    <canvas id="signatureCanvas" width="500" height="200"></canvas>
    <input type="hidden" name="signature_data" id="signature_data">

    <button type="button" class="btn" onclick="clearCanvas()">Hapus</button>
    <button type="submit" class="btn">Simpan</button>
  </form>
</div>

<script>
const canvas = document.getElementById('signatureCanvas');
const ctx = canvas.getContext('2d');
let drawing = false;

canvas.addEventListener('mousedown', () => drawing = true);
canvas.addEventListener('mouseup', () => drawing = false);
canvas.addEventListener('mousemove', draw);

function draw(e) {
  if (!drawing) return;
  ctx.lineWidth = 2;
  ctx.lineCap = 'round';
  ctx.strokeStyle = '#00ff99';
  ctx.lineTo(e.offsetX, e.offsetY);
  ctx.stroke();
  ctx.beginPath();
  ctx.moveTo(e.offsetX, e.offsetY);
}

function clearCanvas() {
  ctx.clearRect(0, 0, canvas.width, canvas.height);
}

document.querySelector('form').addEventListener('submit', () => {
  const dataURL = canvas.toDataURL('image/png');
  document.getElementById('signature_data').value = dataURL;
});
</script>

<?php include __DIR__ . '/partials/footer.php'; ?>
