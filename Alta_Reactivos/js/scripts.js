$(document).ready(function () {
    var fechaActual = Date.now();
    var fechaActualFormatoInput = new Date(fechaActual).toISOString().substring(0, 10);
    $("#Fecha_Caducidad").change(function() {
        var fechaSeleccionada = $(this).val();
        if (fechaSeleccionada < fechaActualFormatoInput) {
          $(this).val("");
          alert("La fecha seleccionada no puede ser anterior a la fecha actual");
        }
    });
      

    $("#Reactivo_Descripcion").keypress(function(e) {
      // Limitar la longitud a 60 caracteres de descripcion de reactivos
      if ($("#Reactivo_Descripcion").val().length >= 60) {
        e.preventDefault();
      }
    });

    $("#Reacivo_Nombre").keypress(function(e) {
      // Limitar la longitud a 60 caracteres de descripcion de reactivos
      if ($("#Reacivo_Nombre").val().length >= 30) {
        e.preventDefault();
      }
    });

  

    $("#Reactivo_Lote").keypress(function(e) {
      // Limitar la longitud a 10 caracteres de lote de reactivos
      if ($("#Reactivo_Lote").val().length >= 10) {
        e.preventDefault();
      }
      // Permitir solo números y el backspace
      if (e.which != 8 && (e.which < 48 || e.which > 57)) {
        e.preventDefault();
      }
    });

    $("#Reactivo_Cantidad").keypress(function(e) {
      // Permitir solo números y el backspace
      if (e.which != 8 && (e.which < 48 || e.which > 57)) {
        e.preventDefault();
      }
    });
});