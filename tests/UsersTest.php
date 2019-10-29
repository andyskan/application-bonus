<?php
/**
 * Extends cla
 */
class UsersTest extends TestCase
{
    /**
     * Return all the user from the database
     *
     * @return void
     */
    public function testShouldReturnAllUser()
    {
        $this->get("user/all", []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            [
                '*' =>
                [
                    'id',
                    'name',
                    'low_range',
                    'top_range',
                    'created_at',
                    'updated_at',

                ],
            ]
        );
    }
    /**
     * Test that test should return a user
     *
     * @return void
     */
    public function testShouldReturnUser()
    {
        $this->get("user/1", []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            [
                'id',
                'name',
                'low_range',
                'top_range',
                'created_at',
                'updated_at',

            ]
        );
    }
    /**
     * Test Should return the correct user structure
     *
     * @return void
     */
    public function testShouldCreateUser()
    {
        $parameters = [
            'name' => 'Andy',
            'low_range' => 20000,
            'top_range' => 30000,
        ];
        $this->post('user/add', $parameters, []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            [
                'id',
                'name',
                'low_range',
                'top_range',
                'created_at',
                'updated_at',
            ]
        )
            ->seeJson(
                [
                    'name' => 'Andy',
                ]
            );
    }
    /**
     * Test should be able to update user
     *
     * @return void
     */
    public function testShouldUpdateUser()
    {
        $parameters = [
            'name' => 'Andy Kan',
            'low_range' => 20000,
            'top_range' => 30000,
        ];
        $this->put('user/update/4', $parameters, []);
        $this->seeStatusCode(200)
            ->seeJson(
                [
                    'name' => 'Andy Kan',
                ]
            );

    }
}
