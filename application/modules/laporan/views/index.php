<?php

/**
 * Author     : Alfikri, M.Kom
 * Created By : Alfikri, M.Kom
 * E-Mail     : alfikri.name@gmail.com
 * No HP      : 081277337405
 */
?>
<div class="mb-3 card">
  <div class="card-body">
    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label for="id_provinsi"><strong>Pilih Provinsi</strong></label>
          <br>
          <select name="id_provinsi" id="id_provinsi" class="form-control select2bs4" style="width: 300px;" onchange="show_laporan(this.value)">
            <option></option>
            <?php foreach ($provinsi as $key => $value) : ?>
              <option value="<?= $value->kode; ?>"><?= $value->nama; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
    </div>
    <div class="row">
      <iframe id="tampil_pdf" style="display: none;" src="" width="100%" height="768px"></iframe>
    </div>
  </div>
</div>