 <!DOCTYPE html>
  <html>
    <head>
      <title>IVAnet</title>
      <!-- Compiled and minified CSS -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/materialize.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/custom_beranda.css">
      <!-- Compiled and minified JavaScript -->
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script src="<?php echo base_url();?>assets/js/materialize.js"></script>
      <!-- For load material icon -->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <script type="text/javascript">
      $('.fixed-action-btn').openFAB();
      $('.fixed-action-btn').closeFAB();
      </script>
      <script type="text/javascript" >
        // Initialize collapse button
        $(document).ready(function(){
        // Hide sideNav
        $('.button-collapse').sideNav();
          });
      </script>
    </head>
    <body>
      <!-- Navigation bar -->
      <nav class="navbar-custom">
        <div class="nav-wrapper">
              <ul id="slide-out" class="side-nav custom-sidebar full">
                <li></li>
                <li></li>
                  <li><a href="#"><i class="fa fa-home left"></i>Home</a></li>
                  <li class="divider"></li>
                  <li class="no-padding">
                    <ul class="collapsible collapsible-accordion custom-sidebar">
                      <li>
                        <a class="collapsible-header">Pasienku<i class="fa fa-user left"></i><i class="material-icons right">arrow_drop_down</i></a>
                        <div class="collapsible-body">
                          <ul>
                            <li><a href="#!">Daftar Pasien</a></li>
                            <li><a href="#!">Hasil IVA Test</a></li>
                          </ul>
                        </div>
                      </li>
                    </ul>
                  </li>
                  <li><a href="#"><i class="fa fa-question-circle left"></i>Help</a></li>
                  <li><a href="<?php echo site_url('user/logout');?>"><i class="fa fa-sign-out left"></i>Logout</a></li>
                </ul>
            <a href="#" data-activates="slide-out" class="button-collapse show-on-large"><i class="large mdi-navigation-menu"></i></a>
            <a href="" class="brand-logo center">IVAnet</a>
            <ul class="right hide-on-med-and-down">
              <li><i class="fa fa-user left"></i>Welcome, <?php echo $this->session->userdata('nama');?></li>
              <li><a href=""><i class="material-icons">more_vert</i></a></li>
            </ul>
        </div>
      </nav>  
      <!-- Gambar IVA Test -->
      
<?php 
    if (is_array($beranda)){
      foreach ($beranda as $key ) {
        $filename = $key->filename;
        $filename_2 = $key->filename_2;
        $nama = $key->nama_pasien;
        $note = $key->note;
        $provinsi = $key->provinsi;
        $kabupaten = $key->kabupaten;
        $kecamatan = $key->kecamatan;
        $status = $key->status;
        $status_iva = $key->status_iva;
        $time = $key->time;
        $tanggal = date_create($time)
?>
      <div class="row">
      <div class="col s12 m4 l4 offset-l4">
        <div class="card-panel teal small">
        <table>
        <tr>
          <td><img src="<?php echo $filename ?>" width="100" height="100">
          <img src="<?php echo $filename_2 ?>" width="100" height="100"></td>
          <td><span class="white-text">
            Tanggal : <?php echo date_format($tanggal, "D, d-M-Y H:i:s") ?> <br>
            Nama Pasien : <?php echo $nama ?> <br>
            Provinsi : <?php echo $provinsi ?> <br>
            Kabupaten : <?php echo $kabupaten ?> <br>
            Puskesmas Kecamatan : <?php echo $kecamatan ?> <br>
            Hasil SSK Test : <?php echo $status ?> <br>
            Hasil IVA Test : <?php echo $status_iva ?> <br>
            Note : <?php echo $note ?> <br>
          </span></td>
        </tr>
        </table>
        </div>
      </div>
      </div>
<?php
    }
}
?> 
    
      <!-- Floating Action Button -->
      <div class="row">
          <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
            <a class="btn-floating btn-large floating-button-custom" href="<?php echo site_url('maps');?>">
            <i class="large material-icons">location_on</i>
            </a>
        </div>
      </div>
    </body>
  </html>