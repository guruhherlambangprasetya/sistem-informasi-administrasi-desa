<legend></legend>
<div class="panel panel-default">
    <div class="panel-body"><center><h3>TENTANG PORTAL RW 017 & NOMOR PENTING/NOMOR DARURAT</h3></center></div>
	</div>
</div>	
<div class="jumbotron">
	<div class="row">
		<?php
			$i=0;
			foreach($tentang as $tentang)
			{
			$i++;
		?>	
		<?php 
			$id_tentang = $tentang->id_tentang;
			$isi_tentang = $tentang->isi_tentang;
		?>
			<div class="col-md-10" >
				<div class="tentang-content">
				<div class="col-lg-20 col-md-16 col-sm-15 col-xs-20">		
				<div class="ibadah-title">
  <blockquote><?php echo $isi_tentang ?></blockquote>
				</div>
			</div>
		</div>
			</div>
		<?php
			}
		?>
	</div>

	<style>
* {box-sizing: border-box}

/* Set height of body and the document to 100% */
body, html {
  height: 100%;
  margin: 0;
  font-family: Arial;
}

/* Style tab links */
.tablink {
  background-color: #555;
  color: white;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  font-size: 17px;
  width: 25%;
}

.tablink:hover {
  background-color: #777;
}

/* Style the tab content (and add height:100% for full page content) */
.tabcontent {
  color: white;
  display: none;
  padding: 100px 20px;
  height: 100%;
}

#Damkar {background-color: red;}
#PMI {background-color: green;}
#RSUD {background-color: blue;}
#Pln {background-color: orange;}
</style>
</head>
<body>
	<div class="panel panel-primary">
    <div class="panel-body"><center><h3><b>Nomor Penting / Nomor Darurat</b></h3></center></div>

<button class="tablink" onclick="openPage('Damkar', this, 'red')" id="defaultOpen">Pemadam Kebakaran Kota Bekasi</button>
<button class="tablink" onclick="openPage('PMI', this, 'green')" >Palang Merah Indonesia cabang Kota Bekasi</button>
<button class="tablink" onclick="openPage('RSUD', this, 'blue')">Ambulans RSUD Kota Bekasi</button>
<button class="tablink" onclick="openPage('Pln', this, 'orange')">Pelayanan Jaringan PLN</button>

<div id="Damkar" class="tabcontent">
  <h3>Pemadam Kebakaran Kota Bekasi</h3>
  <p>(021) 889 578 05 </p>
</div>

<div id="PMI" class="tabcontent">
  <h3>Palang Merah Indonesia cabang Kota Bekasi</h3>
  <p>(021) 889 602 47 </p> 
</div>

<div id="RSUD" class="tabcontent">
  <h3>Ambulans RSUD Kota Bekasi</h3>
  <p>(021) 884 100 5 </p>
</div>

<div id="Pln" class="tabcontent">
  <h3>Pelayanan Jaringan PLN</h3>
  <p>(021) 881 222 2 </p>
</div>

<script>
function openPage(pageName,elmnt,color) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
  }
  document.getElementById(pageName).style.display = "block";
  elmnt.style.backgroundColor = color;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
   
	</div>
		</div>
		
	<script type="text/javascript" charset="utf-8">			
			 function nav_active(){
				var r = document.getElementById("nav-home");
				r.className = "";

				var d = document.getElementById("nav-ibadah");
				d.className = d.className + "active";
				}
	</script>