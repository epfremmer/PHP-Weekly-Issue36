<?php
/**
 * File Application.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace PHPWeekly\Issue36;

use PHPWeekly\Issue36\Command\HexToPhoneticCommand;
use Symfony\Component\Console\Application as BaseApplication;

/**
 * Class Application
 *
 * @package PHPWeekly
 */
class Application extends BaseApplication
{
    /**
     * {@inheritdoc}
     */
    public function __construct()
    {
        parent::__construct('console', '1.0.0');

        $this->add(new HexToPhoneticCommand());
    }
}
