<?php

namespace App\Team;

use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class TeamMember extends Model implements HasMedia
{
    use HasMediaTrait;

    const AVATAR_COLLECTION = 'avatars';
    const DEFAULT_AVATAR = '/avatars/default.png';

    protected $table = 'team_members';

    protected $fillable = ['name_en', 'name_ko', 'bio_en', 'bio_ko'];

    protected $casts = ['published' => 'boolean'];

    public function publish()
    {
        $this->published = true;
        $this->save();
    }

    public function retract()
    {
        $this->published = false;
        $this->save();
    }

    public function scopePublished($query)
    {
        return $query->where('published', true);
    }

    public function avatar($conversion = '')
    {
        $image = $this->getFirstMedia(static::AVATAR_COLLECTION);

        return $image ? $image->getUrl($conversion) : static::DEFAULT_AVATAR;
    }

    public function setAvatar($image)
    {
        $this->clearAvatar();
        return $this->addMedia($image)
                    ->preservingOriginal()
                    ->toMediaCollection(static::AVATAR_COLLECTION);
    }

    public function clearAvatar()
    {
        $this->clearMediaCollection(static::AVATAR_COLLECTION);
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->crop(Manipulations::CROP_CENTER, 300, 300)
            ->keepOriginalImageFormat()
            ->optimize()
            ->performOnCollections(static::AVATAR_COLLECTION);;
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'name_en' => $this->name_en,
            'name_ko' => $this->name_ko,
            'bio_en'  => $this->bio_en,
            'bio_ko'  => $this->bio_ko,
            'avatar_thumb_src' => $this->avatar('thumb'),
            'avatar_src' => $this->avatar(),
            'published' => false
        ];
    }
}
