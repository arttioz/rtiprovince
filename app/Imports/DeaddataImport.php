<?php

namespace App\Imports;

//use App\DeaddataImport;
use App\Models\deathdata;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class DeaddataImport implements ToModel,WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $upload_name = Auth::user()->first_name." ".Auth::user()->last_name;
        $upload_id =Auth::user()->id;
        $is_null = is_null($row);
        dump($row);
//        dd();
//        return new deathdata(
//            [
//                'Prefix' => $row[0],
//                'Fname' => $row[1],
//                'Lname' => $row[2],
//                'DrvSocNO' => $row[3],
//                'Age' => $row[4],
//                'Sex' => $row[5] === 'ชาย' ? '1' : '2',
//                'BirthDate' => $row[6],
//                'DeadDate' => $row[7],
//                'AccSubDist' => $row[10],
//                'AccDist' => $row[11],
//                'NCAUSE' => $row[8],
//                'Vehicle' => $row[9],
//                'AccProv' => $row[12],
//                'DeathProv' => $row[13],
//                'AccLatlong' => $row[14],
//                'Acclong' => $row[15],
//                'upload_by' => $upload_id,
//                'IS_UPLOAD' => "Y",
//                'upload_name' => $upload_name,
//            ]
//        );
    }
    public function startRow(): int
    {
        // TODO: Implement startRow() method.
        return 1;
    }
}
