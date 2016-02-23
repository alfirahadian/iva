<!DOCTYPE html>
<html>
<head>
      <title>Upload Hasil IVA Test</title>
      <!-- Compiled and minified CSS -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/materialize.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/custom.css">
      <!-- Compiled and minified JavaScript -->
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script src="<?php echo base_url();?>assets/js/materialize.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            function loadKabupaten()
            {
                var propinsi = $("#propinsi").val();
                $.ajax({
                    type:'GET',
                    url:"<?php echo base_url(); ?>index.php/upload/kabupaten",
                    data:"id=" + propinsi,
                    success: function(html)
                    { 
                       $("#kabupatenArea").html(html);
                    }
                }); 
            }
            function loadKecamatan()
            {
                var kabupaten = $("#kabupaten").val();
                $.ajax({
                    type:'GET',
                    url:"<?php echo base_url(); ?>index.php/upload/kecamatan",
                    data:"id=" + kabupaten,
                    success: function(html)
                    { 
                        $("#kecamatanArea").html(html);
                    }
                }); 
            }
        </script>
      <!-- For load material icon -->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<div class="row">
        <div class="col s10 m5 l4 offset-l4 offset-m4 offset-s1">
              <div class="card">
                  <div class="card-content blue-grey darken-4 white-text ">
                        <span class="card-title">Upload hasil IVA Test</span>
                        </div>
                        <?php echo validation_errors('<p class="error">'); ?>
                              <?php echo form_open_multipart("upload/do_upload"); ?>
                        <div class="card-content black-text">
                              <div class="row">
                                      <div class="input-field col s12 l12">
                                        <label for="nama">Nama Pasien:</label>
                                        <input type="text" id="nama" name="nama" value="<?php echo set_value('nama'); ?>" />
                              </div>
                              <div class="row">
                                      <label>Provinsi</label>
                                     <select name="propinsi" id="propinsi" onchange="loadKabupaten()" class="browser-default">
                                        <?php
                                        foreach ($propinsi->result() as $p) {
                                            echo "<option value='$p->id'>$p->nama</option>";
                                        }
                                        ?>
                                    </select>
                              </div> 
                              <div class="row">
                                <p>
                                <p><div id="kabupatenArea"></div></p>
                                <p><div id="kecamatanArea"></div></p>  
                                </p>
                              </div>
                              <div class="row">
                                    <div class="input-field col s12 l12">
                                    <label>Hasil Test</label><br>
                                    <input name="status" type="radio" id="ssk_positif" value="SSK Positif" checked/>
                                    <label for="ssk_positif">SSK Positif</label><br>
                                    <input name="status" type="radio" id="ssk_negatif" value="SSK Negatif" />
                                    <label for="ssk_negatif">SSK Negatif</label><br>
                                    <input name="status" type="radio" id="iva_positif" value="IVA Positif" />
                                    <label for="iva_positif">IVA Positif</label><br>
                                    <input name="status" type="radio" id="iva_negatif" value="IVA Negatif" />
                                    <label for="iva_negatif">IVA Negatif</label>
                                    </div>
                              </div>
                              <div class="row">
                                <div class="col s12 l12">
                                <label>Upload image</label> <br>
                                <input name="userfile" type="file" placeholder="Masukkan file hasil IVA test" value="<?php echo set_value('userfile'); ?>">
                                </div>  
                              </div>
                              <div class="row right">
                                    <button class="btn waves-effect waves-light btn-small right" type="submit" value="upload">Kirim
                              <i class="material-icons right">send</i>
                                    </button>
                              </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>    
      </div>
</div> 
</body>
 <script type="text/javascript">
        $(document).ready(function() {
    $('propinsi').material_select();
});
      </script>
</html>