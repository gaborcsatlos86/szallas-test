<?php

namespace App\Repositories;

use App\Interfaces\CompanyRepositoryInterface;
use App\Models\Company;


class CompanyRepository implements CompanyRepositoryInterface
{
    public function getAllCompanies()
    {
        return Company::all();
    }
    
    public function getCompaniesById(array $companyIds)
    {
        return Company::findMany($companyIds); (new Company())->whereIn('companyId',$companyIds);
    }
    
    public function createCompany(array $companyDetails)
    {
        
    }
    
    public function updateCompany($companyId, array $companyDetails)
    {
        
    }
}