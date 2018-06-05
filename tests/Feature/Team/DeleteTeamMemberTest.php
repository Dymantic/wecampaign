<?php

namespace Tests\Feature\Team;

use App\Team\TeamMember;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeleteTeamMemberTest extends TestCase
{
    use RefreshDatabase;

    /**
     *@test
     */
    public function an_existing_team_member_can_be_deleted()
    {
        $this->disableExceptionHandling();

        $member = factory(TeamMember::class)->create();

        $response = $this->asLoggedInUser()->json("DELETE", "/admin/team-members/{$member->id}");
        $response->assertStatus(200);

        $this->assertDatabaseMissing('team_members', ['id' => $member->id]);
    }
}