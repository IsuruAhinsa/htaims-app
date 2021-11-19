<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait HasPhoto {

    /**
     * Update the photo.
     * @param UploadedFile $photo
     * @param string $column
     * @param string $path
     */
    public function updatePhoto(UploadedFile $photo, string $column, string $path)
    {
        tap($this->$column, function ($previous) use ($photo, $column, $path) {
            $this->forceFill([
                $column => $photo->storePublicly(
                    $path, ['disk' => $this->photoDisk()]
                ),
            ])->save();

            if ($previous) {
                Storage::disk($this->photoDisk())->delete($previous);
            }
        });
    }

    /**
     * Delete the photo.
     *
     * @return void
     */
    public function deletePhoto(string $column)
    {
        Storage::disk($this->photoDisk())->delete($this->$column);

        $this->forceFill([
            $column => null,
        ])->save();
    }

    /**
     * Get the disk that photos should be stored on.
     *
     * @return string
     */
    protected function photoDisk()
    {
        return isset($_ENV['VAPOR_ARTIFACT_NAME']) ? 's3' : config('jetstream.profile_photo_disk', 'public');
    }

}
