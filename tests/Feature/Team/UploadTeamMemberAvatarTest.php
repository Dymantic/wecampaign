<?php


namespace Tests\Feature\Team;


use App\Team\TeamMember;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class UploadTeamMemberAvatarTest extends TestCase
{
    use RefreshDatabase;

    /**
     *@test
     */
    public function an_image_can_be_uploaded_to_a_team_member()
    {
        Storage::fake('media');

        $this->disableExceptionHandling();

        $member = factory(TeamMember::class)->create();

        $response = $this->asLoggedInUser()->json("POST", "/admin/team-members/{$member->id}/avatar", [
            'image' => UploadedFile::fake()->image('testpic.png')
        ]);
        $response->assertStatus(200);

        $this->assertCount(1, $member->fresh()->getMedia(TeamMember::AVATAR_COLLECTION));
        $image = $member->getFirstMedia(TeamMember::AVATAR_COLLECTION);
        Storage::disk('media')->assertExists(str_after($image->getPath(), 'public/media'));
    }

    /**
     *@test
     */
    public function uploading_the_image_responds_with_the_thumb_src()
    {
        Storage::fake('media');

        $this->disableExceptionHandling();

        $member = factory(TeamMember::class)->create();

        $response = $this->asLoggedInUser()->json("POST", "/admin/team-members/{$member->id}/avatar", [
            'image' => UploadedFile::fake()->image('testpic.png')
        ]);
        $response->assertStatus(200);

        $this->assertCount(1, $member->fresh()->getMedia(TeamMember::AVATAR_COLLECTION));
        $image = $member->getFirstMedia(TeamMember::AVATAR_COLLECTION);
        $this->assertEquals($image->getUrl('thumb'), $response->decodeResponseJson('image_src'));
    }

    /**
     *@test
     */
    public function the_image_is_required()
    {
        Storage::fake('media');

        $member = factory(TeamMember::class)->create();

        $response = $this->asLoggedInUser()->json("POST", "/admin/team-members/{$member->id}/avatar", [
            'image' => ''
        ]);
        $response->assertStatus(422);
        $response->assertJsonValidationErrors('image');
    }

    /**
     *@test
     */
    public function the_image_must_be_a_valid_image_type()
    {
        Storage::fake('media');

        $member = factory(TeamMember::class)->create();

        $response = $this->asLoggedInUser()->json("POST", "/admin/team-members/{$member->id}/avatar", [
            'image' => UploadedFile::fake()->create('not_an_image.txt')
        ]);
        $response->assertStatus(422);
        $response->assertJsonValidationErrors('image');
    }
}