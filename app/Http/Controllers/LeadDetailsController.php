<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreLeadProductRequest;
use App\Models\Call;
use App\Models\Discussion;
use App\Models\LeadDetails;
use App\Services\LeadProductService;
use App\Models\Lead;
use Illuminate\Http\Request;
use App\Services\CallService;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreCallRequest;
class LeadDetailsController extends Controller
{
    protected CallService $callService;
    protected LeadProductService $leadProductService;

    public function __construct(CallService $callService, LeadProductService $leadProductService)
    {
        $this->callService = $callService;
        $this->leadProductService = $leadProductService;
    }
    public function createleaddetails($id)
    {
        $lead = Lead::with('leadDetails')->findOrFail($id);
        $calls = Call::where('lead_id', $id)
            ->orderBy('call_time', 'desc')
            ->get();
        $discussions = Discussion::where('lead_id', $id)
            ->orderBy('date', 'desc')
            ->get();
        return view('superadmin.createleaddetails')->with(compact('lead', 'calls','discussions'));
    }

    public function store(StoreLeadProductRequest $request): RedirectResponse
    {
        $this->leadProductService->store($request->validated());

        return redirect()->back()->with('success', 'Product added successfully!');
    }

    public function callstore(StoreCallRequest $request): RedirectResponse
    {
        // Use validated data from the request
        $this->callService->store($request->validated());

        return redirect()->back()->with('success', 'Call added successfully!');
    }

    public function Discussionstore(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'lead_id' => 'required|exists:leads,id',
            'date' => 'required|date',
            'discussion' => 'required|string|max:5000',
        ]);

        // Create a new Discussion entry
        Discussion::create($validated);

        // Redirect with success message
        return redirect()->back()->with('success', 'Call saved successfully!');
    }
}
