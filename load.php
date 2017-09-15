<!DOCTYPE html>
<html>
<head>
	<title>Membuat halaman website ajax tanpa reload dengan ajax jquery | www.malasngoding.com</title>
	<!-- menghubungkan dengan file css -->
	<link rel="stylesheet" type="text/css" href="style.css">

        <link rel="stylesheet" type="text/css" href="css/dc.css"/>
        <style>
          .number {
            background: orange;
            width: 303px;
            font-size: 50px;
            position: relative;
            margin: 0 auto;
            text-align: center;
            padding-top: 63px;
            padding-bottom: 90px;
           /* padding-right: 15px;
            padding-left: 15px;*/
            height: 40px;
            line-height: normal;
          }

        </style>
	<!-- menghubungkan dengan file jquery -->

<!--   <link rel="stylesheet" type="text/css" href="css/keen-dashboards.css" /> -->
     <script type="text/javascript" src="src/jquery.min.js"></script>
</head>

<!-- 
Author : diki alfarabi hadi 
Site : www.malasngoding.com
-->
<div class="content">
	     
<div class="nav navbar center">
       <div id="JKKnumber" class="number"></div>
     


       <div id="JKMnumber" class="number"></div>



       <div id="JHTnumber" class="number"></div>

       <div id="JPnumber" class="number"></div>

  </div>   
	<div class="menu">
		<ul>
			<li><a class="klik_menu" id="home">PREMI</a></li>
			<li><a class="klik_menu" id="tentang">KLAIM</a></li>
	
		</ul>
	</div>

	<div class="badan">
<br><br>


	</div>
</div>
</body>

<script type="text/javascript">
	$(document).ready(function(){
		$('.klik_menu').click(function(){
			var menu = $(this).attr('id');
			if(menu == "home"){
				$('.badan').load('aktif.php');						
			}else if(menu == "tentang"){
				$('.badan').load('tentang.php');						
			}else if(menu == "tutorial"){
				$('.badan').load('tutorial.php');						
			}else if(menu == "sosmed"){
				$('.badan').load('sosmed.php');						
			}
		});


		// halaman yang di load default pertama kali
		$('.badan').load('klaims.php');						

	});
</script>

    <!-- Bootstrap -->
    <script src="src/bootstrap.min.js"></script>

<!-- <script type="text/javascript" src="js/d3.js"></script>
      <script type="text/javascript" src="js/crossfilter.js"></script>
      <script type="text/javascript" src="js/dc.js"></script>
      <script type="text/javascript" src="chart.js"></script>
      <script type="text/javascript" src="klaim.js"></script>

      <script type="text/javascript" src="factpremi.js"></script> -->

</html>