@extends('layouts.app')

@section('title')
    Payment
@endsection

@section('content')
    <div class="row my-4">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">My Order</h2>
                </div>
                <div class="card-body">
                    <form action="" id="payment-form">
                        @csrf
                        <input type="hidden" name="photo_id" value="{{ $photo->id }}" />
                        <input type="hidden" id="total" value="{{ $photo->price * 100 }}" />

                        <div id="payment-element">
                            <!-- This is where the Stripe.js will inject the card element -->
                        </div>

                        <button class="stripe_button btn btn-success mx-auto d-block" id="submit">
                            <div class="spinner hidden" id="spinner"></div>
                            <span id="button-text">Pay now</span>
                        </button>
                        
                        <div id="payment-message" class="hidden"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
    var stripe = Stripe('pk_test_51NSt8IE72v05zDQbUgbccpfP04pPOzib3j0WijAcvPRwT59bbOXmCWPjtf2z5pgzuARQOaToideFBI5aLG3V3x8900ErPbN0GD'); // Replace with your actual publishable key
    var elements = stripe.elements();

    var style = {
        base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };

    var card = elements.create('card', { style: style });
    card.mount('#payment-element');

    // Handle real-time validation errors on the card element
    card.addEventListener('change', function (event) {
        var displayError = document.getElementById('payment-message');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    // Handle form submission
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function (event) {
        event.preventDefault();
        handlePayment();
    });

    // Function to handle payment submission
    function handlePayment() {
        stripe.confirmCardPayment(
            {
                payment_method: {
                    card: card
                }
            }
        ).then(function (result) {
            if (result.error) {
                // Show error to your customer
                showError(result.error.message);
            } else {
                // The payment has been processed successfully
                handleSuccess(result.paymentIntent.id);
            }
        });
    }

    // Function to display error message
    function showError(message) {
        var errorElement = document.getElementById('payment-message');
        errorElement.textContent = message;
    }

    // Function to handle successful payment
    function handleSuccess(paymentIntentId) {
        // Perform any actions needed on successful payment, e.g., redirect to success page
    }
});

    </script>
@endsection
