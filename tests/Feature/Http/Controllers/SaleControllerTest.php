<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Sale;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\SaleController
 */
class SaleControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $sales = Sale::factory()->count(3)->create();

        $response = $this->get(route('sale.index'));

        $response->assertOk();
        $response->assertViewIs('sale.index');
        $response->assertViewHas('sales');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('sale.create'));

        $response->assertOk();
        $response->assertViewIs('sale.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SaleController::class,
            'store',
            \App\Http\Requests\SaleStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $status = $this->faker->numberBetween(-10000, 10000);

        $response = $this->post(route('sale.store'), [
            'status' => $status,
        ]);

        $sales = Sale::query()
            ->where('status', $status)
            ->get();
        $this->assertCount(1, $sales);
        $sale = $sales->first();

        $response->assertRedirect(route('sale.index'));
        $response->assertSessionHas('sale.id', $sale->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $sale = Sale::factory()->create();

        $response = $this->get(route('sale.show', $sale));

        $response->assertOk();
        $response->assertViewIs('sale.show');
        $response->assertViewHas('sale');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $sale = Sale::factory()->create();

        $response = $this->get(route('sale.edit', $sale));

        $response->assertOk();
        $response->assertViewIs('sale.edit');
        $response->assertViewHas('sale');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SaleController::class,
            'update',
            \App\Http\Requests\SaleUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $sale = Sale::factory()->create();
        $status = $this->faker->numberBetween(-10000, 10000);

        $response = $this->put(route('sale.update', $sale), [
            'status' => $status,
        ]);

        $sale->refresh();

        $response->assertRedirect(route('sale.index'));
        $response->assertSessionHas('sale.id', $sale->id);

        $this->assertEquals($status, $sale->status);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $sale = Sale::factory()->create();

        $response = $this->delete(route('sale.destroy', $sale));

        $response->assertRedirect(route('sale.index'));

        $this->assertModelMissing($sale);
    }
}
