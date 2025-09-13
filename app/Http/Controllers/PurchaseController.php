<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePurchaseRequest;
use App\Services\PurchaseService;
use App\Models\Purchase;
use Barryvdh\DomPDF\Facade\Pdf;

class PurchaseController extends Controller
{
    protected $purchaseService;

    public function __construct(PurchaseService $purchaseService)
    {
        $this->purchaseService = $purchaseService;
    }

    public function purchaseList()
    {
        $purchases = Purchase::latest()->get(); // Fetch all purchases with supplier details
        // Logic to display the purchase page
        return view('superadmin.purchaselist')->with(compact('purchases'));
    }

    public function createpurchase()
    {
        // Logic to display the create purchase page
        return view('superadmin.createpurchase');
    }

    public function storepurchase(StorePurchaseRequest $request)
    {
        $purchase = $this->purchaseService->storePurchase($request->validated());
        $pdfPath = $this->purchaseService->generatePdf($purchase);
        // $pdfPath = "";
        return redirect()->route('purchase.list', $purchase->id)
            ->with('success', 'Purchase created successfully. PDF generated at: ' . $pdfPath);
    }

    public function downloadPdf($id)
    {
        $purchase = Purchase::findOrFail($id);
        // Decode the JSON items into an array
        $purchase->items = json_decode($purchase->items, true);

        $pdf = Pdf::loadView('superadmin.purchasespdf', compact('purchase'));

        return $pdf->download("purchase_{$purchase->purchase_id}.pdf");
    }

    public function updateStatus(Request $request)
    {
        $purchase = Purchase::find($request->id);

        if ($purchase && $purchase->status == 'approved') {
            $purchase->status = 'completed';
            $purchase->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 400);
    }
}
