<?php

namespace Umbrella\SimpleReport\Renderer;

use Umbrella\SimpleReport\BaseRenderer;

/**
 * Description of HTMLRenderer
 *
 * @author kelsoncm <falecom@kelsoncm.com>
 */
class HtmlRenderer extends BaseRenderer
{

    public function getOption($optionName)
    {
        return parent::getOption("htmlrenderer.{$optionName}");
    }

    public function render()
    {
        $this->stringBuffer = '';
        $this->renderTable();
    }

    protected function renderTable()
    {
        $this->doWriteTableStart();
        $this->renderTableHeader();
        $this->renderTableBody();
        $this->doWriteTableEnd();
    }

    protected function renderTableHeader()
    {
        $this->doWriteTableHeaderStart();
        $this->doWriteTableHeaderRowStart();
        foreach ($this->fieldset as $value) {
            $this->doWriteTableHeaderDataStart();
            $this->write($value->getFieldCaption());
            $this->doWriteTableHeaderDataEnd();
        }
        $this->doWriteTableHeaderRowEnd();
        $this->doWriteTableHeaderEnd();
    }

    protected function renderTableBody()
    {
        $this->doWriteTableBodyStart();
        $this->renderTableBodyRows();
        $this->doWriteTableBodyEnd();
    }

    protected function renderTableBodyRows()
    {
        for ($this->datasource->rewind(); $this->datasource->valid(); $this->datasource->next()) {
            $this->doWriteTableBodyRowStart();
            $this->renderTableBodyFields();
            $this->doWriteTableBodyRowEnd();
        }
    }

    protected function renderTableBodyFields()
    {
        foreach ($this->fieldset as $fieldDescription) {
            $this->doWriteTableBodyDataStart();
            $this->write($this->getValue($this->datasource, $fieldDescription));
            $this->doWriteTableBodyDataEnd();
        }
    }

    protected function renderTableFooter()
    {
        $this->doWriteTableFooterStart();
        $this->doWriteTableFooterRowStart();
        $count = count(fieldset);

        for ($i = 0; $i < $count; $i++) {
            $this->doWriteTableFooterDataStart();
            $this->write('&nbsp;');
            $this->doWriteTableFooterDataEnd();
        }
        $this->doWriteTableFooterRowEnd();
        $this->doWriteTableFooterEnd();
    }

    protected function doWriteTableStart()
    {
        $this->write($this->getOption('table.start'));
    }

    protected function doWriteTableHeaderStart()
    {
        $this->write($this->getOption('table.head.start'));
    }

    protected function doWriteTableHeaderRowStart()
    {
        $this->write($this->getOption('table.head.row.start'));
    }

    protected function doWriteTableHeaderDataStart()
    {
        $this->write($this->getOption('table.head.data.start'));
    }

    protected function doWriteTableHeaderDataEnd()
    {
        $this->write($this->getOption('table.head.data.end'));
    }

    protected function doWriteTableHeaderRowEnd()
    {
        $this->write($this->getOption('table.head.row.end'));
    }

    protected function doWriteTableHeaderEnd()
    {
        $this->write($this->getOption('table.head.end'));
    }

    protected function doWriteTableBodyStart()
    {
        $this->write($this->getOption('table.body.start'));
    }

    protected function doWriteTableBodyRowStart()
    {
        $this->write($this->getOption('table.body.row.start'));
    }

    protected function doWriteTableBodyDataStart()
    {
        $this->write($this->getOption('table.body.data.start'));
    }

    protected function doWriteTableBodyDataEnd()
    {
        $this->write($this->getOption('table.body.data.end'));
    }

    protected function doWriteTableBodyRowEnd()
    {
        $this->write($this->getOption('table.body.row.end'));
    }

    protected function doWriteTableBodyEnd()
    {
        $this->write($this->getOption('table.body.end'));
    }

    protected function doWriteTableFooterStart()
    {
        $this->write($this->getOption('table.footer.start'));
    }

    protected function doWriteTableFooterRowStart()
    {
        $this->write($this->getOption('table.footer.row.start'));
    }

    protected function doWriteTableFooterDataStart()
    {
        $this->write($this->getOption('table.footer.data.start'));
    }

    protected function doWriteTableFooterDataEnd()
    {
        $this->write($this->getOption('table.footer.data.end'));
    }

    protected function doWriteTableFooterRowEnd()
    {
        $this->write($this->getOption('table.footer.row.end'));
    }

    protected function doWriteTableFooterEnd()
    {
        $this->write($this->getOption('table.footer.end'));
    }

    protected function doWriteTableEnd()
    {
        $this->write($this->getOption('table.end'));
    }

}
