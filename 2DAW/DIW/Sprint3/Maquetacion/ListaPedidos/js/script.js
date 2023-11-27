$(document).ready(function () {
    $("#inputUsuario").on('input', function () {
        filterTable();
    });

    // Función para manejar la visibilidad de las celdas en función del ancho de la pantalla
    function handleCellVisibility() {
        if (window.matchMedia('(max-width: 770px)').matches) {
            // Estamos en un dispositivo móvil, ocultar las celdas
            $("#table tbody tr td:not(:first-child)").hide();
        } else {
            // Estamos en escritorio, mostrar todas las celdas
            $("#table tbody tr td").show();
        }
    }

    // Llamar a la función al cargar la página
    handleCellVisibility();

    // Llamar a la función cuando cambie el tamaño de la ventana
    $(window).resize(function () {
        handleCellVisibility();
    });

    $("#table tbody tr").click(function (event) {
        // Verifica si el clic ocurrió en un elemento excluido
        if ($(event.target).is(':checkbox') || $(event.target).is('a')) {
            return;
        }

        // Si estamos en un dispositivo móvil, oculta/muestra solo las celdas de esa fila
        if (window.matchMedia('(max-width: 770px)').matches) {
            $(this).find("td:not(:first-child)").slideToggle();
        }
    });

    function filterTable() {
        var filter = $("#inputUsuario").val().toUpperCase();
        $("#table tbody tr").each(function () {
            var text = $(this).find("td:eq(1)").text();

            if (text.toUpperCase().indexOf(filter) > -1)
                $(this).show();
            else
                $(this).hide();
        });
    };
});
