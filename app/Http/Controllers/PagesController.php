<?php

namespace App\Http\Controllers;

use App\Team\TeamMember;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function team()
    {
        $team = TeamMember::published()->get();

        return view('front.team.page', ['team' => $team]);
    }
}
