<div id="content">                   
    <div class="row-fluid">
        <!-- block --> 
          <div class="block">
              <div class="navbar navbar-inner block-header">
                <div class="muted pull-left"> Laporan Pemesanan Katering </div>
</div>
                 <div class="block-content collapse in">
             <div class="span12">  
          <form class="form-horizontal" method="post" action="halaman/hal_laporan_mingguan/laporan_mingguan.php" target="_blank">
                          <fieldset>
                            <legend>Form Laporan Pemesanan Mingguan</legend>
                            <input type='hidden' name='id' value='<?=$id?>'> 
                             
                            <div class="control-group">
                              <label class="control-label" for="tglm">Dari Tanggal </label>
                              <div class="controls">
                              <input type="text" class="input-medium datepicker" name="tglm" id="tglm" required>
                              </div>
                            </div>

                            <div class="control-group">
                              <label class="control-label" for="tgls">Sampai Tanggal </label>
                              <div class="controls">
                              <input type="text" class="input-medium datepicker" name="tgls" id="tgls" required>
                              </div>
                            </div>

                            <div class="control-group">
                              <label class="control-label" for="pass"> </label>
                              <div class="controls">
                              <button type="submit" class="btn btn-primary"> Lihat Laporan </button>
                        <button type="reset" class="btn btn-danger" onclick=self.history.back() >Batal</button> 
                              </div>
                            </div>                         
                          </fieldset>
                        </form> 
                </div>
            </div>
        </div> 
        <!-- /block -->
    </div>
</div>
