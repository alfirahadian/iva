<!DOCTYPE html>
<html>
<head>
      <title>Sign Up Page</title>
      <!-- Compiled and minified CSS -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/materialize.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/custom.css">
      <!-- Compiled and minified JavaScript -->
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script src="<?php echo base_url();?>assets/js/materialize.js"></script>
      <!-- For load material icon -->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<div class="row">
        <div class="col s12 m12 l4 offset-l4 offset-m4">
              <div class="card">
                  <div class="card-content blue-grey darken-4 white-text ">
                        <span class="card-title">Buat akun baru</span>
                        </div>
                        <?php echo validation_errors('<p class="error">'); ?>
                              <?php echo form_open("user/registration"); ?>
                        <div class="card-content black-text">
                              <div class="row">
                                      <div class="input-field col s12">
                                        <label for="nama">Nama:</label>
                                        <input type="text" id="nama" name="nama" value="<?php echo set_value('nama'); ?>" />
                              </div>
                              <div class="row">
                                    <div class="input-field col s12">
                                    <label>Jenis Kelamin :</label><br>
                                    <input name="jk" type="radio" id="pria" value="pria" checked/>
                                    <label for="pria">Pria</label>
                                    <input name="jk" type="radio" id="wanita" value="wanita" />
                                    <label for="wanita">Wanita</label>
                              </div>
                              <div class="row">
                                    <div class="input-field col s12">
                                    <label>Profesi :</label><br>
                                    <input name="profesi" type="radio" id="dokter" value="dokter" checked/>
                                    <label for="dokter">Dokter</label>
                                    <input name="profesi" type="radio" id="bidan" value="bidan"/>
                                    <label for="bidan">Bidan</label>
                                    </div>
                                    </div>
                              </div>           
                              <div class="row">
                                      <div class="input-field col s12">
                                        <label for="nip">Nomor Induk Pegawai</label>
                                            <input type="text" id="nip" name="nip" value="<?php echo set_value('nip'); ?>" />
                                     </div>
                              </div>
                               <div class="row">
                                      <div class="input-field col s12">
                                       <textarea id="alamat" name="alamat" class="materialize-textarea" value="<?php echo set_value('alamat'); ?>"></textarea>
                                       <label for="alamat">Alamat</label>
                                      </div>
                              </div> 
                              <div class="row">
                                      <div class="input-field col s12">
                                        <label for="password">Password:</label>
                                          <input type="password" id="password" name="password" value="<?php echo set_value('password'); ?>" />
                                      </div>
                              </div>
                              <div class="row">
                                      <div class="input-field col s12">
                                        <label for="con_password">Confirm Password:</label>
                                          <input type="password" id="con_password" name="con_password" value="<?php echo set_value('con_password'); ?>" />
                                      </div>
                              </div> 
                              <div class="row">
                                    <button class="btn waves-effect waves-light btn-small right" type="submit" value="Submit">Daftar
                              <i class="material-icons right">send</i>
                                    </button>
                              </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>    
      </div>
</div> 
</body>
</html>