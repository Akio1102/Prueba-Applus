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

    $rootScope.$on("refreshProducts", function (event, args) {
      loadProducts();
    });

    $scope.deleteProducto = function (productId) {
      dataService
        .deleteProducto(productId)
        .then(function (response) {
          console.log("Producto eliminado exitosamente:", response);
          loadProducts();
        })
        .catch(function (error) {
          console.error("Error al eliminar el producto:", error);
        });
    };

    $scope.updateProducto = function (product) {
      console.log(product);
      dataService
        .updateProducto(product)
        .then(function (response) {
          console.log("Producto actualizado exitosamente:", response);
          loadProducts();
        })
        .catch(function (error) {
          console.error("Error al eliminar el producto:", error);
        });
    };

    loadProducts();
  });
