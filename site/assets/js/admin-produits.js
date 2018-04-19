$(function() {
    // $('.detail-produit').click(function(event) {
    //     $.get(
    //         '../ajax/detail-produit.php',
    //         'id=' + $(this).data('id'),
    //         function(response) {
    //             var modal = $('#modal-description');
    //             modal.find('.modal-body').html(response);
    //             modal.modal('show');
    //         }
    //     );
    // });

    $('#detail-commande').click(function(event) {
        $.get(
            '../ajax/detail-commande.php',
            'id=' + $(this).data('id'),
            function(response) {
                var modal = $('#modal-description');
                modal.find('.modal-body').html(response);
                modal.modal('show');
            }
        );
    });
});