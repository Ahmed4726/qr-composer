<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
</head>
<body>

<div id="payment" class="form-step">
    <h2>Payment</h2>
    <form id="paymentForm">
        @csrf <!-- Add CSRF token here -->
        <div id="card-element">
            <!-- A Stripe Element will be inserted here. -->
        </div>
        <input id="price" type="hidden" value="{{$price}}">
        <!-- Used to display form errors. -->
        <div id="card-errors" role="alert"></div>
        <button type="button" onclick="submitPayment()">Submit Payment</button>
    </form>
</div>
<script src="https://js.stripe.com/v3/"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- If you're not using npm/yarn, include it via CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

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
                var price = document.getElementById('price').value;
                // alert(price)
                $.ajax({
                    url: '/process-payment',
                    type: 'POST',
                    data: {
                        paymentMethodId: paymentMethodId,
                        _token: '{{ csrf_token() }}',
                        price: price
                    },
                    dataType: 'json',
                    success: function (response) {
                        if (response.success) {
                            alert('ok')
                        // Payment successful
                        Swal.fire({
                            icon: 'success',
                            title: 'Package Purchased Successfully',
                            showConfirmButton: true,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '{{ route("campaigns.index") }}';
                            }
                        });
                    } else {
                            // Payment failed
                            Swal.fire({
                                icon: 'error',
                                title: 'Payment failed',
                                text: 'Please try again.',
                            });
                        }
                    },
                    error: function (error) {
                        console.error('Error:', error);
                        // Handle payment error
                        Swal.fire({
                            icon: 'error',
                            title: 'An error occurred during payment',
                            text: 'Please try again.',
                        });
                    }
                });
            }
        });
    }
</script>

</body>
</html>
