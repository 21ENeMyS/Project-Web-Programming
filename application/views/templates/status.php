<?php
if ($status == 'waiting') {
  $status = 'Menunggu Pembayaran';
  $badge_status = 'badge-warning';
}

if ($status == 'paid') {
  $status = 'Dibayar';
  $badge_status = 'badge-primary';
}

if ($status == 'delivered') {
  $status = 'Dikirim';
  $badge_status = 'badge-success';
}

if ($status == 'cancel') {
  $status = 'Dibatalkan';
  $badge_status = 'badge-danger';
}

?>
<?php if ($status) :   ?>
  <h5>
    <span class="badge <?= $badge_status; ?>"><?= $status; ?></span>
  </h5>
<?php endif; ?>