<?php

declare(strict_types=1);

namespace App\DTO;

use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * @OA\Schema(
 *      title="Company request DTO",
 *      description="Store or update Company request body data",
 *      type="object",
 *      required={"companyName"}
 * )
 */
class CompanyRequestDTO extends DataTransferObject
{
    public string $companyName;
    
    public string $companyRegistrationNumber;
    
    public \DateTimeImmutable $companyFoundationDate;
    
    public string $country;
    
    public string $zipCode;
    
    public string $city;
    
    public string $streetAddress;
    
    public float $latitude;
    
    public float $longitude;
    
    public string $companyOwner;
    
    public int $employees;
    
    public string $activity;
    
    public string $active;
    
    public string $email;
    
    public string $password;
    
}