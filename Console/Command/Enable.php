<?php
/**
 * Copyright © Magefan (support@magefan.com). All rights reserved.
 * Please visit Magefan.com for license details (https://magefan.com/end-user-license-agreement).
 */

declare(strict_types=1);

namespace Magefan\MsiDisabler\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class Enable extends Command
{

    /**
     * {@inheritdoc}
     */
    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ) {

        $changed = 0;
        // Load and modify the existing configuration data
        $currentConfig = include BP . '/app/etc/config.php';
        foreach ($currentConfig['modules'] as $moduleName => $status) {
            if (0 === strpos($moduleName, 'Magento_Inventory') && !$status) {
                $currentConfig['modules'][$moduleName] = 1;
                $output->writeln("Enabled  " . $moduleName);
                $changed++;
            }

            if (0 === strpos($moduleName, 'Magefan_MsiDisabler') && $status) {
                $currentConfig['modules'][$moduleName] = 0;
                $output->writeln("Disabled  " . $moduleName);
                $changed++;
            }
        }

        if ($changed) {
            file_put_contents(BP . '/app/etc/config.php', "<?php\nreturn " . var_export($currentConfig, true) . ";");
            $output->writeln("Please run:");
            $output->writeln("bin/magento setup:upgrade");
            $output->writeln("bin/magento setup:di:compile ");
            $output->writeln("bin/magento setup:static-content:deploy");
            $output->writeln("Go to Admin panel > Stores > Inventory > Sources > Create a new one or restore database from backup.");
        } else {
            $output->writeln("All MSI extensions already enabled");
        }

        return 0;
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->setName("magefan:msi:enable");
        $this->setDescription("Enable MSI");
        parent::configure();
    }
}

