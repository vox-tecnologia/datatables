<?php

namespace Datatable;

use Collections\Map;

/**
 * Represents datatable request
 * @author Ítalo Lelis de Vietro <italolelis@gmail.com>
 */
class Request
{
    /**
     * The current start position
     * @var integer
     */
    protected $displayStart;

    /**
     * The current display length
     * @var integer
     */
    protected $displayLength;

    /**
     * Array of current sort column indexes and directions
     *
     * @var array
     */
    protected $sortColumns;
    /**
     * The search string
     * @var string
     */
    protected $search;

    /**
     * The 'sEcho' value that was passed in
     * @var integer
     */
    protected $echo;

    public function setDisplayStart($displayStart)
    {
        $this->displayStart = $displayStart;
    }

    public function getDisplayStart()
    {
        return $this->displayStart;
    }

    public function setDisplayLength($displayLength)
    {
        $this->displayLength = $displayLength;
    }

    public function getDisplayLength()
    {
        return $this->displayLength;
    }

    /**
     * Get the first sort column index
     *
     * This method always returns the first column
     * index of the current sort column and should
     * be used when you only want to sort against one
     * column. Otherwise, you should use getSortColumns()
     * to get all of the sort column indexes and directions.
     *
     * @return integer
     */
    public function getSortColumnIndex()
    {
        $keys = array_keys($this->sortColumns);
        return $keys[0];
    }

    /**
     * Get the first sort column direction
     *
     * This method always returns the first column
     * sort direction of the current sort column and should
     * be used when you only want to sort against one
     * column. Otherwise, you should use getSortColumns()
     * to get all of the sort column indexes and directions.
     *
     * @return string
     */
    public function getSortDirection()
    {
        $values = array_values($this->sortColumns);
        return $values[0];
    }

    /**
     * Get all of the current sort columns
     *
     * This method will return an array containing
     * the column index as the key, and the sort
     * direction as the value.
     *
     * Example:
     *   array(2 => 'asc', 3 => 'desc')
     *
     * @return array
     */
    public function getSortColumns()
    {
        return $this->sortColumns;
    }

    public function setSortColumns($sortColumns)
    {
        $this->sortColumns = $sortColumns;
    }

    public function setSearch($search)
    {
        $this->search = $search;
    }

    public function getSearch()
    {
        return $this->search;
    }

    public function hasSearch()
    {
        return !(is_null($this->search) || $this->search == '');
    }

    public function setEcho($echo)
    {
        $this->echo = $echo;
    }

    public function getEcho()
    {
        return $this->echo;
    }

    /**
     * Hydrate the current object from a $_GET, $_POST, or $_REQUEST array
     *
     * @param Map $request
     * @return $this
     */
    public function createFromCollection(Map $request)
    {
        $this->setDisplayLength($request->get('iDisplayLength'));
        $this->setDisplayStart($request->get('iDisplayStart'));
        $this->setEcho($request->get('sEcho'));
        $this->setSearch($request->get('sSearch'));

        $num = $request->get('iSortingCols');

        $sortCols = array();

        for ($x = 0; $x < $num; $x++) {
            $sortCols[$request->get('iSortCol_' . $x)] = $request->get('sSortDir_' . $x);
        }

        $this->setSortColumns($sortCols);

        return $this;
    }

    /**
     * Hydrate the current object from a $_GET, $_POST, or $_REQUEST array
     * @return $this
     */
    public static function createFromGlobals()
    {
        $request = new static();
        $data = new Map($_GET);
        $data->addAll($_POST);

        return $request->createFromCollection($data);
    }
}
