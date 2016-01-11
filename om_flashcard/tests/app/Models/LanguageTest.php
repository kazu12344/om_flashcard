<?php

/**
 * Created by IntelliJ IDEA.
 * User: kazuhiro
 * Date: 9/12/15
 * Time: 8:16 AM
 */

use \App\Models\Language;

class LanguageTest extends TestCase
{
    public function testGetSelectBoxData()
    {
        // saving test values to testing_database
        factory(Language::class)->make([
            'id' => '1',
            'string' => 'English',
        ])->save();
        factory(Language::class)->make([
            'id' => '2',
            'string' => 'Japanese',
        ])->save();

        $language = new Language();
        $expected_val = ['1' => 'English', '2' => 'Japanese'];
        $result = $language->getSelectBoxData();
        $this->assertEquals($expected_val, $result);
    }
}