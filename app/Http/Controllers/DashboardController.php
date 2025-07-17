<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'api_keys_count' => auth()->user()->apiKeys()->count(),
            'assistants_count' => auth()->user()->assistants()->count(),
            'scenarios_count' => auth()->user()->scenarios()->count(),
            'threads_count' => auth()->user()->threads()->count(),
        ];

        return view('dashboard.index', compact('stats'));
    }
}