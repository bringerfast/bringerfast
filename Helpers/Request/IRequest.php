<?php
namespace Request;

interface IRequest
{
    public function getBody();
    public function getHttpAuthorization();
}