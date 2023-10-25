<?php

namespace WallaceMaxters\BlessUi\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Symfony\Component\Finder\Finder;
use Symfony\Component\VarExporter\VarExporter;

class MakeConfig extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bless-ui:make-config {--merge=0}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a empty config for bless-ui component';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $isMerge = filter_var($this->option('merge'), FILTER_VALIDATE_BOOL);

        $result = $this->generateConfig($isMerge);

        File::put($this->laravel->configPath('bless-ui.php'), $this->arrayToCode($result));
    }

    public function generateConfig(bool $isMerge, ?string $namespace = null): array
    {
        $result = [];

        $namespace ??= $this->laravel['config']->get('bless-ui.namespace');

        foreach (ListComponents::getComponents() as $item) {

            [$value, $key] = ListComponents::getComponentInfoFromFile($item);

            $configKey = ListComponents::getComponentNameFromFile(
                $item,
                namespace: false,
                ignoreIndex: false
            );

            $config = null;

            if ($isMerge) {
                $config = $this->laravel['config']->get('bless-ui.components.' . $configKey);
            }

            $itemConfig = $config ?? [
                // 'base'     => [],
                'variants' => match ($configKey) {
                    'h1', 'h2', 'h3', 'h4', 'h5', 'h6' => [
                        'normal' => 'font-normal',
                        'bold'   => 'font-bold',
                    ],
                    'button' => [
                        'normal'   => null,
                        'outlined' => 'border-2 border-current text-black',
                        'solid'    => 'bg-black text-white'
                    ],
                    'label' => [
                        'normal'   => 'block',
                        'checkbox' => 'inline-flex items-center space-x-2 cursor-pointer select-none'
                    ],
                    default => []
                }
            ];

            if ($key) {
                $result[$key][$value] = $itemConfig;
            } else {
                $result[$value] = $itemConfig;
            }
        }

        return $result;
    }

    protected function arrayToCode(array $array): string
    {

        $config = [
            'namespace'  => $this->laravel['config']->get('bless-ui.namespace'),
            'prefix'     => $this->laravel['config']->get('bless-ui.prefix'),
            'components' => $array
        ];

        $export = VarExporter::export($config);

        return "<?php \nreturn {$export};\n";
    }
}
