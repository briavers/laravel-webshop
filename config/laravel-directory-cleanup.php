<?php

use Spatie\DirectoryCleanup\Policies\DeleteEverything;

return [

    'directories' => [
        'storage/app/public/livewire-tmp' => [
            'deleteAllOlderThanMinutes' => 60,
        ],

        'storage/invoices' => [
            'deleteAllOlderThanMinutes' => 10,
        ],

        'storage/media-library' => [
            'deleteAllOlderThanMinutes' => 30,
        ],
    ],

    /*
     * If a file is older than the amount of minutes specified, a cleanup policy will decide if that file
     * should be deleted. By default every file that is older than the specified amount of minutes
     * will be deleted.
     *
     * You can customize this behaviour by writing your own clean up policy. A valid policy
     * is any class that implements `Spatie\DirectoryCleanup\Policies\CleanupPolicy`.
     */
    'cleanup_policy' => DeleteEverything::class,
];
