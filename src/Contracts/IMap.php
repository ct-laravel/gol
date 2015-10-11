<?php namespace CTLaravel\GoL\Contracts;

/**
 * Interface IMap
 * @package CTLaravel\GoL\Contracts
 */
interface IMap
{
    /**
     * Method should count neighbours that meet the Cell State criteria.
     *
     * @param IPosition $position
     * @param           $state
     *
     * @return int
     */
    public function countNeighbours(IPosition $position, $state);
}
