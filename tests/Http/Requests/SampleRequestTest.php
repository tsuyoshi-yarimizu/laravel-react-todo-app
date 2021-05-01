<?php

namespace Tests\Http\Requests;

use App\Http\Requests\SampleRequest;
use Tests\TestCase;

class SampleRequestTest extends TestCase
{

    /**
     * @param $expected
     * @param $data
     * @dataProvider valDataProvider
     * @covers \App\Http\Requests\SampleRequest::rules
     * @covers \App\Http\Kernel
     */
    public function testRules($expected, $data)
    {
        $rules = (new SampleRequest())->rules();
        $validator = validator($data, $rules);
        $actual = $validator->passes();
        $errors = $validator->errors();

        echo json_encode($errors);
        $this->assertEquals($expected, $actual);
        $this->assertEquals($expected, empty($errors));
    }

    public function valDataProvider(): array
    {
        return [
            [
                true,
                [
                    'key1' => 'value',
                    'key2' => ''
                ]
            ],
            [
                true,
                [
                    'key1' => 'value',
                    'key2' => '20210401'
                ]
            ],
            [
                false,
                [
                    'key1' => '',
                    'key2' => '20210401'
                ]
            ],
            [
                false,
                [
                    'key1' => 'value',
                    'key2' => 'value2'
                ]
            ],
            [
                false,
                [
                    'key1' => 'value',
                    'key2' => '20211301'
                ]
            ],
        ];
    }
}
