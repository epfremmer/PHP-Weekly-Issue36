<?php
/**
 * File HexFormatContext.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace PHPWeekly\Issue36\Context;

use PHPWeekly\Issue36\Entity\Byte;
use PHPWeekly\Issue36\Entity\Hex;
use PHPWeekly\Issue36\Entity\Nibble;
use PHPWeekly\Issue36\Entity\NullNibble;
use PHPWeekly\Issue36\Enum\OrdinalEnum;

/**
 * Class HexFormatContext
 *
 * @package PHPWeekly\Issue36\Context
 */
class HexFormatContext
{
    /**
     * @var Hex
     */
    private $context;

    /**
     * @var Byte
     */
    private $currentByte;

    /**
     * @var Nibble
     */
    private $currentNibble;

    /**
     * HexFormatContext constructor
     *
     * @param $context
     */
    public function __construct(Hex $context)
    {
        $this->context = $context;
    }

    /**
     * Return full format context
     *
     * @return Hex
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * Set current byte
     *
     * @param Byte $currentByte
     */
    public function setCurrentByte(Byte $currentByte)
    {
        $this->currentByte = $currentByte;
    }

    /**
     * Return current byte
     *
     * @return Byte
     */
    public function getCurrentByte()
    {
        return $this->currentByte;
    }

    /**
     * Set current nibble
     *
     * @param Nibble $currentNibble
     */
    public function setCurrentNibble(Nibble $currentNibble)
    {
        $this->currentNibble = $currentNibble;
    }

    /**
     * Return current nibble
     *
     * @return Nibble
     */
    public function getCurrentNibble()
    {
        return $this->currentNibble;
    }

    /**
     * Test if current context of the first nibble
     *
     * @return bool
     */
    public function isFirstNibble()
    {
        return $this->getCurrentByte()->getFirstNibble() === $this->getCurrentNibble()
            && !$this->getCurrentByte()->getSecondNibble() instanceof NullNibble;
    }

    /**
     * Return current byte ordinal for the format context
     *
     * I do not fully understand what this is doing, but I tweaked the original
     * to always return an appropriate ordinal constant compared the intermittent
     * empty values returned in the original version
     *
     * @link http://bzarg.com/js/hexnames.js
     *
     * @return string
     */
    public function getCurrentOrdinal()
    {
        $bytes = $this->context->getBytes();
        $index = $bytes->indexOf($this->currentByte);
        $ordinal = '';

        for ($j = 0; $j < 4; $j++) {
            if ($index & 1) {
                $ordinal = OrdinalEnum::search($j);
                break;
            }

            $index >>= 1;
        }

        return $ordinal;
    }
}
