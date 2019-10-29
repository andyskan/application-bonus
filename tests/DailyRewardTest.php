<?php
/**
 * Extends cla
 */
class DailyRewardsTest extends TestCase
{
    /**
     * Return all the user from the database
     *
     * @return void
     */
    public function testShouldReturnAllDailyRewards()
    {
        $this->get("daily-rewards/all", []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            [
                '*' =>
                [
                    'id',
                    'starting_value',
                    'current_value',
                    'created_at',
                    'updated_at',

                ],
            ]
        );
    }
}
