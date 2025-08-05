<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deal;
use Illuminate\Http\Request;

class DealController extends Controller
{
    /* Kanban board */
    public function index(Request $request)
    {
        $owners = \App\Models\User::all();
        $stages = ['lead','qualified','proposal','negotiation','won','lost'];

        $board = [];
        foreach ($stages as $stage) {
            $q = Deal::whereRaw('LOWER(stage)=?',[$stage]);

            if ($s = $request->get('search')) {
                $q->where('name','like',"%{$s}%");
            }
            if ($owner = $request->get('owner')) {
                $q->where('owner_id',$owner);
            }
            $board[$stage] = $q->with('customer')->get();
        }

        return view('admin.deals.board', compact('owners','stages','board'));
    }
// app/Http/Controllers/Admin/DealController.php
public function update(Deal $deal, Request $r)
{
    $data = $r->validate([
        'name'       => 'required|string|max:255',
        'value_est'  => 'required|numeric|min:0',
        'stage'      => 'required|in:lead,qualified,proposal,negotiation,won,lost',
    ]);

    $deal->update($data);

    // Return fresh HTML fragment so the drawer shows saved values
    $deal->load('customer','owner');
    return view('admin.deals.drawer', compact('deal'));
}

    /* HTML fragment for the drawer */
    public function drawer(Deal $deal)
    {
        $deal->load('customer','owner');
        return view('admin.deals.drawer', compact('deal'));
    }
}
