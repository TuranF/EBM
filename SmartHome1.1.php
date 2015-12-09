<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>SmartHome</title>
</head>



<style> 
	body {
	}
</style>







<!-------------------------------->
<!--FUNKTION FÜR DIE ZEITANZEIGE-->
<!-------------------------------->
<script type="text/javascript">
function updateTime() {

	var date = new Date();
	var stunden = date.getHours();
	var minuten = date.getMinutes();
	var tag = date.getDate();
	var monatDesJahres = date.getMonth();
	var jahr = date.getFullYear();
	var tagInWoche = date.getDay();
	var wochentag = new Array("Sonntag", "Montag", "Dienstag", "Mittwoch", "Donnerstag", "Freitag", "Samstag");
	var monat = new Array("Januar", "Februar", "M&auml;rz", "April", "Mai", "Juni", "Juli", "August", "September", "Oktober", "November", "Dezember");

	var datum = wochentag[tagInWoche] + ", " + tag + ". " + monat[monatDesJahres] + " " + jahr + " " + stunden + ":" + minuten;

	document.getElementById('time').innerHTML = datum;
	setTimeout(updateTime, 60000);
}

window.addEventListener("load", updateTime);
</script>




<!------------------------------------>
<!--FUNKTION FÜR DAS NAVIGATIONSMENÜ-->
<!------------------------------------>
<script language="JavaScript" type="text/javascript">
function meineGeraete(element){

 if(document.getElementById(element).style.display == 'none')
  document.getElementById('toggle2').style.display = 'none';
  document.getElementById('toggle3').style.display = 'none';
  document.getElementById('toggle4').style.display = 'none';
  document.getElementById('toggle5').style.display = 'none';
  document.getElementById('toggle6').style.display = 'none';
	document.getElementById(element).style.display = 'block';
}
</script>

<script language="JavaScript" type="text/javascript">
function geraeteAufnehmen(element){

 if(document.getElementById(element).style.display == 'none')
  document.getElementById('toggle1').style.display = 'none';
  document.getElementById('toggle3').style.display = 'none';
  document.getElementById('toggle4').style.display = 'none';
  document.getElementById('toggle5').style.display = 'none';
  document.getElementById('toggle6').style.display = 'none';
	document.getElementById(element).style.display = 'block';
}
</script>

<script language="JavaScript" type="text/javascript">
function geraeteLoeschen(element){

 if(document.getElementById(element).style.display == 'none')
  document.getElementById('toggle1').style.display = 'none';
  document.getElementById('toggle2').style.display = 'none';
  document.getElementById('toggle4').style.display = 'none';
  document.getElementById('toggle5').style.display = 'none';
  document.getElementById('toggle6').style.display = 'none';
	document.getElementById(element).style.display = 'block';
}
</script>

<script language="JavaScript" type="text/javascript">
function energieverbrauchRaeume(element){

 if(document.getElementById(element).style.display == 'none')
  document.getElementById('toggle1').style.display = 'none';
  document.getElementById('toggle2').style.display = 'none';
  document.getElementById('toggle3').style.display = 'none';
  document.getElementById('toggle5').style.display = 'none';
  document.getElementById('toggle6').style.display = 'none';
	document.getElementById(element).style.display = 'block';
}
</script>

<script language="JavaScript" type="text/javascript">
function energievergleichJahr(element){

 if(document.getElementById(element).style.display == 'none')
  document.getElementById('toggle1').style.display = 'none';
  document.getElementById('toggle2').style.display = 'none';
  document.getElementById('toggle3').style.display = 'none';
  document.getElementById('toggle4').style.display = 'none';
  document.getElementById('toggle6').style.display = 'none';
	document.getElementById(element).style.display = 'block';
}
</script>

<script language="JavaScript" type="text/javascript">
function energievergleichGeraete(element){

 if(document.getElementById(element).style.display == 'none')
  document.getElementById('toggle1').style.display = 'none';
  document.getElementById('toggle2').style.display = 'none';
  document.getElementById('toggle3').style.display = 'none';
  document.getElementById('toggle4').style.display = 'none';
  document.getElementById('toggle5').style.display = 'none';
	document.getElementById(element).style.display = 'block';
}
</script>




