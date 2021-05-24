<?php

namespace Tests\Unit\Infra\Validator;

use App\Infra\Validator\PhpValidator;
use PHPUnit\Framework\TestCase;

class PhpValidatorTest extends TestCase
{
    private PhpValidator $validator;

    protected function setUp(): void
    {
        $this->validator = new PhpValidator();
    }

    public function testNotEmptyFail()
    {
        $status = $this->validator->notEmpty('    ', 'fail')->assert();
        $errors = $this->validator->getErrors();

        $this->assertFalse($status);
        $this->assertCount(1, $errors);
        $this->assertSame('O campo fail não pode ser vazio.', $errors[0]);
    }

    public function testNotEmptySuccess()
    {
        $status = $this->validator->notEmpty('João', 'success')->assert();
        $errors = $this->validator->getErrors();

        $this->assertTrue($status);
        $this->assertCount(0, $errors);
        $this->assertEmpty($errors);
    }

    public function testIsArrayFail()
    {
        $data['categories'] = 'string';

        $status = $this->validator
            ->isArray($data['categories'], 'categories')
            ->assert();

        $errors = $this->validator->getErrors();

        $this->assertFalse($status);
        $this->assertCount(1, $errors);
        $this->assertSame('O campo categories deve ser um array.', $errors[0]);
    }

    public function testIsArraySuccess()
    {
        $data['categories'] = [1, 2, 3];

        $status = $this->validator
            ->isArray($data['categories'], 'categories')
            ->assert();

        $errors = $this->validator->getErrors();

        $this->assertTrue($status);
        $this->assertCount(0, $errors);
        $this->assertEmpty($errors);
    }

    public function testManyErrors()
    {
        $data['name'] = '';
        $data['categories'] = 'string';

        $status = $this->validator
            ->notEmpty($data['name'], 'name')
            ->isArray($data['categories'], 'categories')
            ->assert();

        $errors = $this->validator->getErrors();

        $this->assertFalse($status);
        $this->assertCount(2, $errors);
        $this->assertSame('O campo name não pode ser vazio.', $errors[0]);
        $this->assertSame('O campo categories deve ser um array.', $errors[1]);
    }

    public function testManySuccess()
    {
        $data['name'] = 'João';
        $data['categories'] = [1, 2, 3];

        $status = $this->validator
            ->notEmpty($data['name'], 'name')
            ->notEmpty($data['categories'], 'categories')
            ->isArray($data['categories'], 'categories')
            ->assert();

        $errors = $this->validator->getErrors();

        $this->assertTrue($status);
        $this->assertCount(0, $errors);
        $this->assertEmpty($errors);
    }
}