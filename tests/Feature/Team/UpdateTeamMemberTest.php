<?php


namespace Tests\Feature\Team;


use App\Team\TeamMember;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateTeamMemberTest extends TestCase
{
    use RefreshDatabase;

    /**
     *@test
     */
    public function an_existing_team_member_can_be_updated()
    {
        $this->disableExceptionHandling();

        $member = factory(TeamMember::class)->create([
            'name_ko' => '고명',
            'name_en' => 'Old Name',
            'bio_en'  => 'Old Bio',
            'bio_ko'  => '오래된 생물'
        ]);

        $response = $this->asLoggedInUser()->json("POST", "/admin/team-members/{$member->id}", [
            'name_ko' => '새 이름',
            'name_en' => 'New Name',
            'bio_en'  => 'New Bio',
            'bio_ko'  => '새로운 생물'
        ]);

        $response->assertStatus(200);

        $this->assertDatabaseHas('team_members', [
            'id' => $member->id,
            'name_ko' => '새 이름',
            'name_en' => 'New Name',
            'bio_en'  => 'New Bio',
            'bio_ko'  => '새로운 생물'
        ]);
    }

    /**
     *@test
     */
    public function updating_a_team_member_responds_with_the_fresh_data()
    {
        $this->disableExceptionHandling();

        $member = factory(TeamMember::class)->create([
            'name_ko' => '고명',
            'name_en' => 'Old Name',
            'bio_en'  => 'Old Bio',
            'bio_ko'  => '오래된 생물'
        ]);

        $response = $this->asLoggedInUser()->json("POST", "/admin/team-members/{$member->id}", [
            'name_ko' => '새 이름',
            'name_en' => 'New Name',
            'bio_en'  => 'New Bio',
            'bio_ko'  => '새로운 생물'
        ]);

        $response->assertStatus(200);

        $this->assertEquals($member->fresh()->toArray(), $response->decodeResponseJson());
    }

    /**
     *@test
     */
    public function all_fields_may_be_empty_except_for_a_single_name()
    {
        $this->disableExceptionHandling();

        $member = factory(TeamMember::class)->create();

        $response = $this->asLoggedInUser()->json("POST", "/admin/team-members/{$member->id}", [
            'name_ko' => '새 이름',
            'name_en' => '',
            'bio_en'  => '',
            'bio_ko'  => ''
        ]);
        $response->assertStatus(200);

        $this->assertDatabaseHas('team_members', [
            'id' => $member->id,
            'name_ko' => '새 이름',
            'name_en' => null,
            'bio_en'  => null,
            'bio_ko'  => null
        ]);
    }

    /**
     *@test
     */
    public function at_least_a_single_name_is_required()
    {
        $member = factory(TeamMember::class)->create();

        $response = $this->asLoggedInUser()->json("POST", "/admin/team-members/{$member->id}", [
            'name_ko' => '',
            'name_en' => '',
            'bio_en'  => 'test bio',
            'bio_ko'  => '시험 소개'
        ]);
        $response->assertStatus(422);

        $response->assertJsonValidationErrors('name_ko');
        $response->assertJsonValidationErrors('name_en');
    }
}