<?php

namespace App\Models\Livewire;

use Livewire\TemporaryUploadedFile;

class CustomTemporaryUploadedFile extends TemporaryUploadedFile
{
    protected $storage;
    protected $path;

    /**
     * @param mixed $path
     */
    public function setPath($path): void
    {
        $this->path = $path;
    }
}
