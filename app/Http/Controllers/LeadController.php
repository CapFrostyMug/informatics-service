<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeadCreateRequest;
use App\Models\Lead;
use App\Models\Status;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class LeadController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): view
    {
        return view('leads.form.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param LeadCreateRequest $request
     * @return RedirectResponse
     */
    public function store(LeadCreateRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();

        try {
            DB::transaction(function () use ($validatedData) {
                Lead::create([
                    'name' => $validatedData['name'],
                    'surname' => $validatedData['surname'],
                    'phone' => $validatedData['phone'],
                    'email' => $validatedData['email'],
                    'appeal' => $validatedData['appeal']
                ]);
            }, 3);

            return redirect()->route('lead.create')->with('success', config('messages.leads.success.store'));

        } catch (\Exception $exception) {
            return back()->withInput()->with('error', config('messages.leads.error.store'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return View
     */
    public function edit(int $id): view
    {
        $lead = Lead::find($id);

        if (empty($lead)) {
            abort(404);
        }

        return view('leads.form.index', compact('lead'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param LeadCreateRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(LeadCreateRequest $request, int $id): RedirectResponse
    {
        $validatedData = $request->validated();

        try {
            DB::transaction(function () use ($validatedData, $id) {
                Lead::where('id', $id)->update([
                    'name' => $validatedData['name'],
                    'surname' => $validatedData['surname'],
                    'phone' => $validatedData['phone'],
                    'email' => $validatedData['email'],
                    'appeal' => $validatedData['appeal']
                ]);
            }, 3);

            return redirect()->route('lead.update', $id)->with('success', config('messages.leads.success.update'));

        } catch (\Exception $exception) {
            return back()->withInput()->with('error', config('messages.leads.error.update'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        try {
            DB::transaction(function () use ($id) {
                Lead::find($id)->delete();
            }, 3);

            return redirect()->route('lead.update', $id)->with('success', config('messages.leads.success.destroy'));

        } catch (\Exception $exception) {
            return back()->withInput()->with('error', config('messages.leads.error.destroy'));
        }
    }

    /**
     * Метод возвращает страницу со списком лидов, а также статистику по ним.
     *
     * @param
     * @return View
     */
    public function showListsAndStatistics(): view
    {
        $leads = Lead::paginate(config('paginate.leads'))->withQueryString();
        $totalCount = $leads->total();
        $statuses = Status::all();
        $statusStatistics = [];

        /** Формируем массив из названий статусов лидов и количества лидов по каждому из статусов */
        foreach ($statuses as $status) {
            $countLead = Lead::where('status_id', $status->id)->get()->count();
            $statusStatistics[$status->name] = $countLead;
        }

        return view('leads.lists.index', compact(['leads', 'totalCount', 'statuses', 'statusStatistics']));
    }

    /**
     * Метод изменяет статус лида.
     *
     * @param Request $request
     * @return null|object
     */
    public function changeLeadStatus(Request $request): null|object
    {
        try {
            DB::transaction(function () use ($request) {
                Lead::where('id', $request['lead_id'])->update([
                    'status_id' => $request['status_id']
                ]);
            }, 3);

            return null;

        } catch (\Exception $exception) {
            return $exception;
        }
    }
}
