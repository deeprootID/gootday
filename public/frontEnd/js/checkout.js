var stripe = Stripe('pk_test_3wUQq6BhprLNXVrzeD9nf5LT');

var $form = $('#checkout-form');

$form.submit(function(event){
    $('#charge-error').addClass('hidden');
    $form.find('button').prop('disabled', true);
    stripe.createToken({
        name: $('#card-name').val(),
        address_line1: $('#address').val(),
        number: $('#card-number').val(),
        exp_month: $('#card-expiry-month').val(),
        exp_year: $('#card-expiry-year').val(),
        cvc: $('#card-cvc').val()
    }).then(function(result) {
        // Handle result.error or result.token
        if(result.error){
            $('#charge-error').removeClass('hidden');
            $('#charge-error').text(result.error.message);
            $form.find('button').prop('disabled', false);
        } else {
            var token = result.token;
            $form.append($('<input type="hidden" name="stripeToken"/>').val(token));

            $form.get(0).submit();
        }
    });
    return false;
});