<?php

namespace Database\Seeders;

use App\Models\Fingerprint;
use Illuminate\Database\Seeder;

class FingerprintSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            [
                'name' => 'Fingerprint 1',
                'serial_number' => 'SMT-98234645',
                'active' => true,
            ],
            [
                'name' => 'Fingerprint 2',
                'serial_number' => 'SMT-98752589',
                'active' => false,
            ],
            [
                'name' => 'Fingerprint 3',
                'serial_number' => 'SMT-98752589',
                'active' => false,
            ],
            [
                'name' => 'Fingerprint 4',
                'serial_number' => 'SMT-98752589',
                'active' => false,
            ],
            [
                'name' => 'Fingerprint 5',
                'serial_number' => 'SMT-98752589',
                'active' => false,
            ],
            [
                'name' => 'Fingerprint 6',
                'serial_number' => 'SMT-98752589',
                'active' => false,
            ],
            [
                'name' => 'Fingerprint 7',
                'serial_number' => 'SMT-98752589',
                'active' => false,
            ],
        ];

        foreach ($datas as $key => $value) {
            try {
                Fingerprint::create([
                    'id' => $key += 1,
                    'name' => $value['name'],
                    'serial_number' => $value['serial_number'],
                    'active' => $value['active'],
                ]);
            } catch (\Exception $exception) {
                // Do something when the exception is thrown
            }
        }
    }
}
