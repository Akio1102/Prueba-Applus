angular
  .module("productos")
  .controller(
    "AddProductController",
    function ($scope, $rootScope, dataService) {
      var vm = this;

      vm.categorias = [];
      vm.newProduct = {};

      vm.loadCategorias = function () {
        dataService
          .getCategorias()
          .then(function (response) {
            vm.categorias = response.data.data;
          })
          .catch(function (error) {
            console.error("Error al cargar las categorías:", error);
          });
      };

      vm.loadCategorias();

      vm.addProduct = function () {
        dataService
          .addProducto(vm.newProduct)
          .then(function (response) {
            $rootScope.$broadcast("refreshProducts");
          })
          .catch(function (error) {
            console.error("Error al agregar producto:", error);
          });
      };

      this.clearForm = function () {
        // Restablecer los valores del nuevo producto
        this.newProduct = {};
      };
    }
  );
