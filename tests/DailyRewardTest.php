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
    /**
     * Assert creation test should return correct value 
     *
     * @return void
     */
    public function testShouldCreateDailyRewards()
    {
        $parameters = [
            'starting_value' => 20000,

        ];
        $this->post('daily-rewards/add', $parameters, []);
        $this->seeStatusCode(200);
        $this->seeJson(
            [
                'starting_value' => 20000,
                'current_value' => 20000
            ]
        );
    }
}
