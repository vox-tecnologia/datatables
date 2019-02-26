<?php

namespace Datatable;

use Collections\CollectionInterface;
use Collections\Map;
use Collections\Vector;

/**
 * Represents the datatables configuration
 * @author Ítalo Lelis de Vietro <italolelis@gmail.com>
 */
class Config
{
    /**
     * The possible pagination types
     */
    const PAGINATION_TYPE_FULL_NUMBERS = 'full_numbers';
    const PAGINATION_TYPE_TWO_BUTTON = 'two_button';
    /**
     * @var string
     */
    protected $tableId = 'datatable';

    /**
     * The collection of columns
     * @var CollectionInterface
     */
    protected $columns;

    /**
     * The default display length of the table
     * @var integer
     */
    protected $displayLength = 10;

    /**
     * The AJAX source URL
     * @var string
     */
    protected $ajaxSource;
    /**
     * @var bool
     */
    protected $isProcessingEnabled = true;
    /**
     * @var bool
     */
    protected $isServerSideEnabled = false;
    /**
     * @var bool
     */
    protected $isPaginationEnabled = false;
    /**
     * @var bool
     */
    protected $isLengthChangeEnabled = false;
    /**
     * @var bool
     */
    protected $isFilterEnabled = false;
    /**
     * @var bool
     */
    protected $isInfoEnabled = false;
    /**
     * @var bool
     */
    protected $isSortEnabled = true;
    /**
     * @var bool
     */
    protected $isJQueryUIEnabled = true;
    /**
     * @var bool
     */
    protected $isAutoWidthEnabled = true;
    /**
     * @var bool
     */
    protected $isScrollCollapseEnabled = false;
    /**
     * @var bool
     */
    protected $isScrollInfiniteEnabled = false;
    /**
     * @var
     */
    protected $class;

    /**
     * @var Vector
     */
    protected $lengthMenu;
    protected $scrollX;
    protected $scrollY;
    protected $scrollLoadGap;
    protected $paginationType = self::PAGINATION_TYPE_FULL_NUMBERS;
    /**
     * @var LanguageConfig
     */
    protected $languageConfig;
    protected $loadingHtml = '<p>loading data</p>';
    protected $cookieDuration = 7200;
    protected $isSaveStateEnabled = false;
    protected $cookiePrefix;
    protected $stripClasses = ['odd', 'even'];

    /**
     * see http://datatables.net/usage/options#sDom
     *
     * @var string
     */
    protected $dom;

    /**
     * The maximum number of rows to render in HTML
     * when table is set to use static (non-ajax) data
     *
     * @var integer
     */
    protected $staticMaxLength = 100;

    /**
     * Config constructor.
     */
    public function __construct()
    {
        $this->columns = new Map();
        $this->lengthMenu = new Vector([10 => 10, 25 => 25, 50 => 50, 100 => 100]);
    }

    /**
     * @return string
     */
    public function getTableId()
    {
        return $this->tableId;
    }

    /**
     * @param string $tableId
     * @return $this
     */
    public function setTableId(string $tableId)
    {
        $this->tableId = $tableId;

        return $this;
    }

    /**
     * @return CollectionInterface
     */
    public function getColumns()
    {
        return $this->columns;
    }

    /**
     * @param $columns
     * @return $this
     */
    public function setColumns($columns)
    {
        $this->columns = $columns;

        return $this;
    }

    /**
     * @return int
     */
    public function getDisplayLength()
    {
        return $this->displayLength;
    }

    /**
     * @param $displayLength
     * @return $this
     */
    public function setDisplayLength($displayLength)
    {
        $this->displayLength = $displayLength;

        return $this;
    }

    /**
     * @return string
     */
    public function getAjaxSource()
    {
        return $this->ajaxSource;
    }

    /**
     * @param string $ajaxSource
     * @return $this
     */
    public function setAjaxSource(string $ajaxSource)
    {
        $this->ajaxSource = $ajaxSource;

        return $this;
    }

