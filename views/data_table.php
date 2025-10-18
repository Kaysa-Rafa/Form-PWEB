<?php
include __DIR__ . '/partials/header.php';
$rows = $rows ?? [];
?>
<div class="card p-3">
  <h4>Daftar Petualangan</h4>
  <table id="table" class="table table-striped table-hover table-sm">
    <thead class="table-dark">
      <tr><th>#</th><th>User</th><th>World</th><th>Biome</th><th>Seed</th><th>Tanggal</th><th>Foto</th><th>TTD</th></tr>
    </thead>
    <tbody>
      <?php foreach ($rows as $i => $r): ?>
        <tr>
          <td><?= $i+1 ?></td>
          <td><?= htmlspecialchars($r['username']) ?></td>
          <td><?= htmlspecialchars($r['world_name']) ?></td>
          <td><?= htmlspecialchars($r['biome']) ?></td>
          <td><?= htmlspecialchars($r['seed']) ?></td>
          <td><?= htmlspecialchars($r['creation_date']) ?></td>
          <td><?php if($r['foto']): ?><img src="<?= htmlspecialchars($r['foto']) ?>" width="80"><?php endif; ?></td>
          <td><?php if($r['tanda_tangan']): ?><img src="<?= htmlspecialchars($r['tanda_tangan']) ?>" width="120"><?php endif; ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<!-- DataTables & Buttons -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

<script>
$(document).ready(function(){
  $('#table').DataTable({
    dom: 'Bfrtip',
    buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
  });
});
</script>

<?php include __DIR__ . '/partials/footer.php'; ?>
