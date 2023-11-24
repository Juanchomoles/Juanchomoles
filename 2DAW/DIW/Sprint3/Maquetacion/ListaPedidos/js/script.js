$(document).ready(function () {
    
    $("#inputUsuario").on('input', function () {
        filterTable();
    });

    function filterTable() {
        var filter = $("#inputUsuario").val().toUpperCase();
        $("#table tbody tr").each(function () {
            var text = $(this).find("td:eq(2)").text();

            if (text.toUpperCase().indexOf(filter) > -1)
                $(this).show();
            else
                $(this).hide();

        });
    };
});