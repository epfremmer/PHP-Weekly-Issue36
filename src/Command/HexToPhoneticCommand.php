<?php
/**
 * File HexToPhoneticStringCommand.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace PHPWeekly\Issue36\Command;

use PHPWeekly\Issue36\Entity\Hex;
use PHPWeekly\Issue36\Factory\HexFactory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class HexToPhoneticStringCommand
 *
 * @package PHPWeekly\Command
 */
class HexToPhoneticCommand extends Command
{
    const COMMAND_NAME = 'hex:phonetic';
    const HEX_ARGUMENT = 'hex';

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        parent::configure();

        $this->setName(self::COMMAND_NAME)
            ->setDescription('Convert hexadecimal values to phonetic pronunciation')
            ->addArgument(
                self::HEX_ARGUMENT,
                InputArgument::REQUIRED,
                'Hex value to convert'
            )
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        parent::initialize($input, $output);

        $factory = new HexFactory();
        $hex = $input->getArgument(self::HEX_ARGUMENT);

        $input->setArgument(self::HEX_ARGUMENT, $factory->make($hex));
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var Hex $hex */
        $hex = $input->getArgument(self::HEX_ARGUMENT);

        $output->writeln($hex->toPhonetic());
    }
}
