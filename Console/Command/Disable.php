<?php
/**
 * Copyright © Magefan (support@magefan.com). All rights reserved.
 * Please visit Magefan.com for license details (https://magefan.com/end-user-license-agreement).
 */

declare(strict_types=1);

namespace Magefan\MsiDisabler\Console\Command;

use Magento\Framework\App\DeploymentConfig\FileReader;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Config\File\ConfigFilePool;
use Magento\Framework\Console\Cli;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Disable extends Command
{
    /**
     * @var DirectoryList
     */
    private $directoryList;

    /**
     * @var FileReader
     */
    private $fileReader;

    /**
     * @param DirectoryList $directoryList
     * @param FileReader $fileReader
     * @param string|null $name
     */
    public function __construct(DirectoryList $directoryList, FileReader $fileReader, $name = null)
    {
        $this->directoryList = $directoryList;
        $this->fileReader = $fileReader;
        parent::__construct($name);
    }

    /**
     * @inheritdoc
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ): int {

        $disabled = 0;
        // Load and modify the existing configuration data
        $configPath = $this->directoryList->getPath(DirectoryList::CONFIG) . '/config.php';
        $currentConfig = $this->fileReader->load(ConfigFilePool::APP_CONFIG);
        foreach ($currentConfig['modules'] as $moduleName => $status) {
            if (0 === strpos($moduleName, 'Magento_Inventory') && $status) {
                $currentConfig['modules'][$moduleName] = 0;
                $output->writeln("Disabled  " . $moduleName);
                $disabled++;
            }
        }

        if ($disabled) {
            file_put_contents($configPath, "<?php\nreturn " . var_export($currentConfig, true) . ";");
            $output->writeln("Please run:");
            $output->writeln("bin/magento setup:upgrade");
            $output->writeln("bin/magento setup:di:compile ");
            $output->writeln("bin/magento setup:static-content:deploy");
        } else {
            $output->writeln("All MSI extensions already disabled");
        }

        return Cli::RETURN_SUCCESS;
    }

    /**
     * @inheritdoc
     */
    protected function configure()
    {
        $this->setName("magefan:msi:disable");
        $this->setDescription("Disable MSI");
        parent::configure();
    }
}
