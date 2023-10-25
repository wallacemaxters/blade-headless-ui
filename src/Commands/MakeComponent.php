<?php

namespace WallaceMaxters\BlessUi\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use WallaceMaxters\BlessUi\BlessUiServiceProvider;

class MakeComponent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bless-ui:make-component {name}';

    public function handle()
    {
        /**
         * @var \Illuminate\Support\Facades\File
         */
        $file = $this->laravel['files'];

        $name = $this->argument('name');

        $target = $this->laravel->resourcePath(
            'views/vendor/' . BlessUiServiceProvider::$name . '/components/' . $name . '.blade.php'
        );

        if ($file->exists($target)) {
            $this->error("file $target already exists!");
            return 1;
        }

        $file->ensureDirectoryExists($file->dirname($target), 0777);

        $template = <<<HTML
            @props([])
            <x-bless-ui::wrapper {{ \$attributes }} tag="div" :tag-self-close="false" component="{$name}">{{ \$slot }}</x-bless-ui::wrapper>
        HTML;



        $this->laravel['files']->put(
            $target,
            $template
        );
    }
}