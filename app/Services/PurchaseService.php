<?php

namespace App\Services;
use App\Models\Purchase;
use Barryvdh\DomPDF\Facade\Pdf;

class PurchaseService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public function storePurchase(array $data): Purchase
    {
        $purchase = Purchase::create([
            'purchase_id' => 'PUR-' . strtoupper(uniqid()),
            'purchase_date' => $data['purchase_date'],
            'items' => json_encode($data['items']),
            'status' => 'pending',
        ]);

        return $purchase;
    }
    public function generatePdf(Purchase $purchase): string
    {
        $pdf = Pdf::loadView('superadmin.purchasespdf', compact('purchase'));
        $fileName = "purchase_{$purchase->purchase_id}.pdf";
        $path = storage_path("app/public/{$fileName}");

        $pdf->save($path);

        return $path;
    }
}
