<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait HasFile {

    /**
     * Update the file.
     * @param UploadedFile $file
     * @param string $column
     * @param string $path
     */
    public function updateFile(UploadedFile $file, string $column, string $path)
    {
        tap($this->$column, function ($previous) use ($file, $column, $path) {

            $this->forceFill([
                $column => $file->storePublicly(
                    $path, ['disk' => $this->fileDisk()]
                ),
            ])->save();

            if ($previous) {
                Storage::disk($this->fileDisk())->delete($previous);
            }

        });
    }

    /**
     * Delete the file.
     *
     * @return void
     */
    public function deleteFile(string $column)
    {
        Storage::disk($this->fileDisk())->delete($this->$column);

        $this->forceFill([
            $column => null,
        ])->save();
    }

    /**
     * Get the disk that files should be stored on.
     *
     * @return string
     */
    protected function fileDisk()
    {
        return isset($_ENV['VAPOR_ARTIFACT_NAME']) ? 's3' : config('jetstream.profile_file_disk', 'public');
    }

}
