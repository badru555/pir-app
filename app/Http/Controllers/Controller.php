<?php

namespace App\Http\Controllers;

use App\Models\Faq;
// use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
// use Illuminate\Foundation\Bus\DispatchesJobs;
// use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function index()
    {
        return view('welcome');
    }
    public function faq()
    {
        return view('faq', [
            'faqs' => Faq::all()
        ]);
    }
}
