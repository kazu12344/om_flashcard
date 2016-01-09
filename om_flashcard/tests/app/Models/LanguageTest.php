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
            'code' => 'en',
            'string' => 'English',
        ])->save();
        factory(Language::class)->make([
            'code' => 'ja',
            'string' => 'Japanese',
        ])->save();

        $language = new Language();
        $expected_val = ['en' => 'English', 'ja' => 'Japanese'];
        $result = $language->getSelectBoxData();
        $this->assertEquals($expected_val, $result);
    }
}