<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ArticleTest extends TestCase
{
    use RefreshDatabase;
    public function setUp(): void
    {
        parent::setUp();
    }
    /** @test */
    public function anUserCanSeeCreatedArticles()
    {
        $this->article = factory("App\Article")->create();
        $this->get('/')
            ->assertSee($this->article->title);
    }

    /** @test */
    public function usersSeeMessageErrorIfNotExistsArticles()
    {
        $this->get("/")
            ->assertSee("No se encontraron artículos");
    }


    /** @test */
    public function aUserCantDeleteAnArticleThatDoesntBelongToHim()
    {
        $this->withExceptionHandling();

        $userCreate = factory("App\User")->create();

        $articleByUser = factory("App\Article")->create(["user_id" => $userCreate]);

        $userLogged = factory("App\User")->create(["role_id" => 2]);

        $this->actingAs($userLogged);
        $this->delete("/articles/{$articleByUser->id}")
            ->assertStatus(403);
        $this->assertDatabaseHas("articles", ['id' => $articleByUser->id]);
    }

    /** @test */
    public function aAdminUserCanDeleteAnyArticle()
    {

        $userCreate = factory("App\User")->create();

        $articleByUser = factory("App\Article")->create(["user_id" => $userCreate]);

        $userAdmin = factory("App\User")->create(["role_id" => 1]);

        $this->actingAs($userAdmin);
        $this->delete("/articles/{$articleByUser->id}")
            ->assertRedirect("/home");
        $this->assertDatabaseMissing("articles", ['id' => $articleByUser->id]);
    }

    /** @test */
    public function anUnauthenticatedUserCantCreateArticles()
    {
        $this->withExceptionHandling();
        $this->assertGuest($guard = null);
        $this->get("/create")
            ->assertRedirect("/login");
    }

    /** @test */
    public function anAuthenticatedUserCanCreateAArticle()
    {
        $user = factory("App\User")->create();

        $this->actingAs($user);

        $this->get("/create")
            ->assertSee("Título");
    }

    /** @test */
    public function anUnauthenticatedUserCanEditTheirArticle()
    {
        $this->withExceptionHandling();
        $articleByUser = factory("App\Article")->create();
        $this->get("/edit/{$articleByUser->id}")
            ->assertRedirect("/login");
    }
}
