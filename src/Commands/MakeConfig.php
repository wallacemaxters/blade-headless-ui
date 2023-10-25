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
    protected $signature = 'bless-ui:make-config {--color=blue-500}';

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
        $result = $this->generateConfig();

        File::put($this->laravel->configPath('bless-ui.php'), $this->arrayToCode($result));
    }

    public function generateConfig(?string $namespace = null): array
    {
        $result = [];

        $namespace ??= $this->laravel['config']->get('bless-ui.namespace');

        $color = $this->option('color');

        foreach (ListComponents::getComponents() as $item) {

            [$value, $key] = ListComponents::getComponentInfoFromFile($item);

            $configKey = ListComponents::getComponentNameFromFile(
                $item,
                namespace: false,
                ignoreIndex: false
            );

            $config = null;

            $itemConfig = [
                // 'base'     => [],
                'variants' => match ($configKey) {
                    'h1', 'h2', 'h3', 'h4', 'h5', 'h6' => [
                        'normal' => 'font-normal',
                        'bold'   => 'font-bold',
                    ],
                    'button' => [
                        'normal'   => $color ? "bg-{$color} text-white" : '',
                        'outlined' => $color ? "border-2 border-current font-bold text-{$color}" : null,
                    ],
                    'label' => [
                        'normal'   => 'block',
                        'checkbox' => 'inline-flex items-center space-x-2 cursor-pointer select-none'
                    ],

                    'card' => [
                        'normal' => 'bg-white',
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
