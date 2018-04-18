$(function() {
    $('#utilisateur').change(function(e) {
        var id = $(this).val(); // la valeur de l'option sélectionnée

        if (id != '') {
            // appel ajax en GET vers utilisateur.php
            // en lui passant l'id venant du select
            $.get(
                'utilisateur.php',
                'id=' + id,
                function(response) {
                    // on rempli la div#detal avec le retour
                    // du fichier utilisateur.php
                    $('#detail').html(response);
                }
            );
        } else {
            // si on choisit la 1ere option (vide)
            // on vide la div#detail
            $('#detail').html('');
        }

    });
});