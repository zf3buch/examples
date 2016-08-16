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
 * Class Book
 *
 * @package Book
 */
interface BookInterface
{
    /**
     * @param $page
     */
    public function addPage($page);
}
