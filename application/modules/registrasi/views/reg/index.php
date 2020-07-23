<div class="register-box">


    <div class="card">
        <div class="card-body register-card-body">
            <div class="register-logo">
                <a href="javascript:;"><b>SIDARA </b>Minang</a>
            </div>
            <div id="notif"></div>
            <form id="form-register" method="post">
                <div class="form-group mb-3">
                    <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK" autocomplete="off" required="true">
                </div>
                <div id="detail">
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" readonly="true">
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="Tanggal Lahir" readonly="true">
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">

                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="button" onclick="show_data()" class="btn btn-primary btn-block" id="btn-cari">Cari</button>
                        <button type="button" onclick="register()" class="btn btn-primary btn-block" id="btn-register">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>