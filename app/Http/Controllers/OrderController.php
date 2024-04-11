<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Zone;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Plato;
use App\Models\Coupon;
use Nette\Utils\Arrays;

class OrderController extends Controller
{
    protected $details = [];

    public function index()
    {
        $plates = Plato::all();
        $zones = Zone::all();
        $zoneSite = "";

        foreach ($zones as $zone) {
            if ($zone->zone_name == 'Site') {
                $zoneSite = $zone->id;
            }
        }
        return view('view_order', compact('zones', 'zoneSite', 'plates'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Obtener cupones activos
        $activeCoupons = Coupon::where('status', 1)->get();

        // Verificar si se proporcionó un cupón
        $couponClient = $request->input('coupon');
        $discount = false;
        $discountPercentage = 0;
        foreach ($activeCoupons as $coupon) {
            if ($coupon->code == $couponClient) {
                $discount = true;
                $discountPercentage = $coupon->porcentaje;
                break;
            }
        }

        // Crear la orden
        $order = Order::create($request->all());

        // Obtener el último pedido
        $lastOrder = Order::latest()->first();

        // Procesar detalles del pedido
        $plates = Plato::all();
        $total = 0;
        foreach ($plates as $plate) {
            $input = $request->input($plate->id);
            if ($input != "") {
                $subtotal = $input * $plate->precio;
                $this->details[] = [
                    'id_order' => $lastOrder->id,
                    'id_plate' => $plate->id,
                    'units' => $input,
                    'subtotal' => $subtotal
                ];
                $total += $subtotal;
            }
        }

        // Calcular descuento, si corresponde
        $discountedTotal = $discount ? $total - ($total * $discountPercentage) : $total;

        // Actualizar el total de la orden
        $order->total = $discountedTotal;
        $order->save();

        // Crear detalles de la orden
        foreach ($this->details as $detail) {
            OrderDetail::create($detail);
        }

        // Redirigir con mensaje de éxito
        return redirect()->route('details_order');
    }

    public function detailsOrder()
    {
        $lastOrder = Order::latest()->first();
        $currentDetails = OrderDetail::all()->where('id_order', $lastOrder->id);

        return view('view_details', compact('currentDetails', 'lastOrder'));
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
    public function destroy(string $id)
    {
        //
    }
}
