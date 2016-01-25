<?php
/**
 * File ByteJoiner.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace PHPWeekly\Issue36\Service;

use PHPWeekly\Issue36\Context\HexFormatContext;
use PHPWeekly\Issue36\Entity\NullNibble;

/**
 * Class ByteJoiner
 *
 * @package PHPWeekly\Issue36\Service
 */
class ByteJoiner
{
    use Traits\SingletonTrait;

    /**
     * Return the byte join string based on the current format context
     *
     * This is used to handle the odd case where only sibling bytes may be separated by
     * an ordinal value, as well as, open ended bytes are joined with the ordinal value by a hyphen
     *
     * Open ended bytes include:
     *  - Bytes that only contain one nibble
     *  - Bytes that start with but do not end with a non-zero nibble (e.g. f0, 20)
     *
     * @param HexFormatContext $context
     * @return string
     */
    public function join(HexFormatContext $context)
    {
        if ($this->isFirstByte($context)) {
            return '';
        }

        $ordinal = $context->getCurrentOrdinal();

        if ($this->isOpenEndedByte($context)) {
            return sprintf('-%s', $ordinal);
        }

        return sprintf(' %s', $ordinal);
    }

    /**
     * Test if the current context is for the first hex byte being formated
     *
     * @param HexFormatContext $context
     * @return bool
     */
    private function isFirstByte(HexFormatContext $context)
    {
        $hex = $context->getContext();

        return $hex->getBytes()->count() <= 1
            || $hex->getBytes()->first() === $context->getCurrentByte();
    }

    /**
     * Test if current byte context open ended
     *
     * @param HexFormatContext $context
     * @return bool
     */
    private function isOpenEndedByte(HexFormatContext $context)
    {
        return $context->getCurrentByte()->getSecondNibble() instanceof NullNibble
            || $context->getCurrentByte()->getSecondNibble()->isZero();
    }
}
