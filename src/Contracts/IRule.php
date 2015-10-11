<?php namespace CTLaravel\GoL\Contracts;

/**
 * Interface IRule
 * @package CTLaravel\GoL\Contracts
 */
interface IRule
{
    /**
     * Method should determine the fate of a cell based on its neighbours.
     *
     * @param ICell $cell
     * @param int   $countNeighbours
     *
     * @return mixed
     */
    public function fate(ICell $cell, $countNeighbours);
}