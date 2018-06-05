<?php

namespace Tests\Unit\Team;

use App\Team\TeamMember;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class TeamMemberTest extends TestCase
{
    use RefreshDatabase;

    /**
     *@test
     */
    public function a_newly_created_member_is_not_published()
    {
        $member = TeamMember::create([
            'name_en' => 'Test Person',
            'name_ko' => '시험 사람',
            'bio_en'  => 'Test bio paragraph',
            'bio_ko'  => '시험 소개'
        ]);

        $this->assertFalse($member->fresh()->published);
    }

    /**
     *@test
     */
    public function a_member_can_be_made_as_published()
    {
        $member = factory(TeamMember::class)->create(['published' => true]);

        $this->assertTrue($member->fresh()->published);
    }

    /**
     *@test
     */
    public function a_member_can_be_published()
    {
        $member = factory(TeamMember::class)->create(['published' => false]);

        $member->publish();

        $this->assertTrue($member->fresh()->published);
    }

    /**
     *@test
     */
    public function a_member_can_be_retracted()
    {
        $member = factory(TeamMember::class)->create(['published' => true]);

        $member->retract();

        $this->assertFalse($member->fresh()->published);
    }

    /**
     *@test
     */
    public function team_members_can_be_scoped_to_published_members()
    {
        $publishedA = factory(TeamMember::class)->create(['published' => true]);
        $publishedB = factory(TeamMember::class)->create(['published' => true]);
        $unpublishedA = factory(TeamMember::class)->create(['published' => false]);
        $unpublishedB = factory(TeamMember::class)->create(['published' => false]);

        $scoped = TeamMember::published()->get();

        $this->assertCount(2, $scoped);

        $this->assertTrue($scoped->contains($publishedA));
        $this->assertTrue($scoped->contains($publishedB));

        $this->assertFalse($scoped->contains($unpublishedA));
        $this->assertFalse($scoped->contains($unpublishedB));
    }

    /**
     *@test
     */
    public function a_team_member_can_be_converted_to_an_array_with_appropriate_fields()
    {
        Storage::fake('media');
        $member = factory(TeamMember::class)->create($this->validMemberAttributes());
        $image = $member->setAvatar(UploadedFile::fake()->image('testpic.png'));

        $expected = [
            'id' => $member->id,
            'name_en' => 'Test Person',
            'name_ko' => '시험 사람',
            'bio_en'  => 'Test bio paragraph',
            'bio_ko'  => '시험 소개',
            'avatar_thumb_src' => $image->getUrl('thumb'),
            'avatar_src' => $image->getUrl(),
            'published' => false
        ];

        $this->assertEquals($expected, $member->fresh()->toArray());
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