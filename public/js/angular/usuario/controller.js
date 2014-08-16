'use strict'

app.controller('usuarioList', ['$scope', 'apiRest', function ($scope, $apiRest) {

	$scope.titulo = "Usuários";

	// lista de usuário
	$scope.lista = [];

	$apiRest.getList('/Api/Usuario/', function($data) {
		$scope.lista = $data.data;
	});
}]);

app.controller('usuarioNovo', ['$scope', 'apiRest', function ($scope, $apiRest) {
	$scope.titulo = "Usuário";

	$scope.$apiRest = $apiRest

	$scope.validaForm = function() {
		console.log("Validando form");
	}
}]);

app.controller('usuarioEditar', function ($scope) {
  
});