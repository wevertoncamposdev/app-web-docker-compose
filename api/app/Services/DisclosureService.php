<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\Disclosure as Model;

use Exception;

class DisclosureService
{

    protected $data;

    public function __construct(Model $data)
    {
        $this->data = $data;
    }

    /**
     * Get all of the models from the database.
     */
    public function getAll()
    {
        try {
            $data = DB::table('disclosures')
                ->join('users', 'users.id', '=', 'disclosures.user_id')
                ->select(
                    'disclosures.uuid',
                    'disclosures.name',
                    'image',
                    'about',
                    'disclosures.created_at',
                    'users.uuid as ong_uuid',
                    'users.name as ong',
                    'users.email as email'
                )
                ->where('disclosures.deleted_at',"=",NULL)
                ->get();
            return $data;
        } catch (Exception $e) {

            return $e->getMessage();
        }
    }

    /**
     * Get only of the models from the database.
     */
    public function getOnly($uuid)
    {
        try {
            $data = DB::table('disclosures')
                ->leftjoin('users', 'users.id', '=', 'disclosures.user_id')
                ->leftjoin('locations', 'users.id', '=', 'locations.user_id')
                ->select(
                    'disclosures.uuid',
                    'disclosures.name',
                    'image',
                    'about',
                    'disclosures.created_at',
                    'users.uuid as ong_uuid',
                    'users.name as ong',
                    'users.email as email',
                    'users.contact',
                    'zip_code',
                    'street',
                    'complement',
                    'district',
                    'city',
                    'state'
                )
                ->where('disclosures.uuid', '=', $uuid)
                ->limit(1)
                ->get();
            return $data;
        } catch (Exception $ex) {

            return $ex->getMessage();
        }
    }

    public function create($validated)
    {
        try {
            DB::beginTransaction();
            $data = $this->data->create($validated);
            DB::commit();
            return $data;
        } catch (Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }

    public function update($request, $uuid)
    {
        try {
            DB::beginTransaction();
            $this->data->whereUuid($uuid)->update($request->toArray());
            DB::commit();
            return $this->data->whereUuid($uuid)->get();
        } catch (Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }

    public function delete($uuid)
    {
        try {
            DB::beginTransaction();
            $data = $this->data->whereUuid($uuid)->delete();
            DB::commit();
            return $this->data->withTrashed()->whereUuid($uuid)->get();
        } catch (Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }
}
