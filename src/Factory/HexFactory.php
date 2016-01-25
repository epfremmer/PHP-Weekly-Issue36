<?php
/**
 * File HexFactory.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace PHPWeekly\Issue36\Factory;

use PHPWeekly\Issue36\Entity\Hex;

/**
 * Class HexFactory
 *
 * @package PHPWeekly\Issue36\Factory
 */
class HexFactory
{
    /**
     * @var ByteFactory
     */
    private $byteFactory;

    /**
     * HexFactory constructor
     */
    public function __construct()
    {
        $this->byteFactory = new ByteFactory();
    }

    /**
     * Return a new Hex entity
     *
     * @param string $hex
     * @return Hex
     * @throws \InvalidArgumentException
     */
    public function make($hex)
    {
        $value = $this->normalize($hex);

        if (strpos($hex, Hex::PREFIX) !== 0 || !ctype_xdigit($value)) {
            throw new \InvalidArgumentException(sprintf('Invalid hex value provided. Got "%s"', $hex));
        }

        $bytes = array_map('strrev', str_split(strrev($value), 2));

        return new Hex($value, array_map([$this->byteFactory, 'make'], $bytes));
    }

    /**
     * Return a normalized hex value
     *
     * @param string $hex
     * @return string
     */
    private function normalize($hex)
    {
        return strtolower(ltrim($hex, Hex::PREFIX));
    }
}
