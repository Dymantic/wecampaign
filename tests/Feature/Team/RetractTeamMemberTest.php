<?php


namespace Tests\Feature\Team;


use App\Team\TeamMember;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RetractTeamMemberTest extends TestCase
{
    use RefreshDatabase;

    /**
     *@test
     */
    public function a_team_member_can_be_retracted()
    {
        $this->disableExceptionHandling();

        $member = factory(TeamMember::class)->create(['published' => true]);

        $response = $this->asLoggedInUser()->json("DELETE", "/admin/published-team-members/{$member->id}");
        $response->assertStatus(200);

        $this->assertDatabaseHas('team_members', [
            'id'        => $member->id,
            'published' => false
        ]);
    }
}