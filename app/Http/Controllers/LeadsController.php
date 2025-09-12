<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Lead;
use App\Http\Requests\StoreLeadRequest;
use App\Services\LeadService;
use Illuminate\Http\RedirectResponse;

class LeadsController extends Controller
{

    protected $leadService;

    public function __construct(LeadService $leadService)
    {
        $this->leadService = $leadService;
    }
    public function leadlist()
    {
        $today = Carbon::today();
        $yesterday = Carbon::yesterday();

        // Hot Leads: Today or Yesterday
        $hotLeads = Lead::whereDate('date', $today)
            ->orWhereDate('date', $yesterday)
            ->orderBy('date', 'desc')
            ->get();

        // Warm Leads: 2 to 4 days ago
        $warmLeads = Lead::whereBetween('date', [
            Carbon::today()->subDays(4),
            Carbon::today()->subDays(2)
        ])
            ->orderBy('date', 'desc')
            ->get();

        // Cold Leads: 5 or more days ago
        $coldLeads = Lead::whereDate('date', '<=', Carbon::today()->subDays(5))
            ->orderBy('date', 'desc')
            ->get();

        return view('superadmin.leadlist')->with(compact('hotLeads', 'warmLeads', 'coldLeads'));
    }

    public function createlead()
    {

        return view('superadmin.createlead');
    }

    public function storelead(StoreLeadRequest $request): RedirectResponse
    {
        $this->leadService->store($request->validated());

        return redirect()->back()->with('success', 'Lead added successfully!');
    }
}
