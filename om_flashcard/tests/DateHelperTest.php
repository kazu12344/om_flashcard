<?php

/**
 * Created by IntelliJ IDEA.
 * User: kazuhiro
 * Date: 9/12/15
 * Time: 8:16 AM
 */
class DateHelperTest extends TestCase
{
    public function testComvertDefaultDateFormat()
    {
        $date = '2015-05-20';
        $date = dateHelper::dateFormat($date);
        $this->assertEquals('2015/05/20', $date);
    }

    public function testConvertDateFormatToArgFormat()
    {
        $date = '2015-05-20';
        $format = 'Ymd';
        $date = dateHelper::dateFormat($date, $format);
        $this->assertEquals('20150520', $date);
    }

    /**
     * @expectedException Exception
     */
    public function testThrowExceptionGivenInvalidDate()
    {
        $date = 'aaaaa';
        dateHelper::dateFormat($date);
    }
}