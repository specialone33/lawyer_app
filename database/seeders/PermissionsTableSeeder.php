<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'court_create',
            ],
            [
                'id'    => 18,
                'title' => 'court_edit',
            ],
            [
                'id'    => 19,
                'title' => 'court_show',
            ],
            [
                'id'    => 20,
                'title' => 'court_delete',
            ],
            [
                'id'    => 21,
                'title' => 'court_access',
            ],
            [
                'id'    => 22,
                'title' => 'customer_create',
            ],
            [
                'id'    => 23,
                'title' => 'customer_edit',
            ],
            [
                'id'    => 24,
                'title' => 'customer_show',
            ],
            [
                'id'    => 25,
                'title' => 'customer_delete',
            ],
            [
                'id'    => 26,
                'title' => 'customer_access',
            ],
            [
                'id'    => 27,
                'title' => 'lawyer_create',
            ],
            [
                'id'    => 28,
                'title' => 'lawyer_edit',
            ],
            [
                'id'    => 29,
                'title' => 'lawyer_show',
            ],
            [
                'id'    => 30,
                'title' => 'lawyer_delete',
            ],
            [
                'id'    => 31,
                'title' => 'lawyer_access',
            ],
            [
                'id'    => 32,
                'title' => 'basi_create',
            ],
            [
                'id'    => 33,
                'title' => 'basi_edit',
            ],
            [
                'id'    => 34,
                'title' => 'basi_show',
            ],
            [
                'id'    => 35,
                'title' => 'basi_delete',
            ],
            [
                'id'    => 36,
                'title' => 'basi_access',
            ],
            [
                'id'    => 37,
                'title' => 'setting_create',
            ],
            [
                'id'    => 38,
                'title' => 'setting_edit',
            ],
            [
                'id'    => 39,
                'title' => 'setting_show',
            ],
            [
                'id'    => 40,
                'title' => 'setting_delete',
            ],
            [
                'id'    => 41,
                'title' => 'setting_access',
            ],
            [
                'id'    => 42,
                'title' => 'proccess_create',
            ],
            [
                'id'    => 43,
                'title' => 'proccess_edit',
            ],
            [
                'id'    => 44,
                'title' => 'proccess_show',
            ],
            [
                'id'    => 45,
                'title' => 'proccess_delete',
            ],
            [
                'id'    => 46,
                'title' => 'proccess_access',
            ],
            [
                'id'    => 47,
                'title' => 'procedural_process_create',
            ],
            [
                'id'    => 48,
                'title' => 'procedural_process_edit',
            ],
            [
                'id'    => 49,
                'title' => 'procedural_process_show',
            ],
            [
                'id'    => 50,
                'title' => 'procedural_process_delete',
            ],
            [
                'id'    => 51,
                'title' => 'procedural_process_access',
            ],
            [
                'id'    => 52,
                'title' => 'case_file_create',
            ],
            [
                'id'    => 53,
                'title' => 'case_file_edit',
            ],
            [
                'id'    => 54,
                'title' => 'case_file_show',
            ],
            [
                'id'    => 55,
                'title' => 'case_file_delete',
            ],
            [
                'id'    => 56,
                'title' => 'case_file_access',
            ],
            [
                'id'    => 57,
                'title' => 'case_type_create',
            ],
            [
                'id'    => 58,
                'title' => 'case_type_edit',
            ],
            [
                'id'    => 59,
                'title' => 'case_type_show',
            ],
            [
                'id'    => 60,
                'title' => 'case_type_delete',
            ],
            [
                'id'    => 61,
                'title' => 'case_type_access',
            ],
            [
                'id'    => 62,
                'title' => 'case_status_create',
            ],
            [
                'id'    => 63,
                'title' => 'case_status_edit',
            ],
            [
                'id'    => 64,
                'title' => 'case_status_show',
            ],
            [
                'id'    => 65,
                'title' => 'case_status_delete',
            ],
            [
                'id'    => 66,
                'title' => 'case_status_access',
            ],
            [
                'id'    => 67,
                'title' => 'one_time_fee_create',
            ],
            [
                'id'    => 68,
                'title' => 'one_time_fee_edit',
            ],
            [
                'id'    => 69,
                'title' => 'one_time_fee_show',
            ],
            [
                'id'    => 70,
                'title' => 'one_time_fee_delete',
            ],
            [
                'id'    => 71,
                'title' => 'one_time_fee_access',
            ],
            [
                'id'    => 72,
                'title' => 'contract_create',
            ],
            [
                'id'    => 73,
                'title' => 'contract_edit',
            ],
            [
                'id'    => 74,
                'title' => 'contract_show',
            ],
            [
                'id'    => 75,
                'title' => 'contract_delete',
            ],
            [
                'id'    => 76,
                'title' => 'contract_access',
            ],
            [
                'id'    => 77,
                'title' => 'contract_type_create',
            ],
            [
                'id'    => 78,
                'title' => 'contract_type_edit',
            ],
            [
                'id'    => 79,
                'title' => 'contract_type_show',
            ],
            [
                'id'    => 80,
                'title' => 'contract_type_delete',
            ],
            [
                'id'    => 81,
                'title' => 'contract_type_access',
            ],
            [
                'id'    => 82,
                'title' => 'company_type_create',
            ],
            [
                'id'    => 83,
                'title' => 'company_type_edit',
            ],
            [
                'id'    => 84,
                'title' => 'company_type_show',
            ],
            [
                'id'    => 85,
                'title' => 'company_type_delete',
            ],
            [
                'id'    => 86,
                'title' => 'company_type_access',
            ],
            [
                'id'    => 87,
                'title' => 'company_contract_create',
            ],
            [
                'id'    => 88,
                'title' => 'company_contract_edit',
            ],
            [
                'id'    => 89,
                'title' => 'company_contract_show',
            ],
            [
                'id'    => 90,
                'title' => 'company_contract_delete',
            ],
            [
                'id'    => 91,
                'title' => 'company_contract_access',
            ],
            [
                'id'    => 92,
                'title' => 'company_contract_alteration_create',
            ],
            [
                'id'    => 93,
                'title' => 'company_contract_alteration_edit',
            ],
            [
                'id'    => 94,
                'title' => 'company_contract_alteration_show',
            ],
            [
                'id'    => 95,
                'title' => 'company_contract_alteration_delete',
            ],
            [
                'id'    => 96,
                'title' => 'company_contract_alteration_access',
            ],
            [
                'id'    => 97,
                'title' => 'other_case_create',
            ],
            [
                'id'    => 98,
                'title' => 'other_case_edit',
            ],
            [
                'id'    => 99,
                'title' => 'other_case_show',
            ],
            [
                'id'    => 100,
                'title' => 'other_case_delete',
            ],
            [
                'id'    => 101,
                'title' => 'other_case_access',
            ],
            [
                'id'    => 102,
                'title' => 'other_case_type_create',
            ],
            [
                'id'    => 103,
                'title' => 'other_case_type_edit',
            ],
            [
                'id'    => 104,
                'title' => 'other_case_type_show',
            ],
            [
                'id'    => 105,
                'title' => 'other_case_type_delete',
            ],
            [
                'id'    => 106,
                'title' => 'other_case_type_access',
            ],
            [
                'id'    => 107,
                'title' => 'hearing_create',
            ],
            [
                'id'    => 108,
                'title' => 'hearing_edit',
            ],
            [
                'id'    => 109,
                'title' => 'hearing_show',
            ],
            [
                'id'    => 110,
                'title' => 'hearing_delete',
            ],
            [
                'id'    => 111,
                'title' => 'hearing_access',
            ],
            [
                'id'    => 112,
                'title' => 'finance_create',
            ],
            [
                'id'    => 113,
                'title' => 'finance_edit',
            ],
            [
                'id'    => 114,
                'title' => 'finance_show',
            ],
            [
                'id'    => 115,
                'title' => 'finance_delete',
            ],
            [
                'id'    => 116,
                'title' => 'finance_access',
            ],
            [
                'id'    => 117,
                'title' => 'calendar_create',
            ],
            [
                'id'    => 118,
                'title' => 'calendar_edit',
            ],
            [
                'id'    => 119,
                'title' => 'calendar_show',
            ],
            [
                'id'    => 120,
                'title' => 'calendar_delete',
            ],
            [
                'id'    => 121,
                'title' => 'calendar_access',
            ],
            [
                'id'    => 122,
                'title' => 'payment_create',
            ],
            [
                'id'    => 123,
                'title' => 'payment_edit',
            ],
            [
                'id'    => 124,
                'title' => 'payment_show',
            ],
            [
                'id'    => 125,
                'title' => 'payment_delete',
            ],
            [
                'id'    => 126,
                'title' => 'payment_access',
            ],
            [
                'id'    => 127,
                'title' => 'folder_access',
            ],
            [
                'id'    => 128,
                'title' => 'customers_control_access',
            ],
            [
                'id'    => 129,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
