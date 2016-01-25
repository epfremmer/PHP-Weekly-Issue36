<?php
/**
 * File HexInterface.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace PHPWeekly\Issue36\Entity;

use PHPWeekly\Issue36\Context\HexFormatContext;

/**
 * Interface HexValueInterface
 *
 * @package PHPWeekly\Issue36\Entity
 */
interface HexValueInterface
{
    /**
     * Test if the hex value only contains zero values
     *
     * @return bool
     */
    public function isZero();

    /**
     * Test if the hex value contains only numeric values
     *
     * @return bool
     */
    public function isNumeric();

    /**
     * Return the raw hex value
     *
     * @return number|string
     */
    public function getValue();

    /**
     * Convert the hex value to a phonetic string
     *
     * @param HexFormatContext $context
     * @return string
     */
    public function toPhonetic(HexFormatContext $context);
}
