<?php
if (!isset($_SERVER["PHP_AUTH_USER"])) {
	header("WWW-Authenticate: Basic realm=\"Inserisci le tue credenziali di accesso per Ginho!\"");
	header("HTTP/1.0 401 Unauthorized");
	die("Login rifuitato!");
} 

$username = "admin";
$password = "Karimuccio1";

if (($_SERVER["PHP_AUTH_USER"] == $username) && ($_SERVER["PHP_AUTH_PW"] == $password)) {
} else {
	header("WWW-Authenticate: Basic realm=\"Credenziali non corrette!\"");
	header("HTTP/1.0 401 Unauthorized");
}
?>

<!DOCTYPE html>
<html ng-app="myApp">
	<head>
		<meta charset="utf-8" />
		<title>1772 Natural Cosmetic</title>
		<link rel="stylesheet" type="text/css" href="admin.css">
        <meta name="viewport" content="width=device-width"/>
        <script src="./lib/angular.min.js"></script>
		<script>
		var app = angular.module('myApp', []);
		
		app.directive('fileModel', ['$parse', function ($parse) {
			return {
				restrict: 'A',
				link: function(scope, element, attrs) {
					var model = $parse(attrs.fileModel);
					var modelSetter = model.assign;
					element.bind('change', function(){
						scope.$apply(function(){
							modelSetter(scope, element[0].files[0]);
						});
					});
				}
			};
		}]);
		
		
		app.controller('myCtrl', function($scope, $http) {
			$scope.catm = "viso";
			$scope.a = "sal";
			$scope.img = "";
			var id;
			
			loader = function() {
				$scope.loaarr = true;
				$http.get('./art_get.php').success(function(r) {
					$scope.loaarr = false;
					$scope.arr = r.arr;
				}).error(function(response) {
					$scope.loaarr = false;
				});	
			};

			$scope.new = function() {
				var tmp = "./art_set.php?new&tit=" + $scope.tit + "&txt=" + $scope.txt + "&cat=" + $scope.cat + "&img=" + $scope.img;
				$scope.tit = "";
				$scope.txt = "";
				$scope.cat = "";
				$scope.img = "";
				$scope.loaarr = true;
				$http.get(tmp).success(function(r) {
					$scope.loaarr = false;
					$scope.arr = r.arr;
				}).error(function(response) {
					$scope.loaarr = false;
				});	
			};
			
			$scope.del = function(tmp) {
				var r = confirm("Delete ?");
				if (r == true) {
					$scope.img = "";
					$scope.tit = "";
					$scope.txt = "";
					$scope.cat = "";
					$scope.a = "sal";	
					
					$scope.loaarr = true;
					$http.get('./art_set.php?del=' + tmp).success(function(r) {
						$scope.loaarr = false;
						$scope.arr = r.arr;
					}).error(function(response) {
						$scope.loaarr = false;
					});	
				};
			};
			
			$scope.edit = function(tmp) {
				id = tmp;
				$scope.a = "edit";	
				$scope.loaarr = true;
				$http.get('./art_get.php?id=' + tmp).success(function(r) {
					$scope.loaarr = false;
					$scope.tit = r.art.titolo;
					$scope.txt = r.art.txt;
					$scope.img = r.art.img;
					var cat = r.art.category;
					$scope.cat = cat.toString();
					
					if(1 == cat || 2 == cat || 3 == cat){
						$scope.catm = 'corpo';						
					}else{
						$scope.catm = 'viso';

					};
					
				}).error(function(response) {
					$scope.loaarr = false;
				});							
			};
			
			
			
			$scope.editsal = function() {
				var tmp = "./art_set.php?edit=" + id + "&tit=" + $scope.tit + "&txt=" + $scope.txt + "&cat=" + $scope.cat + "&img=" + $scope.img;
				$scope.img = "";
				$scope.tit = "";
				$scope.txt = "";
				$scope.cat = "";
				$scope.loaarr = true;
				$http.get(tmp).success(function(r) {
					$scope.loaarr = false;
					$scope.arr = r.arr;
				}).error(function(response) {
					$scope.loaarr = false;
				});				
				$scope.img = "";
				$scope.tit = "";
				$scope.txt = "";
				$scope.cat = "";
				$scope.a = "sal";				
			};			
			
			$scope.ann = function() {
				$scope.img = "";
				$scope.tit = "";
				$scope.txt = "";
				$scope.cat = "";
				$scope.a = "sal";				
			};
			
			$scope.upload = function() {
				var fd = new FormData();
				fd.append('file', $scope.myFile);
				$scope.loadimg = true;
				$http.post("../fileUpload.php", fd, {
				transformRequest: angular.identity,
				headers: {'Content-Type': undefined}
				}).success(function(r){
					if(r.upload == 'ok'){
						$scope.loadimg = false;
						$scope.img = r.path;					
					}
				}).error(function(){
					$scope.loadimg = false;
				});
			};				
			
			loader();	
		});
		</script>
	</head>
	<body ng-controller="myCtrl">
   
   <form class="form">
       <div class="list">
			<ul>
				<li ng-repeat="a in arr">
				<span ng-click="edit(a.id)">edit</span> <span ng-click="del(a.id)">delete</span>
				{{a}}
				</li>
			</ul>		   
	   </div>
	   
       <div class="enciclopedia">
			<select class="x" ng-model="catm">
				<option value="viso">Ricette di Bellazza</option>
				<option value="corpo">Enciclopedia</option>
			</select>
			<fieldset class="eradio">
            <select class="x" ng-show="catm == 'corpo'" ng-model="cat">
                   <option value="1">Viso</option>
                   <option value="2">Corpo</option>
                   <option value="3">Capelli</option>
            </select>
            <select class="x" ng-show="catm == 'viso'" ng-model="cat">
                   <option value="4">Oli</option>
                   <option value="5">Piante</option>
                   <option value="6">Altro</option>
            </select>
           </fieldset>
           
            <div class="img">
				<input type="file" file-model="myFile"/>
				<button type="button" ng-click="upload()">Upload</button>
				<img class="" src=".{{img}}">
            </div>
           
          <input type="text" placeholder="Titolo" class="text-input" ng-model="tit">
       <br>
       <textarea placeholder="testo articolo" class="earticolo" ng-model="txt">
       </textarea>
       <br>
        <button type="button" ng-click="editsal()" ng-show="a =='edit'">Edit</button>
		<button type="button" ng-click="ann()" ng-show="a =='edit'">Annulla</button>
		<button type="button" ng-click="new()" ng-show="a =='sal'">Salva</button>
        </div>
        
       
       
   </form>
   
   
   
   
   
   
   
    </body>
</html>