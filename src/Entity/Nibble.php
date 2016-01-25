<?php
/**
 * File Nibble.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace PHPWeekly\Issue36\Entity;

use PHPWeekly\Issue36\Context\HexFormatContext;
use PHPWeekly\Issue36\Enum\NibbleEnum;
use PHPWeekly\Issue36\Service\NumericHexFormatter;

/**
 * Class Nibble
 *
 * @package PHPWeekly\Issue36\Entity
 */
class Nibble implements HexValueInterface
{
    /**
     * @var string
     */
    private $value;

    /**
     * Nibble constructor
     *
     * @param string $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * {@inheritdoc}
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * {@inheritdoc}
     */
    public function isZero()
    {
        return !$this->value || (string) $this->value === '0';
    }

    /**
     * {@inheritdoc}
     */
    public function isNumeric()
    {
        return is_numeric($this->value);
    }

    /**
     * {@inheritdoc}
     */
    public function toPhonetic(HexFormatContext $context)
    {
        $context->setCurrentNibble($this);

        if ($this->isNumeric()) {
            return NumericHexFormatter::getInstance()->format($this);
        }

        return NibbleEnum::find($this, $context->isFirstNibble());
    }

    /**
     * Return raw nibble hex string
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->value;
    }
}
