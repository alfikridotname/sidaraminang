<!-- Select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<script>
  $(document).ready(function() {
    show_select2();
  });

  function show_select2() {
    $('#id_provinsi').select2({
      placeholder: "Pilih Provinsi",
      allowClear: false,
      width: 'style',
      theme: 'bootstrap4'
    });
  }

  function show_laporan(x) {
    if (x != 0) {
      $('#tampil_pdf').show();
      $('#tampil_pdf').attr('src', base_url('laporan/rekap_provinsi?id_provinsi=') + x + '#view=FitH');
    }
  }
</script>