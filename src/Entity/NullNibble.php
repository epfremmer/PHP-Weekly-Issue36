<?php
/**
 * File NullNibble.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace PHPWeekly\Issue36\Entity;

use PHPWeekly\Issue36\Context\HexFormatContext;

/**
 * Class NullNibble
 *
 * @package PHPWeekly\Issue36\Entity
 */
class NullNibble extends Nibble
{
    /**
     * NullNibble constructor
     *
     * Override default nibble constructor
     */
    public function __construct() { /* empty */ }

    /**
     * Return empty string for null nibbles
     *
     * @param HexFormatContext $context
     * @return string
     */
    public function toPhonetic(HexFormatContext $context)
    {
        $context->setCurrentNibble($this);

        return '';
    }
}
