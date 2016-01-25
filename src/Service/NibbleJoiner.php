<?php
/**
 * File NibbleJoiner.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace PHPWeekly\Issue36\Service;

/**
 * Class NibbleJoiner
 *
 * @package PHPWeekly\Issue36\Service
 */
class NibbleJoiner
{
    use Traits\SingletonTrait;

    /**
     * Return nibble join string based on the first and second nibble value
     *
     * @param string $first
     * @param string $second
     * @return string
     */
    public function join($first, $second)
    {
        return ($first === '' || $second === '') ? '' : '-';
    }
}
