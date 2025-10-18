<?php include __DIR__ . '/partials/header.php'; ?>
<div class="card p-4">
  <h4>Form Petualangan</h4>
  <form action="index.php?action=submit" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label class="form-label">Nama Dunia</label>
      <input type="text" name="world_name" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Biome</label>
      <select name="biome" class="form-select" required>
        <option value="Overworld">Overworld</option>
        <option value="Nether">Nether</option>
        <option value="End">End</option>
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label">Seed</label>
      <input type="text" name="seed" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Tanggal Pembuatan</label>
      <input type="date" name="creation_date" class="form-control" value="<?= date('Y-m-d'); ?>">
    </div>

    <div class="mb-3">
      <label class="form-label">Upload Foto (opsional)</label>
      <input type="file" name="foto" class="form-control" accept="image/*">
    </div>

    <div class="mb-3">
      <label class="form-label">Tanda Tangan (canvas)</label><br>
      <canvas id="signature" width="600" height="150" style="border:2px solid #333; background:#fff;"></canvas>
      <input type="hidden" name="tanda_tangan" id="tanda_tangan">
      <div class="mt-2">
        <button type="button" id="clearSig" class="btn btn-sm btn-outline-secondary">Hapus</button>
      </div>
    </div>

    <div class="d-grid">
      <button class="btn btn-glow">Simpan Petualangan</button>
    </div>
  </form>
</div>

<script>
/* simple signature capture */
const canvas = document.getElementById('signature');
const ctx = canvas.getContext('2d');
let drawing=false;
canvas.addEventListener('mousedown', e=>{drawing=true; ctx.beginPath();});
canvas.addEventListener('mouseup', e=>{drawing=false; ctx.closePath();});
canvas.addEventListener('mouseout', e=>{drawing=false; ctx.closePath();});
canvas.addEventListener('mousemove', e=>{ if(!drawing) return; const r=canvas.getBoundingClientRect(); ctx.strokeStyle='#0a0'; ctx.lineWidth=2; ctx.lineTo(e.clientX-r.left, e.clientY-r.top); ctx.stroke(); ctx.beginPath(); ctx.moveTo(e.clientX-r.left, e.clientY-r.top); });

document.getElementById('clearSig').addEventListener('click', ()=>{ ctx.clearRect(0,0,canvas.width,canvas.height); document.getElementById('tanda_tangan').value=''; });

document.querySelector('form').addEventListener('submit', function(e){
  // encode canvas to base64 and set hidden input
  const dataURL = canvas.toDataURL('image/png');
  document.getElementById('tanda_tangan').value = dataURL;
});
</script>

<?php include __DIR__ . '/partials/footer.php'; ?>
