<?php

namespace WallaceMaxters\BlessUi\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Finder\Finder;
use Illuminate\Support\Facades\Config;
use Symfony\Component\Finder\SplFileInfo;

class ListComponents extends Command
{
    protected $signature = 'bless-ui:list-components';

     /**
     * Execute the console command.
     */
    public function handle()
    {
        $result = [];
        
        $namespace = Config::get('bless-ui.namespace');

        foreach (static::getComponents() as $item) {

            $component = static::getComponentNameFromFile($item, namespace: true, ignoreIndex: true);

            $result[] = [$component];
        }

        $this->table(['Component'], $result);
    }

    public static function getComponents(): Finder
    {
        $path = __DIR__ . '/../../resources/views/components/';

        $paths = Finder::create()
            ->files()
            ->ignoreDotFiles(true)
            ->in($path)
            ->sortByName();

        return $paths;
    }

    public static function getComponentInfoFromFile(SplFileInfo $file): array
    {
        $value = $file->getBasename('.blade.php');
        $key   = $file->getRelativePath();

        return [$value, $key];
    }

    public static function getComponentNameFromFile(SplFileInfo $file, bool $namespace = true, bool $ignoreIndex = true): string
    {
        [$value, $key] = static::getComponentInfoFromFile($file);

        if ($value === 'index' && $ignoreIndex) {
            $value = $key;
            $key   = null;
        }

        $name = $key ? $key . '.' . $value : $value;

        return $namespace ? sprintf('%s::%s', Config::get('bless-ui.namespace'), $name) : $name;
    }
}