<!---------------------------------------------------------------------->
<!--FUNKTION FÜR DEN AKTUELLEN VERBRAUCH (DIAGRAMM) AUF DER HOME SEITE-->
<!---------------------------------------------------------------------->
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["gauge"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['Verbrauch', 80]
      
        ]);

        var options = {
          width: 600, height: 320,
		  greenFrom: 60, greenTo: 75,
          redFrom: 90, redTo: 100,
          yellowFrom:75, yellowTo: 90,
          minorTicks: 5
        };

        var chart = new google.visualization.Gauge(document.getElementById('chart_div'));

        chart.draw(data, options);

        setInterval(function() {
          data.setValue(0, 1, 40 + Math.round(60 * Math.random()));
          chart.draw(data, options);
        }, 13000);
        setInterval(function() {
          data.setValue(1, 1, 40 + Math.round(60 * Math.random()));
          chart.draw(data, options);
        }, 5000);
        setInterval(function() {
          data.setValue(2, 1, 60 + Math.round(20 * Math.random()));
          chart.draw(data, options);
        }, 26000);
      }
    </script>

	
	
<!----------------------------->
<!--FUNKTION GERÄTE AUFNHEMEN-->
<!----------------------------->	
	<link href="css/style.css" media="screen" rel="stylesheet" type="text/css"/>
    <link href="css/uniform.css" media="screen" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.tools.js"></script>
    <script type="text/javascript" src="js/jquery.uniform.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
	
	
	
<!---------------------------->
<!--FUNKTION VERGLEICH RÄUME-->
<!---------------------------->	
	    <script type="text/javascript">
      window.onload=function()
      {
        // Vorgaben: Datensätze - Zahlenwerte, Legendentexte und Farbwerte
        var daten=[2,30,8,33,27];
        var texte=["K\u00fcche","Wohnzimmer","Bad","Esszimmer","Schlafzimmer"];
        var farben=["#89FF14","#FF1489","#6699FF","#FF6600","#FF0000"];

        // Initialisierungen
        var anzahl=daten.length;
        var summe=0;for(var i=0;i<anzahl;i++)summe+=daten[i];
        var start_winkel=0,end_winkel=0;

        // canvas-Objekt
        var canvas=document.getElementById("cv");

        if(canvas.getContext)
        {
          var context=canvas.getContext("2d");

          // Kopfzeile
          if(context.font && context.fillText) 
          {
            context.fillStyle="black";
            context.font="20px sans-serif";
            context.fillText("Energieverbrauch - R\u00e4ume",180,20);
          }

          // Daten aufbereiten
          for(var i=0;i<anzahl;i++)
          {
            // Kreissegment
            start_winkel=end_winkel;
            end_winkel+=daten[i]/summe*2*Math.PI;
            context.beginPath();
            context.moveTo(200,200);
            context.arc(200,200,150,start_winkel,end_winkel,false); // Mittelpunkt: 200,200 und Radius: 150
            context.closePath();
            context.fillStyle=farben[i];
            context.fill();

            // Legendenrechteck
            context.fillRect(400,75+i*25,50,15);

            // Legendenbeschriftung
            if(context.font && context.fillText)
            {
              context.fillStyle="#000";
              context.font="12px sans-serif";
              context.fillText(texte[i]+" ["+(daten[i]/summe*100).toFixed(2)+"%]",460,87+i*25);
            }
          }
        }
      }
    </script>

	
	
	
