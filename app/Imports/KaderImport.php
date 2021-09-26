<?php

namespace App\Imports;

use App\Models\User;
use App\Services\KaderService;
use Hash;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class KaderImport implements 
    ToModel, 
    WithHeadingRow, 
    SkipsEmptyRows,
    SkipsOnError,
    SkipsOnFailure,
    WithValidation
{
    use 
    Importable, 
    SkipsFailures, 
    SkipsErrors;

    public $userList;
    protected $kaderService;

    public function  __construct(KaderService $kaderService)
    {
        $this->kaderService = $kaderService;

        // $this->userList = collect();
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $kader = $this->kaderService->save($row);

        return $kader;
    }

    /**
     * validation
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'nama' => 'required|string',
            'email' => 'required|email|unique:users,email',
        ];
    }
}
