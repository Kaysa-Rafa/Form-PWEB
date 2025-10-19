<?php include __DIR__ . '/partials/header.php'; ?>

<div class="table-container">
  <h2>📸 Data Dunia Minecraft</h2>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Nama Dunia</th>
        <th>Biome</th>
        <th>Seed</th>
        <th>Screenshot</th>
        <th>Tanda Tangan</th>
        <th>Tanggal</th>
      </tr>
    </thead>
    <tbody>
      <?php if (!empty($data)): ?>
        <?php foreach ($data as $row): ?>
          <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['username']) ?></td>
            <td><?= htmlspecialchars($row['world_name']) ?></td>
            <td><?= htmlspecialchars($row['biome']) ?></td>
            <td><?= htmlspecialchars($row['seed']) ?></td>
            <td>
              <?php if (!empty($row['screenshot'])): ?>
                <img src="<?= htmlspecialchars($row['screenshot']) ?>" width="100">
              <?php else: ?> -
              <?php endif; ?>
            </td>
            <td>
              <?php if (!empty($row['signature'])): ?>
                <img src="<?= htmlspecialchars($row['signature']) ?>" width="100">
              <?php else: ?> -
              <?php endif; ?>
            </td>
            <td><?= htmlspecialchars($row['creation_date']) ?></td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr><td colspan="8" style="text-align:center;">Belum ada data!</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<?php include __DIR__ . '/partials/footer.php'; ?>
