<?php

namespace Tests\Feature;

use Tests\TestCase;

class PhaseOneRoutesTest extends TestCase
{
    public function test_phase_one_routes_render_successfully(): void
    {
        foreach (['/', '/onboarding', '/prices', '/advisor', '/login', '/register'] as $path) {
            $this->get($path)
                ->assertOk()
                ->assertSee('RMAIS')
                ->assertSee("M'lang", false);
        }
    }

    public function test_public_pages_stay_inside_rice_only_scope(): void
    {
        $content = strtolower($this->get('/')->getContent());

        foreach (['marketplace', 'cart', 'checkout', 'payment', 'delivery', 'chat', 'social feed', 'corn', 'vegetable', 'livestock'] as $forbiddenTerm) {
            $this->assertStringNotContainsString($forbiddenTerm, $content);
        }

        $this->assertStringContainsString('rice', $content);
        $this->assertStringContainsString('palay', $content);
    }

    public function test_advice_disclaimer_is_visible(): void
    {
        $this->get('/advisor')
            ->assertOk()
            ->assertSee('Advice is for decision support only and does not guarantee future prices.');
    }

    public function test_manifest_is_available(): void
    {
        $manifest = json_decode(file_get_contents(public_path('manifest.webmanifest')), true);

        $this->assertSame('RMAIS', $manifest['short_name']);
        $this->assertSame('standalone', $manifest['display']);
        $this->assertSame('/', $manifest['start_url']);
    }
}
