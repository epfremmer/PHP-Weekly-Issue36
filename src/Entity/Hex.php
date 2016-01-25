<?php
/**
 * File Hex.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace PHPWeekly\Issue36\Entity;

use Epfremme\Collection\Collection;
use PHPWeekly\Issue36\Context\HexFormatContext;
use PHPWeekly\Issue36\Service\ByteJoiner;

/**
 * Class Hex
 *
 * @package PHPWeekly\Issue36\Entity
 */
class Hex
{
    const PREFIX = '0x';

    /**
     * @var Collection
     */
    private $bytes;

    /**
     * Hex constructor
     *
     * @param string $value
     * @param array $bytes
     */
    public function __construct($value, array $bytes)
    {
        $this->bytes = new Collection($bytes);
    }

    /**
     * Return bytes collection
     *
     * @return Collection
     */
    public function getBytes()
    {
        return $this->bytes;
    }

    /**
     * Reduce hex bytes to normalized phonetic representation
     *
     * @return string
     */
    public function toPhonetic()
    {
        $context = new HexFormatContext($this);

        return $this->getBytes()->reduce(function($result, Byte $byte) use ($context) {
            return sprintf('%s%s %s',
                $byte->toPhonetic($context),
                ByteJoiner::getInstance()->join($context),
                $result
            );
        });
    }
}
