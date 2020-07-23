<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).ready(function() {
        $('#nik').focus();
        $('#detail').hide();
        $('#btn-register').hide();
    });

    function show_data() {
        $('#btn-cari').html('Cari...')
            .prop('disabled', true);
        let form = 'form-register';
        $.ajax({
            url: base_url('registrasi/get_data_user'),
            type: 'POST',
            dataType: 'JSON',
            data: $('#' + form).serialize(),
            success: function(x) {
                if (x.success == true) {
                    $('#detail').show();
                    $('#nama').val(x.nama);
                    $('#tgl_lahir').val(x.tgl_lahir);
                    $('#btn-cari').hide();
                    $('#btn-register').show();
                } else {
                    $('#notif').html(`<div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        ${x.message}
                    </div>`);
                    $('#' + form)[0].reset();
                    $('#detail').hide();
                    $('#btn-cari').html('Cari')
                        .prop('disabled', false);
                }
            }
        });
    }

    function register() {
        let form = 'form-register';
        $.ajax({
            url: base_url('registrasi/register'),
            type: 'POST',
            dataType: 'JSON',
            data: $('#' + form).serialize(),
            success: function(x) {
                if (x.success == true) {
                    swal("Selamat !", "Registrasi telah berhasil", "success");
                    setTimeout(function() {
                        window.location.href = "<?php base_url('/'); ?>";
                    }, 2000);
                } else {
                    $('#notif').html(`<div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        ${x.message}
                    </div>`);
                    $('#' + form)[0].reset();
                    $('#detail').hide();
                }
            }
        });
    }

    function base_url(url) {
        let base = "<?php echo base_url(); ?>" + url;
        return base;
    }
</script>