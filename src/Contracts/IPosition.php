<?php namespace CTLaravel\GoL\Contracts;

/**
 * Interface IPosition
 * @package CTLaravel\GoL\Contracts
 */
interface IPosition
{
    /**
     * Method should return unique hash of a position.
     *
     * @return string
     */
    public function hash();

    /**
     * Method should return a collection of neighbour positions.
     *
     * @return IPosition
     */
    public function neighbours();

}