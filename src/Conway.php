<?php namespace CTLaravel\GoL;

use CTLaravel\GoL\Contracts\ICell;
use CTLaravel\GoL\Contracts\IRule;

class Conway implements IRule
{
    private $rules = [
        Cell::ALIVE => [
            /**
             * Under Populated
             */
            0 => Cell::DEAD, 1 => Cell::DEAD,
            /**
             * Next Generation
             */
            2 => Cell::ALIVE, 3 => Cell::ALIVE,
            /**
             * Over populated
             */
            4 => Cell::DEAD, 5 => Cell::DEAD, 6 => Cell::DEAD, 7 => Cell::DEAD, 8 => Cell::DEAD,
        ],
        Cell::DEAD  => [
            /**
             * Revived
             */
            3 => Cell::ALIVE,
            /**
             * Wilderness
             */
            0 => Cell::DEAD, 1 => Cell::DEAD, 2 => Cell::DEAD, 4 => Cell::DEAD, 5 => Cell::DEAD, 6 => Cell::DEAD, 7 => Cell::DEAD, 8 => Cell::DEAD,
        ],
    ];

    /**
     * @param ICell $cell
     *
     * @param int   $neighbours
     *
     * @return mixed
     */
    public function fate(ICell $cell, $neighbours)
    {
        return $this->rules[$cell->state()][$neighbours];
    }

}