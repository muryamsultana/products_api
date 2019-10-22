<?php
// api/tests/ProductsTest.php

namespace App\Tests;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;
use App\Entity\Products;
use Hautelook\AliceBundle\PhpUnit\RefreshDatabaseTrait;

class ProductsTest extends ApiTestCase
{
    // This trait provided by HautelookAliceBundle will take care of refreshing the database content to a known state before each test
    use RefreshDatabaseTrait;
/*
	public function testRegister():void{
		
		// The client implements Symfony HttpClient's `HttpClientInterface`, and the response `ResponseInterface`
        $response = static::createClient()->request('POST', '/register',  ['json' => ["email"=>"testsss","password"=>"teststs"]]);

        $this->assertResponseIsSuccessful();
		
		// Asserts that the returned content type is JSON-LD (the default)
        $this->assertResponseHeaderSame('content-type', 'application/ld+json; charset=utf-8');
		 $this->assertResponseStatusCodeSame(201);
		

		
	}
	*/
    public function testGetCollection(): void
    {
        // The client implements Symfony HttpClient's `HttpClientInterface`, and the response `ResponseInterface`
        $response = static::createClient()->request('GET', '/api/products');

        $this->assertResponseIsSuccessful();
        // Asserts that the returned content type is JSON-LD (the default)
        $this->assertResponseHeaderSame('content-type', 'application/ld+json; charset=utf-8');

        // Asserts that the returned JSON is a superset of this one
       /* $this->assertJsonContains([
            '@context' => '/contexts/Products',
            '@id' => '/products',
            '@type' => 'hydra:Collection',
            'hydra:totalItems' => 100,
            'hydra:view' => [
                '@id' => '/products?page=1',
                '@type' => 'hydra:PartialCollectionView',
                'hydra:first' => '/products?page=1',
                'hydra:last' => '/products?page=4',
                'hydra:next' => '/products?page=2',
            ],
        ]);*/

        // Because test fixtures are automatically loaded between each test, you can assert on them
        //$this->assertCount(30, $response->toArray()['hydra:member']);

        // Asserts that the returned JSON is validated by the JSON Schema generated for this resource by API Platform
        // This generated JSON Schema is also used in the OpenAPI spec!
        $this->assertMatchesResourceCollectionJsonSchema(Products::class);
    }

    public function testCreateProduct(): void
    {
        $response = static::createClient()->request('POST', '/api/products', ['json' => [
            'name' => 'my new book',
            'price' => 30,
            'created_at' => date("Y-m-d h:i:s",time()),
            'upodated_at' => date("Y-m-d h:i:s",time())
        ]]);

        $this->assertResponseStatusCodeSame(201);
        $this->assertResponseHeaderSame('content-type', 'application/ld+json; charset=utf-8');
       /* $this->assertJsonContains([
            'name' => 'my new book',
            'price' => 'The Handmaid\'s Tale',
            'created_at' => date("Y-m-d h:i:s",time()),
            'upodated_at' => date("Y-m-d h:i:s",time())
        ]);*/
        $this->assertRegExp('~^/api/products/\d+$~', $response->toArray()['@id']);
        $this->assertMatchesResourceItemJsonSchema(Products::class);
    }

/*
    public function testDeleteProduct(): void
    {
        $client = static::createClient();
        $iri = static::findIriBy(Products::class, ['id' => '1']);

        $client->request('DELETE', $iri);

        $this->assertResponseStatusCodeSame(204);
        $this->assertNull(
            // Through the container, you can access all your services from the tests, including the ORM, the mailer, remote API clients...
            static::$container->get('doctrine')->getRepository(Products::class)->findOneBy(['id' => '2'])
        );
    }
	*/
	
}