<?php

namespace App\Http\Controllers\Fingerprint;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminBaseController;
use App\Services\Fingerprint\FingerprintService;
use App\Http\Requests\Fingerprint\UpdateFingerprintRequest;
use App\Http\Requests\Fingerprint\ValidateBasicInfoRequest;
use App\Http\Resources\Fingerprint\FingerprintListResource;
use App\Http\Resources\Fingerprint\SubmitFingerprintResource;


class FingerprintController extends AdminBaseController
{
    public function __construct(FingerprintService $fingerprintService) 
    {
        $this->fingerprintService = $fingerprintService;
        $this->title = "BattleHR | fingerprint";
        $this->path = "fingerprint/index";
    }

    public function getData(Request $request)
    {
        try {
            $data = $this->fingerprintService->getData($request);

            $result = new FingerprintListResource($data);
            return $this->respond($result);
        } catch (\Exception $e) {
            return $this->exceptionError($e->getMessage());
        }
    }

    public function deleteFingerprint($id){
        try {
            $data = $this->fingerprintService->destroyData($id);

            $result = new SubmitFingerprintResource($data, 'Success delete this fingerprint');
            return $this->respond($result);
        } 
        catch (\Exception $e) {
            return $this->exceptionError($e->getMessage());
        }
    }

    public function validateBasicInfo(ValidateBasicInfoRequest $request)
    {
        try {
            return $this->respond('Success Validate Basic Info');
        } catch (\Exception $e) {
            return $this->exceptionError($e->getMessage());
        }
    }

    public function createFingerprint(ValidateBasicInfoRequest $request)
    {
        try {
            // DB::beginTransaction();
            $data = $this->fingerprintService->createData($request);

            $result = new SubmitFingerprintResource($data, 'Success Create Fingerprint');
            // DB::commit();
            return $this->respond($result);
        } catch (\Exception $e) {
            // DB::rollBack();
            return $this->exceptionError($e->getMessage());
        }
    }

    public function updateFingerprint($id, UpdateFingerprintRequest $request)
    {
        try {
            $data = $this->fingerprintService->updateData($id, $request);

            $result = new SubmitFingerprintResource($data, 'Success Update Fingerprint');
            return $this->respond($result);
        } catch (\Exception $e) {
            return $this->exceptionError($e->getMessage());
        }
    }
}

    
