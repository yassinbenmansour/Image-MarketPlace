<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ErrorException;
use App\Models\Photo;
use Stripe\Stripe;

class PaymentController extends Controller
{
    public function index(Photo $photo)
    {
        return view('payments.index')->with([
            'photo' => $photo
        ]);
    }

    public function pay()
    {
        try {
            Stripe::setApiKey('sk_test_51NSt8IE72v05zDQbJNltILNwrjFF4dO9proZXVYkVGraoQKqdZ4ZJdEgmXP7Oioz7UjhL2ghRHngD15iS0grG1Va000JUDDaGc');

            $jsonStr = file_get_contents('php://input');
            $jsonObj = json_decode($jsonStr);

            $paymentIntent = \Stripe\PaymentIntent::create([
                'amount' => $this->calculateOrderAmount($jsonObj->items),
                'currency' => 'usd',
                'description' => 'Image ',
                'setup_future_usage' => 'on_session',
                'metadata' => [
                    'user_id' => auth()->user()->id
                ]
            ]);

            $output = [
                'clientSecret' => $paymentIntent->client_secret
            ];

            return response()->json($output);

        } catch (ErrorException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }

    public function calculateOrderAmount(array $items)
    {
        foreach ($items as $item) {
            return $item->amount * 100;
        }
    }

    public function success(Request $request)
    {
        // Handle successful payment here, for example, update the order status
        $photoId = $request->input('photo_id');
        // Perform additional actions, if necessary

        return view('payments.success');
    }
}
