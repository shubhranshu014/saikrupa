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
        $totalAmount = collect($data['items'])
            ->sum(fn($item) => $item['qty'] * $item['price']);

        $purchase = Purchase::create([
            'purchase_id' => 'PUR-' . strtoupper(uniqid()),
            'supplier_id' => $data['supplier_id'],
            'purchase_date' => $data['purchase_date'],
            'items' => json_encode($data['items']),
            'total_amount' => $totalAmount,
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
