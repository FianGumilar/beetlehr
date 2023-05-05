<?php

namespace App\Services\Fingerprint;

use App\Models\Fingerprint;


class FingerprintService 
{
    public function getData($request)
    {
        $query = Fingerprint::paginate(10);
        return $query;
    }  

    public function createData($request)
    {
        $inputs = $request->only(['name', 'serial_number', 'active']);

        $query = Fingerprint::create($inputs);
        return $query;
    }

    public function destroyData($id){
        
        $query = Fingerprint::findOrFail($id);
        $query->delete();

        return $query;
    }

    public function updateData($id, $request)
    {
        $inputs = $request->only(['name', 'serial_number', 'active']);

        $query = Fingerprint::findOrFail($id);
        $query->update($inputs);
        
        return $query;
    }

    // public function updateData($id, $request)
    // {
    //     $inputs = $request->only(['type', 'start', 'end', 'title']);

    //     if ($request->branch_id === 'all' || $request->branch_id === 'null') {
    //         $inputs['branch_id'] = null;
    //     } else {
    //         $inputs['branch_id'] = $request->branch_id;
    //     }

    //     if ($request->type === 'document' && $request->file('file')) {
    //         // Upload File
    //         $fileService = new FileService();
    //         $file = $fileService->uploadFile($request->file('file'));
    //         $inputs['file'] = $file->id;
    //     } else {
    //         $inputs['description'] = $request->description;
    //     }

    //     $noticeboard = NoticeBoard::findOrFail($id);
    //     $noticeboard->update($inputs);
        
    //     return $noticeboard;
    // }
}
