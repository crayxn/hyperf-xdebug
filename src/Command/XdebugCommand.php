<?php
declare(strict_types=1);
/**
 * @author   crayxn <https://github.com/crayxn>
 * @contact  crayxn@qq.com
 */

namespace Crayxn\HyperfXdebug\Command;

use Hyperf\Command\Command;
use Hyperf\Contract\ConfigInterface;

class XdebugCommand extends Command
{
    private array $cmd;
    private string $server_name = '';

    public function __construct(protected ConfigInterface $config)
    {
        parent::__construct('xdebug');
        //set desc
        $this->setDescription('Start Hyperf Server On Debug(xdebug) Mode.');
        //config
        $conf = $this->config->get('xdebug');
        $this->server_name = $conf['server_name'] ?? 'Unnamed';
        $this->cmd[] = $conf['bin_path'] ?? 'php';
        if (!empty($conf['xdebug'])) {
            foreach ($conf['xdebug'] as $key => $value) {
                $this->cmd[] = "-d xdebug.{$key}={$value}";
            }
        }
        $this->cmd[] = "vendor/bin/hyperf_debug start";
    }

    public function handle()
    {
        if (!function_exists('xdebug_connect_to_client')) {
            $this->output->error('Not Support Xdebug!');
        }
        $this->output->writeln('Start server on debug mode...');

        proc_open('export PHP_IDE_CONFIG=serverName=' . $this->server_name . ';' . implode(' ', $this->cmd), [
            0 => STDIN,
            1 => STDOUT,
            2 => STDERR,
        ], $pipes);

        $this->output->error('Start fail!!!');
    }
}