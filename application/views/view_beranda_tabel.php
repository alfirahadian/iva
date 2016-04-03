 <!DOCTYPE html>
  <html>
    <head>
      <title>IVAnet</title>
      <!-- Compiled and minified CSS -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/materialize.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/custom_beranda.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/lightbox.css">
      <!-- Compiled and minified JavaScript -->
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
      <script src="<?php echo base_url();?>assets/js/materialize.js"></script>
      <script src="<?php echo base_url();?>assets/js/jquery.tablesorter.js"></script> 
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
      <script type="text/javascript">
   $(document).ready(function() 
    { 
        $("#myTable").tablesorter( {dateFormat: 'pt'} ); 
    } 
); 
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

<!-- Tabel Gambar IVA Test -->
<div class="container">
<table id="myTable" class="tablesorter striped">
<thead>
          <tr>
              <th data-field="id">Tanggal pemeriksaan</th>
              <th data-field="name">Nama Pasien</th>
              <th data-field="puskesmas">Puskesmas</th>
              <th data-field="kabupaten">Kabupaten</th>
              <th data-field="provinsi">Provinsi</th>
              <th data-field="hasil_ssk">Hasil SSK</th>
              <th data-field="hasil_iva">Hasil IVA</th>
              <th data-field="note">Note</th>
              <th data-field="gambar">View SSK</th>
              <th data-field="gambar">View IVA</th>
          </tr>
</thead>
        <tbody>
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
         <tr>
           <td><?php echo date_format($tanggal, "d/M/y h:m:s") ?></td>
           <td><?php echo $nama ?></td>
           <td><?php echo $kecamatan ?></td>
           <td><?php echo $kabupaten ?></td>
           <td><?php echo $provinsi ?></td>
           <td><?php echo $status ?></td>
           <td><?php echo $status_iva ?></td>
           <td><?php echo $note ?></td>
           <td>
            <a href="<?php echo $filename ?>" data-lightbox="hasil_ssk" data-title="<?php echo $nama ?> | <?php echo date_format($tanggal, "d/M/y h:m:s") ?> | Kecamatan: <?php echo $kecamatan; ?> | Hasil SSK: <?php echo $status ?>"><img class="example-image" src="<?php echo $filename;?>" width="100" height="100"></a>
           </td>
            <td>
            <a href="<?php echo $filename_2 ?>" data-lightbox="hasil_iva" data-title="<?php echo $nama ?> | <?php echo date_format($tanggal, "d/M/y h:m:s") ?> | Kecamatan: <?php echo $kecamatan; ?> | Hasil IVA: <?php echo $status ?>"><img class="example-image" src="<?php echo $filename_2;?>" width="100" height="100"></a>
           </td>
         </tr>
<?php
  }
}
?>
        </tbody>
      </table>
</div>
      <!-- Floating Action Button -->
      <div class="row">
          <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
            <a class="btn-floating btn-large floating-button-custom" href="<?php echo site_url('maps');?>">
            <i class="large material-icons">location_on</i>
            </a>
        </div>
      </div>
<script src="<?php echo base_url();?>assets/js/lightbox.js"></script> 
 <script type="text/javascript">
        lightbox.option({
      'resizeDuration': 150,
      'wrapAround': true,
      'positionFromTop' : 200,
      'fitImagesInViewport' : true,
      'disableScrolling' : true

    })
      </script>
    </body>
  </html>