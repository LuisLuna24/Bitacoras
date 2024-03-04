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
      
});