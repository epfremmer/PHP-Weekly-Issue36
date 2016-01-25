<?php
/**
 * File NibbleFactory.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace PHPWeekly\Issue36\Factory;

use PHPWeekly\Issue36\Entity\Nibble;
use PHPWeekly\Issue36\Entity\NullNibble;

/**
 * Class NibbleFactory
 *
 * @package PHPWeekly\Issue36\Factory
 */
class NibbleFactory
{
    /**
     * Return new Nibble entity
     *
     * @param string $nibble
     * @return Nibble|NullNibble
     */
    public function make($nibble = '')
    {
        return $nibble === '' ? new NullNibble() : new Nibble($nibble);
    }
}
