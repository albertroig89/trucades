<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersModuleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    function it_shows_the_users_list()
    {

        factory(User::class)->create([
            'name' => 'Albert Roig',
        ]);

        factory(User::class)->create([
            'name' => 'Laia Barco'
        ]);


        $this->get('/usuarios')
            ->assertStatus(200)
            ->assertSee('Usuaris')
            ->assertSee('Albert')
            ->assertSee('Laia');
    }

    /**
     * @test
     */
    function it_shows_a_default_message_if_there_are_no_users()
    {
        $this->get('/usuarios')
            ->assertStatus(200)
            ->assertSee('No hay usuarios registrados.');
    }

    /**
     * @test
     */
    function it_displays_the_users_details()
    {
        $user = factory(User::class)->create([
            'name' => 'Albert Roig'
        ]);

        $this->get("/usuarios/{$user->id}")// usuarios/5
        ->assertStatus(200)
            ->assertSee('Albert Roig');
    }

    /**
     * @test
     */
    function it_displays_a_404_error_if_the_user_is_not_found()
    {
        $this->get('/usuarios/999')
            ->assertStatus(404)
            ->assertSee('Página no encontrada');
    }

    /**
     * @test
     */
    function it_loads_the_new_users_page()
    {
        $this->get('/usuarios/nuevo')
            ->assertStatus(200)
            ->assertSee('Creacion de usuarios');
    }

    /**
     * @test
     */
    function it_creates_a_new_user()
    {
        $this->withoutExceptionHandling();
//        $profession = Profession::all();
//        dump($profession);
//        $professionId = Profession::where('title', 'Desarrollador back-end')->value('id');
//        dump($professionId);
        $this->post('/usuarios/', [
            'name' => 'Albert',
            'email' => 'albertroiglg@gmail.com',
            'password' => '123456',
        ])->assertRedirect('usuarios');
        //])->assertRedirect(route('users.index')); EL MATEIX QUE LA LINEA ANTERIOR

        $this->assertCredentials([
//            'profession_id' => 1,
            'name' => 'Albert',
            'email' => 'albertroiglg@gmail.com',
            'password' => '123456',
        ]);

//        $this->assertDatabaseHas('user_profiles', [
//            'user_id' => User::findByEmail('albertroiglg@gmail.com')->id,
//        ]);
    }

    /**
     * @test
     */
    function the_name_is_required()
    {
        $this->from('usuarios/nuevo')
            ->post('/usuarios', [
                'name' => '',
                'email' => 'albertroiglg@gmail.com',
                'password' => '123456'
            ])
            ->assertRedirect('usuarios/nuevo')
            ->assertSessionHasErrors(['name' => 'El campo nombre es obligatorio']);

        $this->assertEquals(0, User::count());
    }

    /**
     * @test
     */
    function the_email_is_required()
    {
        $this->from('usuarios/nuevo')
            ->post('/usuarios', [
                'name' => 'Albert Roig',
                'email' => '',
                'password' => '123456'
            ])
            ->assertRedirect('usuarios/nuevo')
            ->assertSessionHasErrors(['email' => 'Introduce un correo electronico']);

        $this->assertEquals(0, User::count());
    }

    /**
     * @test
     */
    function the_email_must_be_valid()
    {
        $this->from('usuarios/nuevo')
            ->post('/usuarios', [
                'name' => 'Albert Roig',
                'email' => 'correo-no-valido',
                'password' => '123456'
            ])
            ->assertRedirect('usuarios/nuevo')
            ->assertSessionHasErrors(['email' => 'Introduce un correo electronico correcto']);

        $this->assertEquals(0, User::count());
    }

    /**
     * @test
     */
    function the_email_must_be_unique()
    {
        factory(USer::class)->create([
            'email' => 'albertroiglg@gmail.com'
        ]);

        $this->from('usuarios/nuevo')
            ->post('/usuarios', [
                'name' => 'Albert Roig',
                'email' => 'albertroiglg@gmail.com',
                'password' => '123456'
            ])
            ->assertRedirect('usuarios/nuevo')
            ->assertSessionHasErrors(['email' => 'El correo introducido ya existe']);

        $this->assertEquals(1, User::count());
    }

    /**
     * @test
     */
    function the_password_is_required()
    {
        $this->from('usuarios/nuevo')
            ->post('/usuarios', [
                'name' => 'Albert Roig',
                'email' => 'albertroiglg@gmail.com',
                'password' => ''
            ])
            ->assertRedirect('usuarios/nuevo')
            ->assertSessionHasErrors(['password' => 'Especifica una contraseña']);

        $this->assertEquals(0, User::count());
    }

    /**
     * @test
     */
    function it_loads_the_edit_user_page()
    {
        $user = factory(User::class)->create();

        $this->get("/usuarios/{$user->id}/editar")
            ->assertStatus(200)
            ->assertSee('Editar usuario')
            ->assertViewIs('users.edit')
            ->assertViewHas('user', function ($viewUser) use ($user) {
                return $viewUser->id == $user->id;
            });
    }

    /**
     * @test
     */
    function it_updates_a_user()
    {
        $user = factory(User::class)->create();

        $this->withoutExceptionHandling();

        $this->put("/usuarios/{$user->id}", [
            'name' => 'Albert',
            'email' => 'albertroiglg@gmail.com',
            'password' => '123456'
        ])->assertRedirect("/usuarios/{$user->id}");
        //])->assertRedirect(route('users.index')); EL MATEIX QUE LA LINEA ANTERIOR

        $this->assertCredentials([
            'name' => 'Albert',
            'email' => 'albertroiglg@gmail.com',
            'password' => '123456'
        ]);
    }

    /**
     * @test
     */
    function the_name_is_required_when_updating_a_user()
    {
        $user = factory(User::class)->create();

        $this->from("usuarios/{$user->id}/editar")
            ->put("usuarios/{$user->id}", [
                'name' => '',
                'email' => 'albertroiglg@gmail.com',
                'password' => '123456'
            ])
            ->assertRedirect("usuarios/{$user->id}/editar")
            ->assertSessionHasErrors(['name']);

        $this->assertDatabaseMissing('users', ['email' => 'albertroiglg@gmail.com']);
    }

    /**
     * @test
     */
    function the_email_must_be_valid_when_updating_the_user()
    {
        $user = factory(User::class)->create();

        $this->from("usuarios/{$user->id}/editar")
            ->put("usuarios/{$user->id}", [
                'name' => 'Albert Roig',
                'email' => 'corre-no-valido',
                'password' => '123456'
            ])
            ->assertRedirect("usuarios/{$user->id}/editar")
            ->assertSessionHasErrors(['email']);

        $this->assertDatabaseMissing('users', ['name' => 'Albert Roig']);
    }

    /**
     * @test
     */
    function the_email_must_be_unique_when_updating_the_user()
    {
        factory(User::class)->create([
            'email' => 'existing-email@example.com'
        ]);

        $user = factory(USer::class)->create([
            'email' => 'albertroiglg@gmail.com'
        ]);

        $this->from("usuarios/{$user->id}/editar")
            ->put("usuarios/{$user->id}", [
                'name' => 'Albert Roig',
                'email' => 'existing-email@example.com',
                'password' => '123456'
            ])
            ->assertRedirect("usuarios/{$user->id}/editar")
            ->assertSessionHasErrors(['email']);
    }

    /**
     * @test
     */
    function the_users_email_can_stay_the_same_when_updating_the_user()
    {

        $user = factory(User::class)->create([
            'email' => 'albertroiglg@gmail.com'
        ]);

        $this->from("usuarios/{$user->id}/editar")
            ->put("usuarios/{$user->id}", [
                'name' => 'Albert Roig',
                'email' => 'albertroiglg@gmail.com',
                'password' => '123456',
            ])
            ->assertRedirect("usuarios/{$user->id}"); // (users.show)

        $this->assertDatabaseHas('users', [
            'name' => 'Albert Roig',
            'email' => 'albertroiglg@gmail.com'
        ]);
    }

    /**
     * @test
     */
    function the_password_is_optional_when_updating_the_user()
    {
        $oldPassword = 'clave_anterior';

        $user = factory(User::class)->create([
            'password' => bcrypt($oldPassword)
        ]);

        $this->from("usuarios/{$user->id}/editar")
            ->put("usuarios/{$user->id}", [
                'name' => 'Albert Roig',
                'email' => 'albertroiglg@gmail.com',
                'password' => '',
            ])
            ->assertRedirect("usuarios/{$user->id}"); // (users.show)

        $this->assertCredentials([
            'name' => 'Albert Roig',
            'email' => 'albertroiglg@gmail.com',
            'password' => $oldPassword
        ]);
    }

    /**
     * @test
     */
    function it_deletes_a_user()
    {
        $user = factory(User::class)->create();

        $this->delete("usuarios/{$user->id}")
            ->assertRedirect('usuarios');

        $this->assertDatabaseMissing('users', [
            'id' => $user->id
        ]);
    }
}
