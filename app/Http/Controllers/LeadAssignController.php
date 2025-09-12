<?php

namespace App\Http\Controllers;

use App\Models\AssignLead;
use App\Models\Lead;
use App\Models\User;
use App\Services\AssignLeadService;
use App\Http\Requests\AssignLeadRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LeadAssignController extends Controller
{

    protected $assignLeadService;

    public function __construct(AssignLeadService $assignLeadService)
    {
        $this->assignLeadService = $assignLeadService;
    }

    public function leadassignlist()
    {
        $assignleads = AssignLead::with(['lead', 'user'])->get();
        return view('superadmin.leadsassignlist')->with(compact('assignleads'));
    }

    public function createleadassign()
    {
        $leads = Lead::all();
        $users = User::all();
        return view('superadmin.createleadassign')->with(compact('leads', 'users'));
    }
    public function leadassignstore(AssignLeadRequest $request): RedirectResponse
    {
        $this->assignLeadService->store($request->validated());

        return redirect()->route('leads.assign.list')->with('success', 'Lead assigned successfully!');
    }
}
