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
class Book implements BookInterface
{
    /**
     * @var array
     */
    protected $pages;

    /**
     *
     */
    private function initPages()
    {
        $this->pages = [];
    }

    /**
     * Book constructor.
     */
    final public function __construct()
    {
        $this->initPages();
    }

    /**
     * @param $page
     */
    public function addPage($page)
    {
        $this->pages[] = $page;
    }
}
