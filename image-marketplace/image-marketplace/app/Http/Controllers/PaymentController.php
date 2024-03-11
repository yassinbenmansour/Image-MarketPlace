<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use ErrorException;

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
        \Stripe\Stripe::setApiKey('sk_test_51NSt8IE72v05zDQb1q469LW4ls1GdCcf5sKiJMZmzN0qVRTzyu8QdpJXchxFNdVUxriMLAwWacbkuscnW72NcmOk00fsK2M0fK');

        try {
            $jsonStr = file_get_contents('php://input');
            $jsonObj = json_decode($jsonStr);

            $paymentIntent = \Stripe\PaymentIntent::create([
                'amount' => $this->calculateOrderAmount($jsonObj->items),
                'currency' => 'usd',
                'description' => 'Laravel Images Stock',
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

    // public function success()
    // {
    //     $order = session()->get('order');
    //     auth()->user()->orders()->create($order);
    //     session()->remove('order');
    //     return redirect()->route('photos.show', $order['photo_id'])->with([
    //         'success' => 'Payment placed successfully'
    //     ]);
    // }
}