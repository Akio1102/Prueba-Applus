angular
  .module("productos")
  .controller("ProductController", function ($scope, $rootScope, dataService) {
    $scope.products = [];

    function loadProducts() {
      dataService
        .getProductos()
        .then(function (response) {
          $scope.products = response.data.data;
        })
        .catch(function (error) {
          console.error("Error al cargar los productos:", error);
        });
    }

    $rootScope.$on("productoAgregado", function (event, args) {
      loadProducts();
    });

    loadProducts();
  });
