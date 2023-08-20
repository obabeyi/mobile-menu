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
                'title' => 'campaign_create',
            ],
            [
                'id'    => 18,
                'title' => 'campaign_edit',
            ],
            [
                'id'    => 19,
                'title' => 'campaign_show',
            ],
            [
                'id'    => 20,
                'title' => 'campaign_delete',
            ],
            [
                'id'    => 21,
                'title' => 'campaign_access',
            ],
            [
                'id'    => 22,
                'title' => 'category_create',
            ],
            [
                'id'    => 23,
                'title' => 'category_edit',
            ],
            [
                'id'    => 24,
                'title' => 'category_show',
            ],
            [
                'id'    => 25,
                'title' => 'category_delete',
            ],
            [
                'id'    => 26,
                'title' => 'category_access',
            ],
            [
                'id'    => 27,
                'title' => 'page_create',
            ],
            [
                'id'    => 28,
                'title' => 'page_edit',
            ],
            [
                'id'    => 29,
                'title' => 'page_show',
            ],
            [
                'id'    => 30,
                'title' => 'page_delete',
            ],
            [
                'id'    => 31,
                'title' => 'page_access',
            ],
            [
                'id'    => 32,
                'title' => 'comment_create',
            ],
            [
                'id'    => 33,
                'title' => 'comment_edit',
            ],
            [
                'id'    => 34,
                'title' => 'comment_show',
            ],
            [
                'id'    => 35,
                'title' => 'comment_delete',
            ],
            [
                'id'    => 36,
                'title' => 'comment_access',
            ],
            [
                'id'    => 37,
                'title' => 'product_create',
            ],
            [
                'id'    => 38,
                'title' => 'product_edit',
            ],
            [
                'id'    => 39,
                'title' => 'product_show',
            ],
            [
                'id'    => 40,
                'title' => 'product_delete',
            ],
            [
                'id'    => 41,
                'title' => 'product_access',
            ],
            [
                'id'    => 42,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 43,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 44,
                'title' => 'content_management_access',
            ],
            [
                'id'    => 45,
                'title' => 'content_category_create',
            ],
            [
                'id'    => 46,
                'title' => 'content_category_edit',
            ],
            [
                'id'    => 47,
                'title' => 'content_category_show',
            ],
            [
                'id'    => 48,
                'title' => 'content_category_delete',
            ],
            [
                'id'    => 49,
                'title' => 'content_category_access',
            ],
            [
                'id'    => 50,
                'title' => 'content_tag_create',
            ],
            [
                'id'    => 51,
                'title' => 'content_tag_edit',
            ],
            [
                'id'    => 52,
                'title' => 'content_tag_show',
            ],
            [
                'id'    => 53,
                'title' => 'content_tag_delete',
            ],
            [
                'id'    => 54,
                'title' => 'content_tag_access',
            ],
            [
                'id'    => 55,
                'title' => 'content_page_create',
            ],
            [
                'id'    => 56,
                'title' => 'content_page_edit',
            ],
            [
                'id'    => 57,
                'title' => 'content_page_show',
            ],
            [
                'id'    => 58,
                'title' => 'content_page_delete',
            ],
            [
                'id'    => 59,
                'title' => 'content_page_access',
            ],
            [
                'id'    => 60,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
