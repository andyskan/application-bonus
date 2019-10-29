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

}
