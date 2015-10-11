<?php namespace CTLaravel\GoL\Contracts;

/**
 * Interface ICell
 * @package CTLaravel\GoL\Contracts
 */
interface ICell
{
    /**
     * Method should return state of cell
     *
     * @return mixed the current state of a cell
     */
    public function state();
}