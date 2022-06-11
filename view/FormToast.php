<?php
$toastIsErr = !isset($isError) || $isError;
?>
<?php if (isset($message)) : ?>
  <div class="toast align-items-center <?php echo $toastIsErr ? "bg-danger" : "bg-success" ?> text-light border-0 top-0 end-0 mt-3 me-3 position-absolute">
    <div class="toast-body d-flex justify-content-between align-items-center">
      <?php echo $message ?>
      <i class="bi <?php echo $toastIsErr ? "bi-exclamation" : "bi-check" ?> fs-4"></i>
    </div>
  </div>
<?php endif ?>
<script>
  const toastElList = document.querySelectorAll('.toast')
  const toastList = [...toastElList].map(toastEl => new bootstrap.Toast(toastEl))
  toastList.forEach(e => e.show());
</script>