<?php

namespace App\Http\Controllers\Admin;

use App\Team\TeamMember;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamMemberAvatarController extends Controller
{
    public function store(TeamMember $member)
    {
        $upload = request()->validate([
            'image' => ['required', 'image']
        ]);

        $image = $member->setAvatar($upload['image']);

        return ['image_src' => $image->getUrl('thumb')];
    }

    public function delete(TeamMember $member)
    {
        $member->clearAvatar();
    }
}
