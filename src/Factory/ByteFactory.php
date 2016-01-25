<?php
/**
 * File ByteFactory.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace PHPWeekly\Issue36\Factory;

use PHPWeekly\Issue36\Entity\Byte;

/**
 * Class ByteFactory
 *
 * @package PHPWeekly\Issue36\Factory
 */
class ByteFactory
{
    /**
     * @var NibbleFactory
     */
    private $nibbleFactory;

    /**
     * ByteFactory constructor
     */
    public function __construct()
    {
        $this->nibbleFactory = new NibbleFactory();
    }

    /**
     * Return a new Byte entity
     *
     * @param string $byte
     * @return Byte
     */
    public function make($byte)
    {
        return new Byte(
            $this->nibbleFactory->make($byte[0]),
            $this->nibbleFactory->make(@$byte[1])
        );
    }
}
