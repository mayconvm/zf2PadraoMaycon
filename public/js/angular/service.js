'use strict'

app.factory('apiRest', ['$http', function($http) {
	return {
		requisicao : function($metodo, $url, $dataJson, $callback) {
			return $http({
				method: $metodo,
				url: $url,
				data: $dataJson
			})
			.success(function($data, $status) {
				$callback({
					status: $status,
					data: $data
				});
			})
			.error(function($data, $status) {
				$callback({
					status: $status,
					data: $data,
					msg: 'Erro na requisição.'
				})
			})
		},

		getList : function($url, $callback) {
			return this.requisicao('GET', $url, null, $callback);
		},

		novo:  function($url, $data, $callback) {
			return this.requisicao('POST', $url, $data, $callback);
		},

		editar:  function($url, $data, $callback) {
			return this.requisicao('PUT', $url, $data, $callback);
		},

		delete:  function($url, $callback) {
			return this.requisicao('DELETE', $url, null, $callback);
		},
	}
}]);


app.factory('redirect', ['$http', function($http) {
	return {
		get: function($url) {
			console.log("OK");
			document.location = '$url';
		}
	}
}]);