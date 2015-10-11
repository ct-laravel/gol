<?php namespace CTLaravel\GoL;

use CTLaravel\GoL\Contracts\IPosition;

class Coordinate implements IPosition
{
    public $x;
    public $y;

    /**
     * @param $x
     * @param $y
     */
    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function hash()
    {
        return $this->x . ':' . $this->y;
    }

    /**
     * @return array
     */
    public function neighbours()
    {
        return [
            $this->left($this),
            $this->right($this),
            $this->top($this),
            $this->bottom($this),
            $this->leftTop($this),
            $this->leftBotom($this),
            $this->rightTop($this),
            $this->rightBotom($this),
        ];
    }

    private function left(Coordinate $position)
    {
        return new Coordinate($position->x - 1, $position->y);
    }

    private function right($position)
    {
        return new Coordinate($position->x + 1, $position->y);
    }

    private function top($position)
    {
        return new Coordinate($position->x, $position->y - 1);
    }

    private function bottom($position)
    {
        return new Coordinate($position->x, $position->y + 1);
    }

    private function leftTop($position)
    {
        return new Coordinate($position->x - 1, $position->y - 1);
    }

    private function leftBotom($position)
    {
        return new Coordinate($position->x - 1, $position->y + 1);
    }

    private function rightTop($position)
    {
        return new Coordinate($position->x + 1, $position->y - 1);
    }

    private function rightBotom($position)
    {
        return new Coordinate($position->x + 1, $position->y + 1);
    }

}