<?php

namespace WallaceMaxters\BladeHeadlessUi\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Symfony\Component\Finder\Finder;

class MakeConfig extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:config-headless-ui {--merge=0}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a empty config for blade-headless-ui component';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $path = __DIR__ . '/../../resources/views/components/';

        $isMerge = filter_var($this->option('merge'), FILTER_VALIDATE_BOOL);

        $paths = Finder::create()
                    ->files()
                    ->ignoreDotFiles(true)
                    ->in($path)
                    // ->name('*.blade.php')
                    ->sortByName();

        $result = [];

        foreach ($paths as $item) {

            $value = $item->getBasename('.blade.php');
            $key = $item->getRelativePath();

            $configKey = $key ? $key . '.' . $value : $value;

            $config = null;

            if ($isMerge) {
                $config = config('blade-headless-ui.components.' . $configKey);
            }

            $itemConfig = $config ?? [
                'base'   => $key ? sprintf('ui-%s-%s', $key, $value) : 'ui-' . $value,
                'themes' => [
                    'normal' => null
                ]
            ];

            if ($key) {
                $result[$key][$value] = $itemConfig;
            } else {
                $result[$value] = $itemConfig;
            }
        }

        File::put(config_path('blade-headless-ui.php'), $this->arrayToCode($result));
    }

    protected function arrayToCode(array $array): string
    {
        $config = ['namespace' => config('blade-headless-ui.namespace'), 'components' => $array];

        $export = $this->shorthandVarExport($config);

        return "<?php \nreturn {$export};\n";
    }

    public function shorthandVarExport ($expression): string {

        $export = var_export($expression, true);

        $patterns = [
            '/array \(/' => '[',
            '/^([ ]*)\)(,?)$/m' => '$1]$2',
        ];

        $output = preg_replace(array_keys($patterns), array_values($patterns), $export);

        return $output;
    }

}
