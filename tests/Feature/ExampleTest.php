<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /** @test */
    public function authorized_admin_can_see_filters()
    {
        $this->seed('SuperAdminSeeder');

        $admin = User::find(1);

        $this->actingAs($admin);

        $response = $this->get('/api/admin/portraits/filter');
        $response->assertStatus(200)->assertJsonStructure([
            'id' => [
                'min',
                'max',
            ],
            'title',
            'last_editor',
            'update_date_from',
            'update_date_to'
        ]);
    }

    /** @test */
    public function authorized_admin_can_see_portraits()
    {
        $this->seed('SuperAdminSeeder');

        $admin = User::find(1);

        $this->actingAs($admin);

        $portrait = factory('App\Models\Portrait')->create();

        activity()
            ->performedOn($portrait)
            ->causedBy($admin)
            ->log('portrait create');

        $response = $this->get('/api/admin/portraits');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'current_page',
                    'data' => [
                        [
                            'id',
                            'title',
                            'image_url',
                            'type_ru',
                            'created_at',
                            'updated_at',
                        ]
                    ],
                    'last_page',
                    'per_page',
                    'total',
                ]
            ]);
    }
}
