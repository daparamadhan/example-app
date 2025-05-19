<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Shipment;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    public function track($trackingNumber)
    {
        $shipment = Shipment::where('tracking_number', $trackingNumber)
            ->with('trackingLogs')
            ->first();

        if (!$shipment) {
            return response()->json(['message' => 'Nomor resi tidak ditemukan'], 404);
        }

        return response()->json([
            'trackingNumber' => $shipment->tracking_number,
            'status' => $shipment->status,
            'lastLocation' => $shipment->last_location,
            'lastUpdate' => $shipment->last_update,
            'history' => $shipment->trackingLogs->map(function ($log) {
                return [
                    'status' => $log->status,
                    'location' => $log->location,
                    'time' => $log->update_time,
                ];
            }),
        ]);
    }
}
