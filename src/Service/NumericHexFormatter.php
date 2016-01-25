<?php
/**
 * File NibbleFormatter.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace PHPWeekly\Issue36\Service;

use PHPWeekly\Issue36\Entity\HexValueInterface;

/**
 * Class NumericHexFormatter
 *
 * @package PHPWeekly\Issue36\Service
 */
class NumericHexFormatter
{
    use Traits\SingletonTrait;

    /**
     * @var \NumberFormatter
     */
    private $formatter;

    /**
     * Return number formatter
     *
     * @return \NumberFormatter
     */
    private function getFormatter()
    {
        if (!$this->formatter) {
            $this->formatter = new \NumberFormatter('en_us', \NumberFormatter::SPELLOUT);
        }

        return $this->formatter;
    }

    /**
     * Format non-zero numeric hes values to phonetic
     * string representation
     *
     * @param HexValueInterface $hex
     * @return string
     */
    public function format(HexValueInterface $hex)
    {
        if ($hex->isZero()) {
            return '';
        }

        return $this->getFormatter()->format($hex->getValue());
    }
}
