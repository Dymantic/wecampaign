<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TeamMemberForm;
use App\Team\TeamMember;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamMembersController extends Controller
{
    public function index()
    {
        $team = TeamMember::all();

        return view('admin.team-members.index', ['team' => $team]);
    }

    public function show(TeamMember $member)
    {
        return view('admin.team-members.show', ['member' => $member]);
    }

    public function store(TeamMemberForm $form)
    {
        return TeamMember::create($form->member_attributes());
    }

    public function update(TeamMemberForm $form, TeamMember $member)
    {
        $member->update($form->member_attributes());

        return $member->fresh();
    }


    public function delete(TeamMember $member)
    {
        $member->delete();
    }
}
