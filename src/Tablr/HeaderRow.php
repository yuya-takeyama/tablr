<?php
class Tablr_HeaderRow extends Tablr_Row
{
    public function isHeader()
    {
        return true;
    }

    public function isBody()
    {
        return false;
    }
}
