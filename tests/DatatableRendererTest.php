<?php

namespace Tests\Datatable;

use Datatable\Column;
use Datatable\Datatable;
use Doctrine\Common\Collections\ArrayCollection;

class DatatableRendererTest extends DatatablesTestCase
{
    public function testRenderJS()
    {
        $js = '<script type="text/javascript">$(document).ready(function(){var datatable = $(\'#datatable\').dataTable({"bPaginate":true,"bLengthChange":true,"bProcessing":true,"bFilter":true,"bSort":true,"bInfo":true,"bAutoWidth":true,"iDisplayLength":10,"sPaginationType":"full_numbers","iCookieDuration":7200,"asStripClasses":["odd","even"],"aaSorting":{},"aLengthMenu":{},"bServerSide":true,"sAjaxSource":"\/list"});});</script>';
        $datatable = new Datatable($this->config);
        $this->assertEquals($js, $datatable->getRenderer()->renderJs());
    }

    public function testRenderTableWithAjax()
    {
        $datatable = new Datatable($this->config);
        $table = '<table cellspacing="0" class="display" id="datatable"><thead><tr></tr></thead><tbody><tr><td class="dataTables_empty"><p>loading data</p></td></tr></tbody></table><!-- Built with italolelis/datatables -->';
        $this->assertEquals($table, $datatable->getRenderer()->render());
    }

    public function testRenderTableWithStaticData()
    {
        $columns = new ArrayCollection();
        $columns->add((new Column())->setName('testHeader')->setTitle('Header'));
        $this->config->setServerSideEnabled(false)
            ->setColumns($columns);
        $datatable = new Datatable($this->config);
        $table = '<table cellspacing="0" class="display" id="datatable"><thead><tr><th>Header</th></tr></thead><tbody><tr><td>test 1</td></tr><tr><td>test 2</td></tr></tbody></table><!-- Built with italolelis/datatables -->';

        $data = [
            ['testHeader' => 'test 1'],
            ['testHeader' => 'test 2']
        ];
        $this->assertEquals($table, $datatable->getRenderer()->render($data));
    }
}
