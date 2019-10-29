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
     * Test Should return the correct user
     *
     * @return void
     */
    public function testShouldCreateUser()
    {
        $parameters = [
            'name' => 'Andy',
            'low_range' => 20000,
            'top_range' => 30000
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
            );
    }
}
