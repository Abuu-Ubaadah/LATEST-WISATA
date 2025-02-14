<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class OrderApiController extends Controller
{
    /**
     * Menampilkan Daftar Order.
     */
    public function index()
    {
        $orders = Order::with('orderItems', 'cashier')->latest()->get();
        return ResponseHelper::success('List of orders', $orders);
    }

    /**
     * Menyimpan Order Baru.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'total_price' => 'required|numeric|min:0',
            'total_item' => 'required|integer|min:1',
            'payment_amount' => 'required|numeric|min:0',
            'payment_method' => 'required|string',
            'status' => 'required|string|in:pending,processing,completed,canceled',
        ]);

        if ($validator->fails()) {
            return ResponseHelper::error($validator->errors()->first(), 422);
        }

        $order = Order::create([
            'user_id' => Auth::id(), // Order Dibuat Oleh User Yang Login
            'cashier_id' => Auth::id(),
            'cashier_name' => Auth::user()->name,
            'transaction_time' => now(),
            'total_price' => $request->total_price,
            'total_item' => $request->total_item,
            'payment_amount' => $request->payment_amount,
            'payment_method' => $request->payment_method,
            'status' => $request->status,
        ]);

        return ResponseHelper::success('Order Has Created Successfully', $order, 201);
    }

    /**
     * Menampilkan Detail Order Tertentu.
     */
    public function show($id)
    {
        $order = Order::with('orderItems', 'cashier')->find($id);

        if (!$order) {
            return ResponseHelper::error('Order Has Not Found', 404);
        }

        return ResponseHelper::success('Order Details', $order);
    }

    /**
     * Update order.
     */
    public function update(Request $request, $id)
    {
        $order = Order::find($id);

        if (!$order) {
            return ResponseHelper::error('Order Has Not Found', 404);
        }

        $validator = Validator::make($request->all(), [
            'total_price' => 'nullable|numeric|min:0',
            'total_item' => 'nullable|integer|min:1',
            'payment_amount' => 'nullable|numeric|min:0',
            'payment_method' => 'nullable|string',
            'status' => 'nullable|string|in:pending,processing,completed,canceled',
        ]);

        if ($validator->fails()) {
            return ResponseHelper::error($validator->errors()->first(), 422);
        }

        $order->update($request->only([
            'total_price', 'total_item', 'payment_amount', 'payment_method', 'status'
        ]));

        return ResponseHelper::success('Order Has Updated Successfully', $order);
    }

    /**
     * Hapus Order (Soft Delete).
     */
    public function destroy($id)
    {
        $order = Order::find($id);

        if (!$order) {
            return ResponseHelper::error('Order Has Not Found', 404);
        }

        $order->delete();
        return ResponseHelper::success('Order Has Soft Deleted Successfully');
    }
}
