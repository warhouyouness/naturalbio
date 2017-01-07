<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>1772 Natural Cosmetic</title>
		<link rel="stylesheet" type="text/css" href="./style.css">
        <link rel="stylesheet" type="text/css" href="./chat.css">
        <meta name="viewport" content="width=device-width"/>
        <script src="./lib/angular.min.js"></script>
		<script src="./lib/angular-sanitize.min.js"></script>
		<script src="./lib/angular-base64.min.js"></script>
        <script src="./lib/angular-animate.min.js"></script>
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
          ga('create', 'UA-87631147-1', 'auto');
          ga('send', 'pageview');
        </script>
		<script>
		var app = angular.module('myApp', ['ngSanitize', 'ab-base64','ngAnimate']);
		app.controller('myCtrl', function($scope, $interval, $http, $filter, base64) {
			var stopTime;
            $scope.w = 0;
			$scope.i = 0;
			$scope.main = 0;
			$scope.bar = 0;
			$scope.cat = 0;
			$scope.art = 0;
			$scope.arr = [];
			$scope.i = 0;
            $scope.login = false;
            $scope.signin = false;
            $scope.cercashow = false;
            $scope.chat = false;
            
            $scope.nsenc = false;
            $scope.nsric = false;
            
            $scope.ffind = function(){
                if($scope.cercashow == true){
                    $scope.cercashow = false;
                }else{
                    $scope.cercashow = true; 
                };
            };
			$scope.flogo = function(){
				$scope.main = 0;
				$scope.bar = 0;
				$scope.cat = 0;
				$scope.arr = [];
			};		
			$scope.fcontact = function(){
				if($scope.help == true){
                    $scope.help = false;
                }else{
                    $scope.help = true;
                }; 
			};
			$scope.fchi = function(){
				if($scope.chi == true){
                    $scope.chi = false;
                }else{
                    $scope.chi = true;
                };   
			};
			$scope.fchat = function(){
				if($scope.chat == true){
                    $scope.chat = false;
                }else{
                    $scope.chat = true;
                };         
			};		
			$scope.flogin = function(){
				$scope.main = 5;
			};		
			
			$scope.fricb = function(){
                $scope.nsric = false;
				if($scope.nsenc == true){
                    $scope.nsenc = false;
                }else{
                    $scope.nsenc = true;
                };
			};
            $scope.fenci = function(){
                $scope.nsenc = false;
				if($scope.nsric == true){
                    $scope.nsric = false;
                }else{
                    $scope.nsric = true;
                };
			};	
            
            $scope.flog = function(){
                if($scope.login == true){
                    $scope.login = false;
                }else{
                    closefull();
                    $scope.login = true; 
                };
            };
            $scope.fsign = function(){
                $scope.login = false;
                $scope.signin = true;  
                };
			$scope.fcat = function(tmp){
				$scope.cat = tmp;
				$scope.loaarr = true;
				$scope.arr = [];
				$http.get('./app/articoli.php?category=' + tmp).success(function(r) {	
					$scope.loaarr = false;
					$scope.arr = r;
				}).error(function(r) {
					$scope.loaarr = false;
				});		
			};		
				
		function updateTime() {
				if($scope.w == 75){
					$scope.w = 0;
					$scope.i += 1;
					if($scope.i == 3) $scope.i = 0;
				}else{
					$scope.w += 1;
				};	
			};
			
			$scope.g = function(tmp) {	
				$interval.cancel(stopTime);
				$scope.i = tmp;
				$scope.w = 75;
			};
			
			stopTime = $interval(updateTime, 75);
            
            $scope.destra = function() {
                
                $scope.i += 1;
                if($scope.i == 3) $scope.i = 0;
                $interval.cancel(stopTime);
                $scope.w = 75;
            }
            $scope.sinistra = function() {
                
                if($scope.i == 0) $scope.i = 3;
                $scope.i -= 1;
                $interval.cancel(stopTime);
                $scope.w = 75;
            }
			
			$scope.base64d = function(tmp) {
				return base64.urldecode(tmp);
			}
			$scope.fd = function(tmp) {
				return  $filter('date')(tmp * 1000 ,'dd-MM-yyyy');
			}			
		});
		</script>
	</head>
	<body ng-app="myApp" ng-controller="myCtrl"> <?php include_once("analyticstracking.php") ?>
		<div class="tool">
			<div class="lingue">
				<select>
					<option value="it">Italiano</option>
					<option value="eng">English</option>
				</select>
			</div>
			<a href="https://www.facebook.com/1772-Natural- Cosmetic-1629865347262851/?fref=ts">
				<img class="fb" src="./img/fb.png">
			</a>
			<a href="https://www.instagram.com/1772naturalcosmetic/">
				<img class="instagram" src="img/instagram.png">
			</a>
			<a href="https://www.linkedin.com/company/10921993?trk=tyah&trkInfo=clickedVertical%3Acompany%2CentityType%3AentityHistoryName%2CclickedEntityId%3Acompany_10921993%2Cidx%3A0">
				<img class="linkedin" src="img/linkedin.png">
			</a>
			<img class="logo" src="./img/logo.png" ng-click="flogo()" >
		</div>	
        <div class="main">
            <div class="panel home" ng-show="main == 0">
				<div class="menu" ng-show="bar == 0">
                    <div class="log">
                    </div>
					<div class="bloc bleft henc" ng-click="fricb()">
						<img class="mimg" src="./img/bio.png">
						<div class="txt">Enciclopedia</div>
					</div>
                    <!--<img class="logo2" src="./img/logo.png" ng-click="flogo()" >-->
					<div class="bloc bright hric" ng-click="fenci()">
						<img class="mimg" src="./img/ricette.png">
						<div class="txt">Ricette di Bellezza</div>
					</div>
					 <div class="log vero" ng-click="flog()">
						<img class="imglog" src="./img/user.png">
						<div class="logtxt">Log in</div>
                    </div>
                </div>
                <div class="sottomenu">
                    <div class="log ">
                        <img class="log log3" src="./img/white.png">
                    </div>
                    <div class="bloc" >
                        <img class="mimg" src="./img/white.png">
                         <div class="txt navenc" >
                                     <ul >
                                        <li  class="primo" ng-show="nsenc"  class="bordertop">
                                            <a  href="oli.php">Oli</a> 
                                        </li>
                                        <li class="secondo" ng-show="nsenc" >
                                            <a href="piante.php">Piante e Fiori</a> 
                                        </li >
                                        <li class="terzo" ng-show="nsenc">
                                            <a href="altro.php">Altro</a> 
                                        </li>
                                    </ul>
                        </div>
                    </div>
                    <div class="bloc">
                            <img class="mimg" src="./img/white.png">
                            <div  class=" txt navric">
                                     <ul  >
                                        <li class="primo" ng-show="nsric" class="bordertop">
                                            <a  href="viso.php">Viso</a> 
                                        </li>
                                        <li class="secondo" ng-show="nsric">
                                            <a href="corpo.php">Corpo</a> 
                                        </li>
                                        <li  ng-show="nsric">
                                            <a href="capelli.php">Capelli</a> 
                                        </li>
                                    </ul>
                            </div>
                        </div>
                    <div class="log log3">
                        <img class="log" src="./img/white.png">
                    </div>  
                </div>
                <div class="sliding">
                    
                    <div class="slide">
                         <img class="s1"  src="img/acqua1.jpg" ng-show="i == 0">
                         <img class="s1"  src="img/acqua2.jpg" ng-show="i == 1">
                         <img class="s1"  src="img/acqua3.jpg" ng-show="i == 2">
                    </div>
                    <div class="arrow1">
                         <img class="imgsx"  src="img/sx.png" ng-click="sinistra()">
                    </div>
                     <div class="arrow2">
                         <img class="imgdx"  src="img/dx.png" ng-click="destra()">
                     </div>

                                <div class="menusbarre">
                       
                            <div class="ktop">
                               <div class="k1">  
                                   <div class="bar  bar1" ng-click="g(0)"></div>
                                    <div class="barT  bar1" style="width:{{w}}px;" ng-show="i == 0" ng-click="g(0)"></div>
                                </div>
                            
                                <div class="k2">
                                    <div class="bar  bar2" ng-click="g(1)"></div>
                                    <div class="barT  bar2" style="width:{{w}}px;" ng-show="i == 1" ng-click="g(1)"></div>
                                </div>
                            
                                <div class="k3">
                                    <div class="bar  bar3" ng-click="g(2)"></div>
                                    <div class="barT  bar3" style="width:{{w}}px;" ng-show="i == 2" ng-click="g(2)"></div>
                                </div>
                            </div>
                
                </div>
                </div>
            </div>
			<div class="panel contatti contact " ng-show="help">
				<br>
				<h2 class="grey">Come possiamo esserle d'aiuto?</h2>
				<br>
				<h3 class="gold">Disponibilità a 360°</h3> 
				<br>
				<h4 class="grey">Consigli, Domande e Proposte</h4>
				<div class="box">
					<div class="sup">
						<img class="imgcontact" src="img/chat.jpg"><br>
						<div class="chattesto grey">
							<h4 class="gold">Live Chat</h4>
							<h5>Presto disponibile</h5>
						</div>
					</div>
					<a class="sup" href="mailto:support@naturalcosmetic.bio" >
						<img class="imgcontact" src="img/email.jpg"><br><br>
						<b class="chattesto grey" href="mailto:support@naturalnosmetic.bio">
							<h4 class="gold">Email</h4>
							<h5 >Ijjou@1772naturalcosmetic.bio</h5>
						</b> 
					</a>
					<a class="sup" href="tel:3883845963" >
						<img class="imgcontact" src="img/chiama.jpg"><br>
						<div class="chattesto grey">
							<h4 class="gold">Chiama</h4>
							<h5>388 384 59 63</h5>
						</div>
					</a>
				</div>
			</div>	
			<div class="panel txtinfo" ng-show="chi">
				<p><h3>1772 NATURAL COSMETICS</h3> <br><br>
				Nasce a Bologna dalla passione comune delle fondatrici per il settore della 
				<b>cosmesi naturale e bio</b>.<br><br>
				<p><b>Obiettivo del progetto</b> è quello <b>diffondere la cultura del benessere</b> <br>
				e promuovere uno<b>stile di vita naturale</b>nel rispetto della persona e dell’ambiente,<br> 
				proponendo un offerta di <b>cosmetici naturali</b>, che consente di utilizzare al meglio le proprietà delle piante.</p><br>
				<p> A questo abbiamo unito un <b>sistema informativo imparziale</b> che oltre a <b><br>fornirti contenuti validi, curiosità e spunti interessanti</b> sull’utilizzo dei prodotti per la cura della persona, <b><br>offre consulenze gratuite dei nostri esperti</b>.</p> <br><br>
				<p>
				<h3>Perchè scegliere 1772 NATURAL COSMETIC</h3><br>
				<p><b>La gamma di prodotti 1772</b>, viene prodotta e sottoposta a controlli accurati prima di essere offerta. Sono <b>ingredienti naturali e biologici al 100%, NON testati su animali.</b></p> <br><br>
				<p><b><h3>Provenienza:</h3></b></p><br>
				<p> Noi <b>siamo produttori</b>, coltiviamo piante d'Argan in Marocco,<br> 
				dalle quali inizia il processo di estrazione del <b>nostro Olio,</b><br> per poi ottenere tutti i prodotti a base <b>di Argan</b>.<br><br> 
				<b>Garantiamo la migliore qualità dei nostri prodotti e delle materie prime fornite dai nostri produttori affiliati.</b></p><br><br>
				<b>Aiuto Sociale....</b>
			</div>	
			<div class=" chat" ng-show="chat">
                <div class="livechat">
                    <div class="lctop">
                        <div class="lcimg"><img  src="./img/doctor.jpg"></div>
                        <div class="lctxt">
                            <h4>Live Chat</h4>
                            <div class="presto">Presto disponibile</div>
                            <div class="news">Rimani aggiornato sulle novità</div>
                        </div>
                    </div>
                    <div class="lcinput">
                        <input type="text" placeholder="inserisci la tua email" class="lcemail">
                        <input value="Invia" type="button" class="lcinvia">
                    </div>
                </div>
            </div>
		<div class="feet">
            <div class="b chi2 chi" ng-click="fchi()">Chi Siamo
			</div>
            <div class="b chattone" ng-click="fchat()">
				<img class="imghand"  src="img/chat-icon.png">
				<div class="contacts">Chat</div>
			</div>	
			<div class="b hand" ng-click="fcontact()">
				<div class="chi">Contatti</div>
			</div>
			
		</div>
        </div>
	</body>
</html>