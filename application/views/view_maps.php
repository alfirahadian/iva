<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>IVAnet Maps</title>
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
	<style type="text/css">
		body{ font: 62.5% "Trebuchet MS", sans-serif; margin: 50px;}
	</style>	
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<!-- memanggil library geoxml3 untuk parsing data kml ke peta -->
	<script type="text/javascript" src="http://geoxml3.googlecode.com/svn/branches/polys/geoxml3.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
	<script type="text/javascript">
	var peta;
	function peta_awal(){
		var jawa_barat = new google.maps.LatLng(-7.090911,107.668887);
		var petaoption = {
			zoom: 8,
			center: jawa_barat,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};

		peta = new google.maps.Map(document.getElementById("petaku"),petaoption);
		/** disini kita panggil function dari geoXML3 untuk memparsing file kml */
		var geoXml = new geoXML3.parser({map: peta});
		/** letak file kml */
		geoXml.parse('<?php echo base_url();?>assets/kml/final_release_iva.kml');
		google.maps.event.addListener(peta,'click',function(event){
			kasihtanda(event.latLng);
		});
	}
	</script>
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
	<body onload="peta_awal()">
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
            <a href="" class="brand-logo center">IVAnet MAPS</a>
            <ul class="right hide-on-med-and-down">
              <li><i class="fa fa-user left"></i>Welcome, Administrator. <?php //echo $this->session->userdata('nama');?></li>
              <li><a href=""><i class="material-icons">more_vert</i></a></li>
            </ul>
        </div>
      </nav>  
		<div id="petaku" style="height:500px"></div>
	</body>
</html>
