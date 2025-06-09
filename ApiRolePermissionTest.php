<?php

namespace JCS\RolePermission\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use JCS\RolePermission\Models\Role;
use JCS\RolePermission\Models\Permission;
use Tests\TestCase;

class ApiRolePermissionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_create_role()
    {
        $response = $this->postJson('/api/role-permission/roles', ['name' => 'admin']);
        $response->assertStatus(201)->assertJsonFragment(['name' => 'admin']);
        $this->assertDatabaseHas('roles', ['name' => 'admin']);
    }

    /** @test */
    public function can_create_permission()
    {
        $response = $this->postJson('/api/role-permission/permissions', ['name' => 'edit-posts']);
        $response->assertStatus(201)->assertJsonFragment(['name' => 'edit-posts']);
        $this->assertDatabaseHas('permissions', ['name' => 'edit-posts']);
    }

    // Additional tests can be added here for assigning permissions, roles etc.
}
