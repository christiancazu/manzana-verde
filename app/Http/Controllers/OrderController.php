<?php

namespace App\Http\Controllers;

use App\Enums\Additionals;
use App\Models\Additional;
use App\Models\DetailOrder;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Order::with('details.plate')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = Order::create([
            "code_date" => $request->code_date
        ]);

        $additional = new Additional();

        foreach (Additionals::all() as $additionalName) {
            $additional->{$additionalName} = $request->additionals[$additionalName] ?? false;
        }

        $additional->order()->associate($order)->save();

        $this->createOrders($order, $request->plate);

        return $this->show($order->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Order::with('additionals', 'details.plate')->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $additional = Additional::where('order_id', $order->id)->first();

        $additionalIncludes = [];

        foreach (Additionals::all() as $additionalName) {
            $additionalIncludes[$additionalName] = $request->additionals[$additionalName] ?? false;
        }

        $additional->update((array) $additionalIncludes);

        DetailOrder::where('order_id', $order->id)->delete();

        $this->createOrders($order, $request->plate);

        return $this->show($order->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getByCodeDate(string $codeDate)
    {
        return Order::with('additionals', 'details.plate')->where('code_date', $codeDate)->firstOrFail();
    }

    private function createOrders(Order $order, $plateData)
    {
        $detailOrder = $order->details()->create(['type' => $plateData['type']]);

        $detailOrder->plate_id = $plateData['id'];

        $detailOrder->save();

        if (is_array($plateData['extra_ids']) && count($plateData['extra_ids']) > 0) {
            foreach ($plateData['extra_ids'] as $extraId) {
                $extradetailOrder = new DetailOrder();
                $extradetailOrder->order_id = $order->id;
                $extradetailOrder->type = $plateData['type'];
                $extradetailOrder->plate_id = $extraId;

                $extradetailOrder->save();
            }
        }
    }
}
