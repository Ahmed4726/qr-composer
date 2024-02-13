<!-- resources/views/payment/form.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body>

<div id="step4" class="form-step">
    <h2>Step 4: Payment</h2>
    <form id="paymentForm">
        <div id="card-element">
            <!-- A Stripe Element will be inserted here. -->
        </div>
        <!-- Used to display form errors. -->
        <div id="card-errors" role="alert"></div>
        <button type="button" onclick="submitPayment()">Submit Payment</button>
    </form>
</div>

<script>
    var stripe = Stripe('{{ config('services.stripe.key') }}');
    var elements = stripe.elements();
    var card = elements.create('card');
    card.mount('#card-element');

    card.addEventListener('change', function (event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    function submitPayment() {
        stripe.createPaymentMethod({
            type: 'card',
            card: card,
        }).then(function (result) {
            if (result.error) {
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                var paymentMethodId = result.paymentMethod.id;
                $.ajax({
                    url: '/process-payment',
                    type: 'POST',
                    data: { paymentMethodId: paymentMethodId },
                    success: function (response) {
                        if (response.success) {
                            alert('Payment successful! Payment Intent ID: ' + response.paymentIntentId);
                            // Redirect or show a success message
                        } else {
                            alert('Payment failed. Please try again.');
                            // Handle payment failure
                        }
                    },
                    error: function (error) {
                        console.error('Error:', error);
                        alert('An error occurred during payment. Please try again.');
                        // Handle payment error
                    }
                });
            }
        });
    }
</script>

</body>
</html>