    /**
     * @return bool
     */
    public function isProcessingEnabled()
    {
        return $this->isProcessingEnabled;
    }

    /**
     * @param bool $isProcessingEnabled
     * @return $this
     */
    public function setIsProcessingEnabled(bool $isProcessingEnabled)
    {
        $this->isProcessingEnabled = $isProcessingEnabled;

        return $this;
    }

    /**
     * @return bool
     */
    public function isServerSideEnabled()
    {
        return $this->isServerSideEnabled;
    }

    /**
     * @param bool $isServerSideEnabled
     * @return $this
     */
    public function setIsServerSideEnabled(bool $isServerSideEnabled)
    {
        $this->isServerSideEnabled = $isServerSideEnabled;

        return $this;
    }

    /**
     * @return bool
     */
    public function isPaginationEnabled()
    {
        return $this->isPaginationEnabled;
    }

    /**
     * @param bool $isPaginationEnabled
     * @return $this
     */
    public function setIsPaginationEnabled(bool $isPaginationEnabled)
    {
        $this->isPaginationEnabled = $isPaginationEnabled;

        return $this;
    }

    /**
     * @return bool
     */
    public function isLengthChangeEnabled()
    {
        return $this->isLengthChangeEnabled;
    }

    /**
     * @param bool $isLengthChangeEnabled
     * @return $this
     */
    public function setIsLengthChangeEnabled(bool $isLengthChangeEnabled)
    {
        $this->isLengthChangeEnabled = $isLengthChangeEnabled;

        return $this;
    }

    /**
     * @return bool
     */
    public function isFilterEnabled()
    {
        return $this->isFilterEnabled;
    }

    /**
     * @param bool $isFilterEnabled
     * @return $this
     */
    public function setIsFilterEnabled(bool $isFilterEnabled)
    {
        $this->isFilterEnabled = $isFilterEnabled;

        return $this;
    }

    /**
     * @return bool
     */
    public function isInfoEnabled()
    {
        return $this->isInfoEnabled;
    }

    /**
     * @param bool $isInfoEnabled
     * @return $this
     */
    public function setIsInfoEnabled(bool $isInfoEnabled)
    {
        $this->isInfoEnabled = $isInfoEnabled;

        return $this;
    }

    /**
     * @return bool
     */
    public function isSortEnabled()
    {
        return $this->isSortEnabled;
    }

    /**
     * @param bool $isSortEnabled
     * @return $this
     */
    public function setIsSortEnabled(bool $isSortEnabled)
    {
        $this->isSortEnabled = $isSortEnabled;

        return $this;
    }

    /**
     * @return bool
     */
    public function isJQueryUIEnabled()
    {
        return $this->isJQueryUIEnabled;
    }

    /**
     * @param bool $isJQueryUIEnabled
     * @return $this
     */
    public function setIsJQueryUIEnabled(bool $isJQueryUIEnabled)
    {
        $this->isJQueryUIEnabled = $isJQueryUIEnabled;

        return $this;
    }

    /**
     * @return bool
     */
    public function isAutoWidthEnabled()
    {
        return $this->isAutoWidthEnabled;
    }

    /**
     * @param bool $isAutoWidthEnabled
     * @return $this
     */
    public function setIsAutoWidthEnabled(bool $isAutoWidthEnabled)
    {
        $this->isAutoWidthEnabled = $isAutoWidthEnabled;

        return $this;
    }

    /**
     * @return bool
     */
    public function isScrollCollapseEnabled()
    {
        return $this->isScrollCollapseEnabled;
    }

    /**
     * @param bool $isScrollCollapseEnabled
     * @return $this
     */
    public function setIsScrollCollapseEnabled(bool $isScrollCollapseEnabled)
    {
        $this->isScrollCollapseEnabled = $isScrollCollapseEnabled;

        return $this;
    }

