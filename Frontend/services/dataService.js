angular.module("productos").service("dataService", function ($http) {
  var baseUrl =
    "http://localhost/Prueba-Applus/Backend/Controllers/producto.controller.php?op=";

  var baseUrl2 =
    "http://localhost/Prueba-Applus/Backend/Controllers/categoria.controller.php?op=";

  this.getProductos = function () {
    return $http.get(baseUrl + "GetAll");
  };

  this.addProducto = function (Producto) {
    return $http.post(baseUrl + "Post", Producto);
  };

  this.updateProducto = function (Producto) {
    return $http.put(baseUrl + "Put", Producto);
  };

  this.deleteProducto = function (id) {
    return $http.delete(baseUrl + "Delete", { data: { id } });
  };

  this.getCategorias = function () {
    return $http.get(baseUrl2 + "GetAll");
  };
});