<!---------------------------------->
<!--FUNKTION ENERGIEVERGLEICH JAHR-->
<!---------------------------------->	
	    <script type="text/javascript"
          src="https://www.google.com/jsapi?autoload={
            'modules':[{
              'name':'visualization',
              'version':'1',
              'packages':['corechart']
            }]
          }"></script>

    <script type="text/javascript">
      google.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', '2014', '2015'],
          ['Jan',  1000,      450],
          ['Feb',  1170,      730],
          ['M\u00e4r',  660,       1120],
          ['Apr',  1030,      950],
		  ['Mai',  869,      789],
		  ['Jun',  1030,      1040],
		  ['Jul',  930,      840],
		  ['Aug',  1060,      980],
		  ['Sept',  750,      980],
		  ['Okt',  1020,      1040],
		  ['Nov',  1060,      940],
		  ['Dez',  999,      670]
		  
        ]);

        var options = {
          title: 'Verbrauch',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
	
	
<body>



<!----------------------------->
<!--LOGO GROWSMARTER MIT LINK-->
<!----------------------------->
<a href="http://www.grow-smarter.eu/home/"><img src="Grow-Smarter.jpg" alt="GrowSmarter" style="width:190px; height:60px; position: absolute; top: 80px; left: 1110px;"></a>




<!-------------------->
<!--OBERE MENÜLEISTE-->
<!-------------------->
<div id="menubox" style="background-color: white; position:fixed; width:1400px; height:70px; margin-top: -10px; margin-left: -10px; margin-right: -10px; box-shadow: 0px 0px 12px grey;">
</div>

<div id="menu-punkte" style="position:fixed; width:1400px; height:50px; margin-left: -10px; margin-right: -10px; font-family: verdana; font-size: 12px; font-weight: bold; color: #6AD400;">

<div style="line-height:40px; position: absolute; left:70px; top:2px; width:150px; height:10px; float:left; ">	
<a href="SmartHome1.1.html" style="text-decoration:none"><span style="color: #6AD400;">Home</span></a>
</div>

<div style="line-height:40px; position: absolute; left:280px; top:2px; width:150px; height:10px; float:left;">
<span title="Die BenutzerID ist eine benutzerspezifische Kennung mit der jeder Benutzer identifizierbar ist" style="width:10px;">BenutzerID</span> 
</div>

<div style="line-height:40px; position: absolute; left:500px; top:2px; width:150px; height:10px; float:left;">
Anzahl Ger&auml;te
</div>

<div style="line-height:40px; position: absolute; left:750px; top:2px; width:150px; height:10px; float:left;">
Aktueller Verbrauch
</div>




<!-------------------------------------------->
<!--ZEITANZEIGE: FUNKTION DAZU IN JAVASCRIPT-->
<!-------------------------------------------->
<div style="line-height:40px; position: absolute; left:1050px; top:2px; width:250px; height:10px; float:left;">
<div id="time" align="right">
	</div>
</div>
</div>




<!------------------------------>
<!--HINTERGRUNDBILD PUSTEBLUME-->
<!------------------------------>
<div id="bild" style="background-color: white; background-repeat:no-repeat; background-position: center; background-size: 100%; height: 600px; position: static;  margin-left: -10px; margin-right: -10px; margin-bottom: 30px;">
<img src="009.jpg" alt="Energie" style="width:1360px; height:600px; box-shadow: 0px 0px 12px grey; ">
</div>




<!-------------------------------------------------->
<!--NAVIGATIONSMENÜ: FUNKTIONEN DAZU IN JAVASCRIPT-->
<!-------------------------------------------------->
<div id="diagr" style="position: absolute; z-index: -1;top:700px; width:270px; height:600px; padding-top: 60px; padding-left: 30px; float:left; box-shadow: 0px 0px 13px grey;">
</div>
<div style="line-height:40px; position: absolute; z-index: -1; left:30px; top:800px; width:200px; height:10px; float:left; font-family: verdana; font-size: 14px; font-weight: bold; color: #6AD400; ">	
Mein Profil
</div>
	<div style="line-height:40px; position: absolute; z-index: -1; left:60px; top:830px; width:200px; height:10px; float:left; font-family: verdana; font-size: 14px; font-weight: bold; color: #6AD400;">
	<a href="javascript:meineGeraete('toggle1');" style="text-decoration:none"><span style="color: #6AD400;">Meine Ger&auml;te</span></a>
	</div>
	<div style="line-height:40px; position: absolute; z-index: -1; left:60px; top:860px; width:200px; height:10px; float:left; font-family: verdana; font-size: 14px; font-weight: bold; color: #6AD400;">
	<a href="javascript:geraeteAufnehmen('toggle2');" style="text-decoration:none"><span style="color: #6AD400;">Ger&auml;te aufnehmen</span></a>
	</div>
	<div style="line-height:40px; position: absolute; z-index: -1; left:60px; top:890px; width:200px; height:10px; float:left; font-family: verdana; font-size: 14px; font-weight: bold; color: #6AD400;">
	<a href="javascript:geraeteLoeschen('toggle3');" style="text-decoration:none"><span style="color: #6AD400;">Ger&auml;te l&ouml;schen</span></a>
	</div>

<div style="line-height:40px; position: absolute; z-index: -1; left:30px; top:930px; width:300px; height:10px; float:left; font-family: verdana; font-size: 14px; font-weight: bold; color: #6AD400;">
Verbr&auml;uche
</div>
	<div style="line-height:40px; position: absolute; z-index: -1; left:60px; top:960px; width:200px; height:10px; float:left; font-family: verdana; font-size: 14px; font-weight: bold; color: #6AD400;">
	<a href="javascript:energieverbrauchRaeume('toggle4');" style="text-decoration:none"><span style="color: #6AD400;">Energieverbrauch R&auml;ume</span></a>
	</div>
	<div style="line-height:40px; position: absolute; z-index: -1; left:60px; top:990px; width:200px; height:10px; float:left; font-family: verdana; font-size: 14px; font-weight: bold; color: #6AD400;">
	<a href="javascript:energievergleichJahr('toggle5');" style="text-decoration:none"><span style="color: #6AD400;">Energievergleich Jahr</span></a>
	</div>
	<div style="line-height:40px; position: absolute; z-index: -1; left:60px; top:1020px; width:200px; height:10px; float:left; font-family: verdana; font-size: 14px; font-weight: bold; color: #6AD400;">
	<a href="javascript:energievergleichGeraete('toggle6');" style="text-decoration:none"><span style="color: #6AD400;">Energievergleich Ger&auml;te</span></a>
	</div>
	
	


<!---------------------------------------------->	
<!--ANZEIGEBOX FÜR DIE AUSGWEÄHLTEN MENÜPUNKTE-->
<!---------------------------------------------->
<div id="diagr" style="line-height:40px; position: absolute; z-index: -1; left:330px; top:700px; width:750px; height:560px; padding-top: 100px; padding-left: 200px; padding-right: 30px; float:left;font-family: verdana; font-style: italic; font-style: bold; font-size: 20px; font-weight: bold; color: black; box-shadow: 0px 0px 13px grey;">
	 <!--
	 <div>Aktueller Verbrauch
	 <div id="chart_div" style="width: 400px; height: 120px;"></div>
	 </div>
	 -->
	 
	 
	 <!--ANZEIGE VON MEINE GERÄTE-->
	<div id="toggle1" style="display:none;">Meine Ger&auml;te</div>
	
	
	<!--ANZEIGE VON GERÄTE AUFNEHMEN-->
	<div id="toggle2"  style="display:none;">
	<!--
	Ampelsystem bei der Aufnahme von Geräten
	--> 
	<div class="TTWForm-container">
     
     
     <div id="form-title" action="testi.php" name="auf" class="form-title field">
          <h2>
               Ger&auml;t aufnehmen
          </h2>
     </div>
     
     
            <form action="testi.php" class="TTWForm" method="post" novalidate="">
          
          
          <div id="field12-container" class="field f_100">
               <label for="field12">
                    Name des Ger&auml;tes
               </label>
               <input name="Textfeld1" id="field12" required="required" type="text">
          </div>
          
          
          <div id="field13-container" class="field f_100">
               <label for="field13">
                    Ort
               </label>
               <select name="Auswahlfeld1" id="field13" required="required">
                    <option id="field13-1" value="Wohnzimmer">
                         Wohnzimmer
                    </option>
                    <option id="field13-2" value="Schlafzimmer">
                         Schlafzimmer
                    </option>
                    <option id="field13-3" value="Küche">
                         K&uuml;che
                    </option>
                    <option name="Auswahlfeld1" id="Auswahlfeld1-4" value="Esszimmer">
                         Esszimmer
                    </option>
                    <option name="Auswahlfeld1" id="Auswahlfeld1-5" value="Badezimmer">
                         Badezimmer
                    </option>
                    <option name="Auswahlfeld1" id="Auswahlfeld1-6" value="Büro">
                         B&uuml;ro
                    </option>
                    <option name="Auswahlfeld1" id="Auswahlfeld1-7" value="Keller">
                         Keller
                    </option>
                    <option name="Auswahlfeld1" id="Auswahlfeld1-8" value="anderes Zimmer">
                         anderes Zimmer
                    </option>
               </select>
          </div>
          
          
          <div id="field14-container" class="field f_100">
               <label for="field14">
                    Ger&auml;tetyp
               </label>
               <select name="Auswahlfeld2" id="field14" required="required">
                    <optgroup label="Elektronik">
					<option id="field14-1" value="Fernseher/TV">
                         Fernseher/TV
                    </option>
                    <option id="field14-2" value="Computer/Laptop">
                         Computer/Laptop
                    </option>
                    <option id="field14-3" value="Audio">
                         Audio
                    </option>
                    <option name="Auswahlfeld2" id="Auswahlfeld2-4" value="Unterhaltung">
                         Unterhaltung
                    </option>
					</optgroup>
					
					<optgroup label="K&uuml;chenger&auml;te">
                    <option name="Auswahlfeld2" id="Auswahlfeld2-5" value="Mikrowelle">
                         Mikrowelle
                    </option>
                    <option name="Auswahlfeld2" id="Auswahlfeld2-6" value="Kaffemaschine">
                         Kaffemaschine
                    </option>
                    <option name="Auswahlfeld2" id="Auswahlfeld2-7" value="Wasserkocher">
                         Wasserkocher
                    </option>
                    <option name="Auswahlfeld2" id="Auswahlfeld2-8" value="Mixer/Rührer">
                         Mixer/R&uuml;hrer
                    </option>
					</optgroup>
					
					<optgroup label="Beleuchtung">
                    <option name="Auswahlfeld2" id="Auswahlfeld2-9" value="Stehlampe">
                         Stehlampe
                    </option>
                    <option name="Auswahlfeld2" id="Auswahlfeld2-10" value="Tischlampe">
                         Tischlampe
                    </option>
					</optgroup>
					
					<optgroup label="Sonstige Ger&auml;te">
                    <option name="Auswahlfeld2" id="Auswahlfeld2-11" value="Föhn">
                         F&ouml;hn
                    </option>
                    <option name="Auswahlfeld2" id="Auswahlfeld2-12" value="Staubsauger">
                         Staubsauger
                    </option>
                    <option name="Auswahlfeld2" id="Auswahlfeld2-13" value="Waschmaschine">
                         Waschmaschine
                    </option>
                    <option name="Auswahlfeld2" id="Auswahlfeld2-14" value="Trockner">
                         Trockner
                    </option>
                    <option name="Auswahlfeld2" id="Auswahlfeld2-15" value="sonstiges">
                         sonstiges
                    </option>
					</optgroup>
               </select>
          </div>
          <div id="form-submit" class="field f_100 clearfix submit">
               <input value="absenden" type="submit">
          </div>
     </form>
	</div>
	</div>
	
	
	<!--ANZEIGE VON GERÄTE LÖSCHEN-->
	<div id="toggle3"  style="display:none;">Ger&auml;te l&ouml;schen</div>
	
	
	<!--ANZEIGE VON ENERGIEVERBRAUCH RÄUME-->
	<div id="toggle4"  style="display:none;">Energieverbrauch des eigenen Haushalts
	<canvas id="cv" width="600" height="400">
    </canvas></div>
	
	
	<!--ANZEIGE VON ENERGIEVERGLEICH JAHR-->
	<div id="toggle5"  style="display:none; width: 1000px; height:600px;">Energievergleich Jahr
	<div id="curve_chart" style=" width: 500px; height:300px;"></div></div>
	
	
	<!--ANZEIGE VON ENERGIEVERGLEICH GERÄTE-->
	<div id="toggle6"  style="display:none;">Energievergleich Ger&auml;te</div>
</div>




<!--------------------------->
<!--UNTERE LEISTE MIT LINKS-->
<!--------------------------->
<div id="links" style=" background-color: #6AD400; opacity: 0.9; position:absolute; top: 1500px; width:1400px; height:150px; margin-left: -10px; margin-right: -10px; box-shadow: 0px 0px 13px grey;">
</div>
<div style="line-height:40px; position: absolute; left:170px; top:1520px; width:104px; height:10px; float:left; font-family: verdana; font-size: 14px; font-weight: bold; color: white;">	
<a href="Energievergleich.html" style="text-decoration:none"><span style="color: white;">Kontakt</span></a>
</div>

<div style="line-height:40px; position: absolute; left:450px; top:1520px; width:56px; height:10px; float:left; font-family: verdana; font-size: 14px; font-weight: bold; color: white;">
<a href="Energievergleich.html" style="text-decoration:none"><span style="color: white;">Impressum</span></a>
</div>

<div style="line-height:40px; position: absolute; left:758px; top:1520px; width:151px; height:10px; float:left; font-family: verdana; font-size: 14px; font-weight: bold; color: white;">
<a href="Energievergleich.html" style="text-decoration:none"><span style="color: white;">FAQ</span></a>
</div>

<div style="line-height:40px; position: absolute; left:1050px; top:1520px; width:173px; height:10px; float:left; font-family: verdana; font-size: 14px; font-weight: bold; color: white;">
<a href="Energievergleich.html" style="text-decoration:none"><span style="color: white;">Links</span></a>
</div>




<!---------------->
<!--LOGOUTLEISTE-->
<!---------------->
<div id="logout" style=" background-color: #4d9900; opacity: 0.9; position:absolute; top: 1600px; width:1400px; height:50px; margin-left: -10px; margin-right: -10px; box-shadow: 0px 0px 13px #4d9900;">
</div>
<div style="line-height:40px; position: absolute; left:635px; top:1610px; width:173px; height:10px; float: left; font-family: verdana; font-size: 14px; font-weight: bold; color: white;">
<a href="Energievergleich.html" style="text-decoration:none"><span style="color: white;">Logout</span></a>
</div>


</body>
</html> 