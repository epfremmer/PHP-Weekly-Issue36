<?php
/**
 * File Byte.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace PHPWeekly\Issue36\Entity;

use PHPWeekly\Issue36\Context\HexFormatContext;
use PHPWeekly\Issue36\Enum\ByteEnum;
use PHPWeekly\Issue36\Service\NibbleJoiner;
use PHPWeekly\Issue36\Service\NumericHexFormatter;

/**
 * Class Byte
 *
 * @package PHPWeekly\Issue36\Entity
 */
class Byte implements HexValueInterface
{
    /**
     * @var Nibble
     */
    protected $firstNibble;

    /**
     * @var Nibble
     */
    protected $secondNibble;

    /**
     * Byte constructor
     *
     * @param Nibble $firstNibble
     * @param Nibble $secondNibble
     */
    public function __construct(Nibble $firstNibble, Nibble $secondNibble)
    {
        $this->firstNibble = $firstNibble;
        $this->secondNibble = $secondNibble;
    }

    /**
     * Return first nibble
     *
     * @return Nibble
     */
    public function getFirstNibble()
    {
        return $this->firstNibble;
    }

    /**
     * Return second nibble
     *
     * @return Nibble
     */
    public function getSecondNibble()
    {
        return $this->secondNibble;
    }

    /**
     * {@inheritdoc}
     */
    public function getValue()
    {
        return $this->firstNibble->getValue() . $this->secondNibble->getValue();
    }

    /**
     * {@inheritdoc}
     */
    public function isZero()
    {
        return (string) $this->firstNibble === '0'
            && (string) $this->secondNibble === '0';
    }

    /**
     * {@inheritdoc}
     */
    public function isNumeric()
    {
        return is_numeric((string) $this);
    }

    /**
     * Test if the byte is teen
     * (e.g. ^1[0-f]$)
     *
     * @return bool
     */
    public function isTeen()
    {
        return (string) $this->firstNibble === '1';
    }

    /**
     * {@inheritdoc}
     */
    public function toPhonetic(HexFormatContext $context)
    {
        $context->setCurrentByte($this);

        if ($this->isNumeric()) return NumericHexFormatter::getInstance()->format($this);
        if ($this->isTeen()) return ByteEnum::search((string) $this);

        $first = $this->firstNibble->toPhonetic($context);
        $second = $this->secondNibble->toPhonetic($context);
        $join = NibbleJoiner::getInstance()->join($first, $second);

        return sprintf('%s%s%s', $first, $join, $second);
    }

    /**
     * Return raw byte hex string
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getValue();
    }
}
