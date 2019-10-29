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

}
