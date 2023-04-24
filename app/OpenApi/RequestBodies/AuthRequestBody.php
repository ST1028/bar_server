<?php

namespace App\OpenApi\RequestBodies;

use GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType;
use GoldSpecDigital\ObjectOrientedOAS\Objects\RequestBody;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema;
use Vyuldashev\LaravelOpenApi\Factories\RequestBodyFactory;

class AuthRequestBody extends RequestBodyFactory
{
    public function build(): RequestBody
    {
        return RequestBody::create()->description('Auth')
            ->content(
                MediaType::json()->schema(
                    Schema::object('Auth')
                        ->properties(
                            Schema::string('login_id'),
                            Schema::string('password'),
                        )->required('login_id', 'password')
                )
            );
    }
}
