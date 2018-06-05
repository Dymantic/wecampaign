<?php

namespace App\Http\Controllers\Admin;

use App\Team\TeamMember;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PublishedTeamMembersController extends Controller
{
    public function store()
    {
        TeamMember::findOrFail(request('member_id'))->publish();
    }

    public function delete(TeamMember $member)
    {
        $member->retract();
    }
}
