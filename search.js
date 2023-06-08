$(document).ready(function () {
    $("#search").on("keyup", function () {
      var value = $(this).val().toLowerCase();
      $("#table-search tbody tr").filter(function () {
        var textoFila = $(this).text().toLowerCase();
        var textoFilaNormalizado = textoFila.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
        var valorNormalizado = value.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
        $(this).toggle(textoFilaNormalizado.includes(valorNormalizado));
      });
    });
  });
  