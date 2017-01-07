<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>1772 Natural Cosmetic</title>
		<link rel="stylesheet" type="text/css" href="./style.css">
        <link rel="stylesheet" type="text/css" href="./telefoni.css">
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
			$scope.bar = 2;
			$scope.cat = 4;
			$scope.art = 0;
			$scope.arr = [];
			$scope.i = 0;
            $scope.login = false;
            $scope.signin = false;
            $scope.cercashow = false;
         
            
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
				if($scope.w == 50){
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
				$scope.w = 50;
			};
			stopTime = $interval(updateTime, 40);
            
            $scope.destra = function() {
                
                $scope.i += 1;
                if($scope.i == 3) $scope.i = 0;
                $interval.cancel(stopTime);
                $scope.w = 50;
            }
            $scope.sinistra = function() {
                
                if($scope.i == 0) $scope.i = 3;
                $scope.i -= 1;
                $interval.cancel(stopTime);
                $scope.w = 50;
            }
			$scope.base64d = function(tmp) {
				return base64.urldecode(tmp);
			}
			$scope.fd = function(tmp) {
				return  $filter('date')(tmp * 1000 ,'dd-MM-yyyy');
			}
            $scope.fcat(1)
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
			<a href="index.php"><img class="logo" src="./img/logo.png" ng-click="flogo()" ></a>
		</div>	
        <div class="main">
			<div class="panel" >
				<div class="menuricette">
					<div class="m sfo" ng-show="cat == 1">
						<img src="./img/face.png">
						<div class="txt">Viso</div>
					</div>
					<a class="m" href="corpo.php" >
						<img src="./img/body.png">
						<div class="txt">Corpo</div>
					</a>
					<a class="m" href="capelli.php" >
						<img src="./img/hair.png">
						<div class="txt">Capelli</div>
					</a>	
				</div>
                <div class="ad">
					<img class="loaarr" src="./img/hourglass.svg" ng-show="loaarr"> 
					<ul>
						<div ng-repeat="a in arr">
							<li class="limin" ng-show="a.id != art">
								<img class="img" src="{{a.i}}">
								<b class="tit">{{a.t}}</b>
								<div class="data">{{fd(a.d)}}</div>
								<p ng-bind-html="base64d(a.a)"></p>
                                
                                <a class="con" name="fb_share" type="button_count" href="http://www.facebook.com/sharer.php">Condividi
                                <script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
                                <img class="share2" src="./img/share2.png"></a>	
								<div class="mop" ng-click="art = a.id"><img class="down" src="./img/down.png"></div>
							</li>
							<li class="limax" ng-show="a.id == art">
								<img class="img" src="{{a.i}}">
								<b class="tit">{{a.t}}</b>
								<div class="data">{{fd(a.d)}}</div>
								<p  ng-bind-html="base64d(a.a)"></p>
                                
								<a class="con" name="fb_share" type="button_count" href="http://www.facebook.com/sharer.php">Condividi
                                <script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
                                <img class="share2" src="./img/share2.png"></a>
                                
								<div class="mop" ng-click="art = 0"><img class="up" src="./img/up.png"></div>
							</li>
						</div>
					</ul>	
				</div>	
			</div>	
			<div class="panel contatti contact" ng-show="help">
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
            <div class="b chi" ng-click="fchi()">Chi Siamo
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