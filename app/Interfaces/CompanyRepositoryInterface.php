<?php

namespace App\Interfaces;

interface CompanyRepositoryInterface
{
    public function getAllCompanies();
    public function getCompaniesById(array $companyIds);
    public function createCompany(array $companyDetails);
    public function updateCompany($companyId, array $companyDetails);
}