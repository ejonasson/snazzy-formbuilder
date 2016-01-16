<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\FormBuilder\Rules\FieldRules;

class RuleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */


    public function testIsRequired()
    {
        $rules_array = array(
            'required' => 'on'
            );
        $rules = new FieldRules($rules_array);
        $normalized_rules = $rules->normalize();
        $has_required = array_key_exists('required', $normalized_rules);
        $this->assertTrue($has_required);
    }
}
