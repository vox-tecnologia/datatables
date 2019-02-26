<?php

namespace Tests\Datatable;

use Datatable\Config;

abstract class DatatablesTestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Config
     */
    protected $config;
    const DISPLAY_LENGHT = 10;

    protected function setUp()
    {
        date_default_timezone_set('America/Recife');
        $this->config = new Config();
        $this->config->setClass("display")
            ->setDisplayLength(static::DISPLAY_LENGHT)
            ->setIsPaginationEnabled(true)
            ->setIsLengthChangeEnabled(true)
            ->setIsFilterEnabled(true)
            ->setIsInfoEnabled(true)
            ->setIsSortEnabled(true)
            ->setIsAutoWidthEnabled(true)
            ->setIsScrollCollapseEnabled(false)
            ->setPaginationType(Config::PAGINATION_TYPE_FULL_NUMBERS)
            ->setIsJQueryUIEnabled(false)
            ->setIsServerSideEnabled(true)
            ->setAjaxSource('/list');

        $_GET['iDisplayLength'] = 10;
        $_GET['iDisplayStart'] = 0;
        $_GET['sEcho'] = 1;
        $_GET['sSearch'] = 'test';
    }
}