    /**
     * @return bool
     */
    public function isScrollInfiniteEnabled()
    {
        return $this->isScrollInfiniteEnabled;
    }

    /**
     * @param bool $isScrollInfiniteEnabled
     * @return $this
     */
    public function setIsScrollInfiniteEnabled(bool $isScrollInfiniteEnabled)
    {
        $this->isScrollInfiniteEnabled = $isScrollInfiniteEnabled;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @param $class
     * @return $this
     */
    public function setClass($class)
    {
        $this->class = $class;

        return $this;
    }

    /**
     * @return Vector
     */
    public function getLengthMenu()
    {
        return $this->lengthMenu;
    }

    /**
     * @param Vector $lengthMenu
     * @return $this
     */
    public function setLengthMenu(Vector $lengthMenu)
    {
        $this->lengthMenu = $lengthMenu;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getScrollX()
    {
        return $this->scrollX;
    }

    /**
     * @param $scrollX
     * @return $this
     */
    public function setScrollX($scrollX)
    {
        $this->scrollX = $scrollX;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getScrollY()
    {
        return $this->scrollY;
    }

    /**
     * @param $scrollY
     * @return $this
     */
    public function setScrollY($scrollY)
    {
        $this->scrollY = $scrollY;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getScrollLoadGap()
    {
        return $this->scrollLoadGap;
    }

    /**
     * @param $scrollLoadGap
     * @return $this
     */
    public function setScrollLoadGap($scrollLoadGap)
    {
        $this->scrollLoadGap = $scrollLoadGap;

        return $this;
    }

    /**
     * @return string
     */
    public function getPaginationType()
    {
        return $this->paginationType;
    }

    /**
     * @param string $paginationType
     * @return $this
     */
    public function setPaginationType(string $paginationType)
    {
        $this->paginationType = $paginationType;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLanguageConfig()
    {
        return $this->languageConfig;
    }

    /**
     * @param $languageConfig
     * @return $this
     */
    public function setLanguageConfig($languageConfig)
    {
        $this->languageConfig = $languageConfig;

        return $this;
    }

    /**
     * @return string
     */
    public function getLoadingHtml()
    {
        return $this->loadingHtml;
    }

    /**
     * @param string $loadingHtml
     * @return $this
     */
    public function setLoadingHtml(string $loadingHtml)
    {
        $this->loadingHtml = $loadingHtml;

        return $this;
    }

    /**
     * @return int
     */
    public function getCookieDuration()
    {
        return $this->cookieDuration;
    }

    /**
     * @param int $cookieDuration
     * @return $this
     */
    public function setCookieDuration(int $cookieDuration)
    {
        $this->cookieDuration = $cookieDuration;

        return $this;
    }

    /**
     * @return bool
     */
    public function isSaveStateEnabled()
    {
        return $this->isSaveStateEnabled;
    }

    /**
     * @param bool $isSaveStateEnabled
     * @return $this
     */
    public function setIsSaveStateEnabled(bool $isSaveStateEnabled)
    {
        $this->isSaveStateEnabled = $isSaveStateEnabled;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCookiePrefix()
    {
        return $this->cookiePrefix;
    }

    /**
     * @param $cookiePrefix
     * @return $this
     */
    public function setCookiePrefix($cookiePrefix)
    {
        $this->cookiePrefix = $cookiePrefix;

        return $this;
    }

    /**
     * @return array
     */
    public function getStripClasses()
    {
        return $this->stripClasses;
    }

    /**
     * @param array $stripClasses
     * @return $this
     */
    public function setStripClasses(array $stripClasses)
    {
        $this->stripClasses = $stripClasses;

        return $this;
    }

    /**
     * @return string
     */
    public function getDom()
    {
        return $this->dom;
    }

    /**
     * @param string $dom
     * @return $this
     */
    public function setDom(string $dom)
    {
        $this->dom = $dom;

        return $this;
    }
}
