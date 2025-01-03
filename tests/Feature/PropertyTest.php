<?php

use App\Models\Property;
use App\Notifications\ContactRequestNotification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;

uses(RefreshDatabase::class);

it('send not found on non existent property', function () {
    $response = $this->get('/biens/le-confort-dinnover-de-maniere-sure-1');
    $response->assertStatus(404);
});

it('redirect on bad slug property', function () {
    $property = Property::factory()->create();
    $response = $this->get('/biens/le-confort-dinnover-de-maniere-sure-' . $property->id);
    $response->assertRedirectToRoute('property.show', ['property' => $property->id, "slug" => $property->getSlug()]);
});

it('gives me a property', function () {
    $property = Property::factory()->create();
    $response = $this->get("/biens/{$property->getSlug()}-{$property->id}");
    $response->assertOk();
    $response->assertSee($property->title);
});

it('gives an error on contact', function () {
    $property = Property::factory()->create();
    $response = $this->post("/biens/{$property->id}/contact", [
        "firstname" => "John",
        "lastname" => "Doe",
        "phone" => "0000000000",
        "email" => "doe",
        "message" => "Pouvez-vous me recontacter"]);
    $response->assertRedirect();
    $response->assertSessionHasErrors(['email']);
    $response->assertSessionHasInput('email', 'doe');
});

it('is ok on contact', function () {
    Notification::fake();
    $property = Property::factory()->create();
    $response = $this->post("/biens/{$property->id}/contact", [
        "firstname" => "John",
        "lastname" => "Doe",
        "phone" => "0000000000",
        "email" => "doe@demo.fr",
        "message" => "Pouvez-vous me recontacter"]);
    $response->assertRedirect();
    $response->assertSessionHasNoErrors();
    $response->assertSessionHas('success');
    Notification::assertSentOnDemand(ContactRequestNotification::class);
});