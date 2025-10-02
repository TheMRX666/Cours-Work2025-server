<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;

class CouponController extends Controller
{
    public function check(Request $request): JsonResponse
    {
        $request->validate([
            'code' => 'required|string|max:255',
        ]);

        $coupon = Coupon::where('code', $request->code)->first();

        if (!$coupon) {
            return response()->json([
                'valid' => false,
                'message' => 'Купон не валiдний.',
            ], 404);
        }

        if (!$coupon->is_active) {
            return response()->json([
                'valid' => false,
                'message' => 'Купон не валiдний.',
            ], 403);
        }

        if ($coupon->expires_at && Carbon::parse($coupon->expires_at)->isPast()) {
            return response()->json([
                'valid' => false,
                'message' => 'Термiн купона закiнчився.',
            ], 403);
        }

        return response()->json([
            'valid' => true,
            'message' => 'Купон успешно применён.',
            'coupon' => $coupon,
        ]);
    }
}
