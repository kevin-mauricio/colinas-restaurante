<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CouponRequest;
use Illuminate\Http\Request;
use App\Models\Coupon;

use function Laravel\Prompts\alert;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       /*  $coupons = Coupon::all(); */
       $coupons = Coupon::orderBy('status', 'desc')->get();
        return view('view_coupon_list', compact('coupons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $porcentaje = $request->input('porcentaje');
        $porcentajeDecimal = $porcentaje / 100;

        $couponData = [
            'code' => $request->input('code'),
            'porcentaje' => $porcentajeDecimal
        ];

        Coupon::create($couponData);
        return redirect()->route('index_coupon')->with([
            'alert' => [
                'color' => 'success',
                'message' => 'Coupon created'
            ]
        ]);
    }

    public function updateStatus(int $id)
    {   
        $currentCoupon = Coupon::findOrFail($id);
        $currentCoupon->status = ($currentCoupon->status) ? false : true;
        $currentCoupon->save();

        return redirect()->route('index_coupon')->with([
            'alert' => [
                'status' => $currentCoupon->status
            ]
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return redirect()->route('index_coupon')->with([
            'alert' => [
                'color' => 'danger',
                'message' => 'Coupon deleted'
            ]
        ]);
    }
}
