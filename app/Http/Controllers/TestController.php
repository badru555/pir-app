<?php

namespace App\Http\Controllers;

use App\Models\Respondent;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //

    public function index()
    {
        $this->testquery();
    }
    public function testquery()
    {
        $findrespondent_id = Respondent::where('np', 23452342)->first('id');
        if ($findrespondent_id) {
            echo $findrespondent_id;
        } else {
            echo 'nothing';
        }
    }
}
