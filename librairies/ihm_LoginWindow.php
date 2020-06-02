<?php
require 'ihm_ToolsIHM.php';


/**Classe permettant d'afficher la page pour se logguer.*/
class LoginWindow{
    public function __construct(){
        $tIHM = new ToolsIHM();

        $this->callPage($tIHM->getLoginFail());
    }

    private function callPage($etatLogin){
        $theme = ToolsIHM::getLightTheme() ? "light" : "dark";
        $themeFr = ToolsIHM::getLightTheme() ? "sombre" : "clair";

        echo '<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="styles/'.$theme.'/styleLoginWindow.css" type="text/css"/>
		<title>Page de connexion</title>

	</head>

	<body>
	
		<form action="librairies/action_LoginWindow.Connect.php" method="POST">
			<h1>Connexion</h1>
		
			<label><b>Nom d\'utilisateur</b></label>
			</br>
			<input type="text" ';

        echo $etatLogin == 2 ? 'value = "'.$_GET['login'].'"' : '';

        echo 'placeholder="Entrer le nom d\'utilisateur" name="login" required>';

        echo $etatLogin == 1 ? "<p class='error'>Cette utilisateur n'existe pas !!</p>" : '';

        echo '</br>
			<label><b>Mot de passe</b></label>
			</br>
			<!--<input type="password" placeholder="Entrer le mot de passe" name="password" required>-->';

        echo $etatLogin == 2 ? "<p class='error'>Mot de passe incorect ...</p>" : '';

        echo '</br>

            <section ng-app="myApp" ng-controller="mainCtrl">
				<input type="{{inputType}}" placeholder="Entrer le mot de passe" name="password" required/>
				<input class="eyeformdp" type="checkbox" id="checkbox" ng-model="passwordCheckbox" ng-click="hideShowPassword()" />
				<label for="checkbox" id="cacher" ng-if="passwordCheckbox">Cacher le mot de passe</label>
				<label for="checkbox" id="afficher" ng-if="!passwordCheckbox">Afficher le mot de passe</label>
			</section>

			<input type="submit" id=\'submit\' value=\'LOGIN\'>
		</form>
		
		<script src="https://code.angularjs.org/1.2.13/angular.min.js"></script>
			  <script type="text/javascript">
				var myApp = angular.module(\'myApp\', []);
		  myApp.controller(\'mainCtrl\', [\'$scope\', function( $scope ){

			// Set the default value of inputType
			$scope.inputType = \'password\';

			// Hide & show password function
			$scope.hideShowPassword = function(){
			  if ($scope.inputType == \'password\')
				$scope.inputType = \'text\';
			  else
				$scope.inputType = \'password\';
			};

		  }]);

		  </script>

		<footer>
			<a id="changeColor" href="librairies/action_changeTheme.php">Passer en mode '.$themeFr.'</a>
		</footer>
		
    </body>	
</html>';
    }
}