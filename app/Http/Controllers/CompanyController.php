<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Interfaces\CompanyRepositoryInterface;
use App\Models\Company;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCompany;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class CompanyController extends Controller
{
    private CompanyRepositoryInterface $companyRepository;
    
    public function __construct(CompanyRepositoryInterface $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }
    
    /**
     * List of companies.
     * @OA\Get(
     *      path="/companies",
     *      operationId="getCompanyList",
     *      tags={"Company"},
     *      summary="Get list of companies",
     *      description="Returns list of companies",
     *      @OA\Parameter(
     *          name="id[]",
     *          description="Company id can be just an integer or array with integers",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="array",
     *              @OA\Items(
     *                  type="integer",
     *                  format="int32"
     *              ),
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Company")
     *       ),
     *     )
     */
    public function index(Request $request): JsonResponse
    {
        if (($idParam = $this->checkListParam($request)) !== null) {
            return response()->json([
                'data' => $this->companyRepository->getCompaniesById($idParam)
            ]);
        }
        return response()->json([
            'data' => $this->companyRepository->getAllCompanies()
        ]);
    }
    
    /**
     * Create a new company.
     * @OA\Post(
     *      path="/company",
     *      operationId="storeCompany",
     *      tags={"Company"},
     *      summary="Store new company",
     *      description="Store new company data",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StoreCompany")
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Company")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      )
     * )
     */
    public function store(StoreCompany $request): JsonResponse
    {
        if ($request->validate($request->rules())) {
            $company = Company::create($request->data()->toArray());
            $company->save();
            return response()->json([
                'data' => $company
            ]);
        }
        
        return response(null, Response::HTTP_BAD_REQUEST)->json([
            'error' => 'Invalid data',
            'data' => $request->validationData()
        ]);
    }
    
    /**
     * Update a company.
     * @OA\Post(
     *      path="/company/{id}",
     *      operationId="updateCompany",
     *      tags={"Company"},
     *      summary="Update company",
     *      description="Update company data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Company id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StoreCompany")
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Company")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      )
     * )
     */
    public function update(int $id, StoreCompany $request): JsonResponse
    {
        try {
            $company = Company::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response(null, Response::HTTP_BAD_REQUEST)->json([
                'error' => 'Not Found'
            ]);
        }
        
        if ($request->validate($request->rules())) {
            $company->update($request->data()->toArray());
            $company->save();
            return response()->json([
                'data' => $company
            ]);
        }
        return response(null, Response::HTTP_BAD_REQUEST)->json([
            'error' => 'Invalid data',
            'data' => $request->validationData()
        ]);
    }
    
    protected function checkListParam(Request $request): ?array
    {
        if ($request->query->has('id')) {
            $idParam = $request->query->all()['id'];
            if (is_array($idParam)) {
                if ($idParam == array_filter($idParam, 'is_numeric')) {
                    return $idParam;
                }
                throw new \ErrorException('Not valid param', 400);
            }
            if (is_numeric($idParam)) {
                return [$idParam];
            }
        }
        return null;
    }
}