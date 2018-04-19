$(function() {

    $('#detail-commande').click(function(e) {
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