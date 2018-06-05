<?php

namespace Tests\Feature\Team;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateTeamMemberTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function a_team_member_can_be_added()
    {
        $this->disableExceptionHandling();

        $response = $this->asLoggedInUser()
                         ->json("POST", "/admin/team-members", $this->validMemberAttributes());
        $response->assertStatus(201);

        $this->assertDatabaseHas('team_members', $this->validMemberAttributes());
    }

    /**
     * @test
     */
    public function a_team_member_can_be_created_with_only_an_korean_name_at_first()
    {
        $this->disableExceptionHandling();

        $response = $this->asLoggedInUser()
                         ->json("POST", "/admin/team-members", $this->validMemberAttributes([
                             'name_en' => null,
                             'bio_en'  => null,
                             'bio_ko'  => null
                         ]));
        $response->assertStatus(201);

        $this->assertDatabaseHas('team_members', $this->validMemberAttributes([
            'name_en' => null,
            'bio_en'  => null,
            'bio_ko'  => null
        ]));
    }

    /**
     *@test
     */
    public function a_team_member_cannot_be_created_without_at_least_one_name()
    {
        $response = $this->asLoggedInUser()
                         ->json("POST", "/admin/team-members", $this->validMemberAttributes([
                             'name_ko' => null,
                             'name_en' => null,
                             'bio_en'  => null,
                             'bio_ko'  => null
                         ]));
        $response->assertStatus(422);

        $response->assertJsonValidationErrors('name_ko');
        $response->assertJsonValidationErrors('name_en');
    }

    /**
     * @test
     */
    public function a_team_member_can_be_created_with_only_an_english_name_at_first()
    {
        $this->disableExceptionHandling();

        $response = $this->asLoggedInUser()
                         ->json("POST", "/admin/team-members", $this->validMemberAttributes([
                             'name_ko' => null,
                             'bio_en'  => null,
                             'bio_ko'  => null
                         ]));
        $response->assertStatus(201);

        $this->assertDatabaseHas('team_members', $this->validMemberAttributes([
            'name_ko' => null,
            'bio_en'  => null,
            'bio_ko'  => null
        ]));
    }

    private function validMemberAttributes($overrides = [])
    {
        $defaults = [
            'name_en' => 'Test Person',
            'name_ko' => '시험 사람',
            'bio_en'  => 'Test bio paragraph',
            'bio_ko'  => '시험 소개'
        ];

        return array_merge($defaults, $overrides);
    }
}