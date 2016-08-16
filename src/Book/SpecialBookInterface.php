<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

namespace Book;

/**
 * Class SpecialBook
 *
 * @package Book
 */
interface SpecialBookInterface extends BookInterface
{
    /**
     * @return array
     */
    public function summary();
}
