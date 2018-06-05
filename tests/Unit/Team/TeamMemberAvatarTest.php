<?php


namespace Tests\Unit\Team;


use App\Team\TeamMember;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\Models\Media;
use Tests\TestCase;

class TeamMemberAvatarTest extends TestCase
{
    use RefreshDatabase;

    /**
     *@test
     */
    public function an_avatar_can_be_set_for_a_team_member()
    {
        Storage::fake('media');

        $member = factory(TeamMember::class)->create();

        $image = $member->setAvatar(UploadedFile::fake()->image('testpic.png'));

        $this->assertInstanceOf(Media::class, $image);
        $this->assertCount(1, $member->getMedia(TeamMember::AVATAR_COLLECTION));
    }

    /**
     *@test
     */
    public function a_thumbnail_conversion_gets_created_for_avatars()
    {
        Storage::fake('media');

        $member = factory(TeamMember::class)->create();

        $image = $member->setAvatar(UploadedFile::fake()->image('testpic.png'));

        Storage::disk('media')->assertExists(str_after($image->getPath('thumb'), 'public/media'));
    }

    /**
     *@test
     */
    public function setting_an_avatar_overwrites_the_previos_one()
    {
        Storage::fake('media');

        $member = factory(TeamMember::class)->create();

        $member->setAvatar(UploadedFile::fake()->image('old_avatar.png'));

        $member->setAvatar(UploadedFile::fake()->image('new_avatar.png'));

        $this->assertCount(1, $member->getMedia(TeamMember::AVATAR_COLLECTION));
    }

    /**
     *@test
     */
    public function a_members_avatar_can_be_cleared()
    {
        Storage::fake('media');

        $member = factory(TeamMember::class)->create();

        $image = $member->setAvatar(UploadedFile::fake()->image('old_avatar.png'));
        $this->assertCount(1, $member->getMedia(TeamMember::AVATAR_COLLECTION));

        $member->clearAvatar();

        $this->assertCount(0, $member->fresh()->getMedia(TeamMember::AVATAR_COLLECTION));
        Storage::disk('media')->assertMissing($image->getPath());
    }

    /**
     *@test
     */
    public function a_member_can_easily_get_the_avatar_url_for_a_giver_conversion()
    {
        Storage::fake('media');

        $member = factory(TeamMember::class)->create();
        $image = $member->setAvatar(UploadedFile::fake()->image('avatar.png'));

        $this->assertEquals($member->fresh()->getFirstMedia(TeamMember::AVATAR_COLLECTION)->getUrl(), $member->fresh()->avatar());
        $this->assertEquals($member->fresh()->getFirstMedia(TeamMember::AVATAR_COLLECTION)->getUrl('thumb'), $member->fresh()->avatar('thumb'));
    }

    /**
     *@test
     */
    public function a_default_avatar_exists_for_members()
    {
        Storage::fake('media');

        $member = factory(TeamMember::class)->create();

        $this->assertEquals(TeamMember::DEFAULT_AVATAR, $member->fresh()->avatar());
        $this->assertEquals(TeamMember::DEFAULT_AVATAR, $member->fresh()->avatar('thumb'));
    }
}