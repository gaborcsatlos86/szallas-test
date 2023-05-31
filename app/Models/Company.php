<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     title="Company",
 *     description="Company model",
 *     @OA\Xml(
 *         name="Company"
 *     )
 * )
 */
class Company extends Model
{
    use HasFactory;
    
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'companyId';
    
    protected $guarded = ['companyId'];
    
    public $timestamps = false;

    /**
     * @OA\Property(
     *     title="ID",
     *     description="ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private int $compnayId;
    
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
    private string $companyRegistrationNumber;
    
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
     *      title="Password",
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
    
}
