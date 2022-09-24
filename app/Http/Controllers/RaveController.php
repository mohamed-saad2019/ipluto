<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Course;
use App\Currency;
use App\InstructorSetting;
use App\Mail\SendOrderMail;
use App\Notifications\UserEnroll;
use App\Order;
use App\PendingPayout;
use App\User;
use App\Wishlist;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Mail;
use Notification;
use Rave;
use Redirect;
use Session;

class RaveController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Rave Addon For eclass v2.2 and above
    |--------------------------------------------------------------------------
    |
    | © 2020 - AddOn Developer @nkit
    | - Mediacity
    |
     */

    public function pay(Request $request)
    {
        Rave::initialize(route('rave.callback'));
    }

    public function success(Request $request)
    {

        $x = json_decode($request->resp, true);

        $txn = $x['tx']['txRef'];

        $data = Rave::verifyTransaction($txn);

        if ($data->status == 'success') {


            $txn_id = $data->data->txid;

            $payment_method = strtoupper('RAVE');

            $checkout = new OrderStoreController;

            return $checkout->orderstore($txn_id, $payment_method);


        }

        \Session::flash('delete', trans('flash.PaymentFailed'));
        return redirect('/');

    }
}
