<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace Crayxn\HyperfXdebug;

use Crayxn\HyperfXdebug\Command\XdebugCommand;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => [
            ],
            'commands' => [
                XdebugCommand::class
            ],
            'annotations' => [
                'scan' => [
                    'paths' => [
                        __DIR__,
                    ],
                ],
            ],
            'publish' => [
                [
                    'id' => 'config',
                    'description' => 'The config for xdebug.',
                    'source' => __DIR__ . '/../publish/xdebug.php',
                    'destination' => BASE_PATH . '/config/autoload/xdebug.php',
                ],
            ],
        ];
    }
}
