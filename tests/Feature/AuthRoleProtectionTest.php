<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthRoleProtectionTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var array<string, Role>
     */
    private array $roles;

    protected function setUp(): void
    {
        parent::setUp();

        $this->roles = collect([
            'farmer' => 'Farmer',
            'rice_trader' => 'Rice Trader / Buyer',
            'consumer' => 'Consumer',
            'admin' => 'Admin',
            'super_admin' => 'Super Admin',
        ])->mapWithKeys(fn (string $name, string $slug) => [
            $slug => Role::create(['slug' => $slug, 'name' => $name]),
        ])->all();
    }

    public function test_guest_access_and_protected_redirects(): void
    {
        foreach (['/', '/prices', '/advisor'] as $path) {
            $this->get($path)->assertOk();
        }

        foreach (['/settings', '/dashboard', '/planting-planner', '/admin/dashboard'] as $path) {
            $this->get($path)->assertRedirect('/login');
        }
    }

    public function test_user_can_login_and_reach_role_dashboard_redirect(): void
    {
        $user = $this->userWithRole('farmer', [
            'email' => 'farmer-login@rmais.test',
            'password' => 'password123',
        ]);

        $this->post('/login', [
            'email' => 'farmer-login@rmais.test',
            'password' => 'password123',
        ])->assertRedirect('/dashboard');

        $this->assertAuthenticatedAs($user);
        $this->get('/dashboard')->assertRedirect('/farmer/dashboard');
    }

    public function test_farmer_trader_and_consumer_registration_is_allowed(): void
    {
        $this->post('/register', [
            'name' => 'New Farmer',
            'email' => 'new-farmer@rmais.test',
            'role' => 'farmer',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ])->assertRedirect('/dashboard');

        $this->assertAuthenticated();
        $this->assertDatabaseHas('users', [
            'email' => 'new-farmer@rmais.test',
            'role_id' => $this->roles['farmer']->id,
        ]);
    }

    public function test_admin_and_super_admin_registration_is_denied(): void
    {
        $this->from('/register')->post('/register', [
            'name' => 'Blocked Admin',
            'email' => 'blocked-admin@rmais.test',
            'role' => 'admin',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ])->assertRedirect('/register')->assertSessionHasErrors('role');

        $this->assertGuest();
        $this->assertDatabaseMissing('users', ['email' => 'blocked-admin@rmais.test']);
    }

    public function test_logout_clears_authenticated_session(): void
    {
        $this->actingAs($this->userWithRole('consumer'));

        $this->post('/logout')->assertRedirect('/');
        $this->assertGuest();
    }

    public function test_role_access_and_denial(): void
    {
        $this->actingAs($this->userWithRole('farmer'));
        $this->get('/farmer/dashboard')->assertOk();
        $this->get('/planting-planner')->assertOk();
        $this->get('/admin/dashboard')->assertForbidden();

        $this->actingAs($this->userWithRole('rice_trader'));
        $this->get('/trader/dashboard')->assertOk();
        $this->get('/farmer/dashboard')->assertForbidden();
        $this->get('/admin/dashboard')->assertForbidden();

        $this->actingAs($this->userWithRole('consumer'));
        $this->get('/consumer/dashboard')->assertOk();
        $this->get('/consumer-comparison')->assertOk();
        $this->get('/farmer/dashboard')->assertForbidden();
        $this->get('/admin/dashboard')->assertForbidden();
    }

    public function test_admin_and_super_admin_can_access_seeded_dashboard_roles(): void
    {
        $this->actingAs($this->userWithRole('admin'));
        $this->get('/admin/dashboard')->assertOk();
        $this->get('/super-admin/dashboard')->assertForbidden();

        $this->actingAs($this->userWithRole('super_admin'));
        $this->get('/super-admin/dashboard')->assertOk();
        $this->get('/admin/dashboard')->assertForbidden();
    }

    public function test_public_ui_stays_inside_phase_two_scope(): void
    {
        $content = strtolower(collect(['/', '/prices', '/advisor', '/login', '/register'])
            ->map(fn (string $path) => $this->get($path)->getContent())
            ->implode(' '));

        foreach (['marketplace', 'cart', 'checkout', 'payment', 'delivery', 'chat', 'social feed', 'corn', 'vegetable', 'livestock'] as $forbiddenTerm) {
            $this->assertStringNotContainsString($forbiddenTerm, $content);
        }

        $this->assertStringContainsString('rice', $content);
        $this->assertStringContainsString('palay', $content);
    }

    /**
     * @param  array<string, mixed>  $overrides
     */
    private function userWithRole(string $slug, array $overrides = []): User
    {
        return User::factory()->create(array_merge([
            'role_id' => $this->roles[$slug]->id,
        ], $overrides));
    }
}
