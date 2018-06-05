<?php

namespace Tests\Feature\Team;

use App\Team\TeamMember;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ClearTeamMemberAvatarTest extends TestCase
{
    use RefreshDatabase;

    /**
     *@test
     */
    public function a_team_members_avatar_may_be_cleared()
    {
        Storage::fake('media');

        $this->disableExceptionHandling();

        $member = factory(TeamMember::class)->create();
        $image = $member->setAvatar(UploadedFile::fake()->image('testpic.jpg'));
        $this->assertCount(1, $member->getMedia(TeamMember::AVATAR_COLLECTION));

        $response = $this->asLoggedInUser()->json("DELETE", "/admin/team-members/{$member->id}/avatar");
        $response->assertStatus(200);

        $this->assertCount(0, $member->fresh()->getMedia(TeamMember::AVATAR_COLLECTION));
        Storage::disk('media')->assertMissing($image->getPath());
    }
}