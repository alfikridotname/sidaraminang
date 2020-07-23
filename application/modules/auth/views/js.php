<script>
  function base_url(url) {
    return "<?= base_url(); ?>" + url;
  }

  $('#form-login').submit(function(e) {
    e.preventDefault();

    $.ajax({
      url: base_url('auth/login'),
      type: 'POST',
      dataType: 'JSON',
      data: $(this).serialize(),
      success: function(x) {
        if (x.success == true) {
          window.location.href = base_url('dashboard');
        }
      }
    });
  });
</script>