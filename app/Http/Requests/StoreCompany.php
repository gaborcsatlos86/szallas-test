<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\DTO\CompanyRequestDTO;

/**
 * @OA\Schema(
 *      title="Store Company request",
 *      description="Store Company request body data",
 *      type="object",
 *      required={"comapnyName", "email"}
 * )
 */
final class StoreCompany extends FormRequest
{
    /**
     * @OA\Property(
     *      title="Company Name",
     *      description="Name of the company",
     *      example="Lorem Ipsum"
     * )
     *
     * @var string
     */
    public string $companyName;
    
    /**
     * @OA\Property(
     *      title="Company Register Number",
     *      description="Register number of the company",
     *      example="111111-1111"
     * )
     *
     * @var string
     */
    public string $companyRegistrationNumber;
    
    /**
     * @OA\Property(
     *      title="Company Foundation Date",
     *      description="Date of the company foundation",
     *      example="2023-05-31"
     * )
     *
     * @var \DateTime
     */
    public \DateTimeImmutable $companyFoundationDate;
    
    /**
     * @OA\Property(
     *      title="Country",
     *      description="Country name",
     *      example="Hungary"
     * )
     *
     * @var string
     */
    public string $country;
    
    /**
     * @OA\Property(
     *      title="Zip Code",
     *      description="Zip code of company location",
     *      example="1132"
     * )
     *
     * @var string
     */
    public string $zipCode;
    
    /**
     * @OA\Property(
     *      title="City",
     *      description="City of company location",
     *      example="Budapest"
     * )
     *
     * @var string
     */
    public string $city;
    
    /**
     * @OA\Property(
     *      title="Street Address",
     *      description="Address",
     *      example="Visegrádi utca 18/A"
     * )
     *
     * @var string
     */
    public string $streetAddress;
    
    /**
     * @OA\Property(
     *      title="Latitude",
     *      description="Geo location data",
     *      example="47.513429"
     * )
     *
     * @var float
     */
    public float $latitude;
    
    /**
     * @OA\Property(
     *      title="Longitude",
     *      description="Geo location data",
     *      example="19.054577"
     * )
     *
     * @var float
     */
    public float $longitude;
    
    /**
     * @OA\Property(
     *      title="Company Owner",
     *      description="Owner of company",
     *      example="Kiss István"
     * )
     *
     * @var string
     */
    public string $companyOwner;
    
    /**
     * @OA\Property(
     *      title="Employees",
     *      description="Number of employees",
     *      example="37"
     * )
     *
     * @var int
     */
    public int $employees;
    
    /**
     * @OA\Property(
     *      title="Activity",
     *      description="Activity of the company",
     *      example="Software Develop"
     * )
     *
     * @var string
     */
    public string $activity;
    
    /**
     * @OA\Property(
     *      title="Active",
     *      description="Company is active",
     *      example="1"
     * )
     *
     * @var bool
     */
    public bool $active;
    
    /**
     * @OA\Property(
     *      title="Email",
     *      description="Email address of the company",
     *      example="contact@loremipsum.com"
     * )
     *
     * @var string
     */
    public string $email;
    
    /**
     * @OA\Property(
     *      title="Password",
     *      description="Secure data",
     *      example="***********"
     * )
     *
     * @var string
     */
    public string $password;
    
    public function rules()
    {
        return [
            'companyName' => [
                'required',
            ],
            'email' => [
                'required',
            ],
        ];
    }
    
    public function data()
    {
        return new CompanyRequestDTO([
            'companyName' => $this->input('companyName'),
            'companyRegistrationNumber' => $this->input('companyRegistrationNumber'),
            'companyFoundationDate' => new \DateTimeImmutable($this->input('companyFoundationDate')),
            'country' => $this->input('country'),
            'zipCode' => $this->input('zipCode'),
            'city' => $this->input('city'),
            'streetAddress' => $this->input('streetAddress'),
            'latitude' => $this->input('latitude'),
            'longitude' => $this->input('longitude'),
            'companyOwner' => $this->input('companyOwner'),
            'employees' => $this->input('employees'),
            'activity' => $this->input('activity'),
            'active' => $this->input('active'),
            'email' => $this->input('email'),
            'password' => $this->input('password'),
        ]);
    }

}