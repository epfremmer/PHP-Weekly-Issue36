<?php
/**
 * File NibbleEnum.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace PHPWeekly\Issue36\Enum;

use MyCLabs\Enum\Enum;
use PHPWeekly\Issue36\Entity\Nibble;

/**
 * Class NibbleEnum
 *
 * @package PHPWeekly\Issue36\Enum
 */
class NibbleEnum extends Enum
{
    // first nibble
    const atta = 'a';
    const bibbity = 'b';
    const city = 'c';
    const dickety = 'd';
    const ebbity = 'e';
    const fleventy = 'f';

    // second nibble
    const a = 'a';
    const bee = 'b';
    const cee = 'c';
    const dee = 'd';
    const e = 'e';
    const eff = 'f';

    /**
     * Return phonetic nibble value
     *
     * Due to multiple possible constants based on nibble position (first, second)
     * this method should be used in favor of the default search method
     *
     * @param Nibble $nibble
     * @param bool $isFirst
     * @return string
     */
    public static function find(Nibble $nibble, $isFirst)
    {
        $keys = array_keys(static::toArray(), $nibble->getValue(), true);

        return $isFirst ? $keys[0] : $keys[1];
    }
}
