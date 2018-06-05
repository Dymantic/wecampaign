<?php

namespace Tests\Feature\Team;

use App\Team\TeamMember;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublishTeamMemberTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function a_team_member_can_be_published()
    {
        $this->disableExceptionHandling();

        $member = factory(TeamMember::class)->create(['published' => false]);

        $response = $this->asLoggedInUser()->json("POST", "/admin/published-team-members", [
            'member_id' => $member->id
        ]);
        $response->assertStatus(200);

        $this->assertDatabaseHas('team_members', [
            'id'        => $member->id,
            'published' => true
        ]);
    }

    /**
     *@test
     */
    public function a_non_valid_member_id_results_in_four_oh_four()
    {
        $response = $this->asLoggedInUser()->json("POST", "/admin/published-team-members", [
            'member_id' => 'NOT_VALID'
        ]);
        $response->assertStatus(404);
    }
}