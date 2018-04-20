$(function() {

    $('#form-ajout').submit(function(e) {
        e.preventDefault();

        $.post(
            'ajax/produit-ajout.php',
            $(this).serialize(),
            function(response) {
                var modal = $('#modal-produit');
                modal.find('.modal-body').html(response);
                modal.modal('show');
            }
        );
    });

    // CORRECTION
    $('#form-ajout').submit(function(e) {
        e.preventDefault();
        var $this = $(this);
        $.post(
            'ajax/produit-ajout.php',
            $(this).serialize(),
            function(response) {
                if (response == 'ok') {
                    $this
                        .closest('.container').prepend('<div class="alert alert-success">le produit est ajouté</div>');

                } else {
                    $this
                        .closest('.container').prepend('<div class="alert alert-danger">!!!!!</div>');
                }
            }
        );
    });
});