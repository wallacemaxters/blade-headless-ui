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

        $result = [];

        foreach (ListComponents::getComponents() as $item) {

            [$value, $key] = ListComponents::getComponentInfoFromFile($item);

            $configKey = ListComponents::getComponentNameFromFile(
                $item,
                namespace: false,
                ignoreIndex: false
            );

            $config = null;

            if ($isMerge) {
                $config = config('bless-ui.components.' . $configKey);
            }

            $itemConfig = $config ?? [
                'base'   => $key ? sprintf('ui-%s-%s', $key, $value) : 'ui-' . $value,
                'themes' => [
                    'normal' => []
                ]
            ];

            if ($key) {
                $result[$key][$value] = $itemConfig;
            } else {
                $result[$value] = $itemConfig;
            }
        }

        File::put(config_path('bless-ui.php'), $this->arrayToCode($result));
    }

    protected function arrayToCode(array $array): string
    {
        $config = [
            'namespace'  => config('bless-ui.namespace'),
            'components' => $array
        ];

        $export = VarExporter::export($config);

        return "<?php \nreturn {$export};\n";
    }
}
