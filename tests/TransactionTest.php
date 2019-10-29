<?php
/**
 * Class to do test for transaction operation, 
 * consisting of whether creation of transaction is possible, one time only limit
 */
class TransactionTest extends TestCase
{
    /**
     * Test should be able to create a new transaction
     *
     * @return void
     */
    public function testShouldCreateTransaction()
    {
        $parameters = [
            'user_id' => 1,
            'daily_reward_id' => 1,
        ];
        $this->post('transaction/add', $parameters, []);
        $this->seeStatusCode(200);
        $this->seeJson(
            [
                'daily_reward_id' => 1,
                'user_id' => 1,
            ]
        );
        $this->seeJsonStructure(
            [
                'id',
                'user_id',
                'daily_reward_id',
                'reward_amount',
                'created_at',
                'updated_at',
            ]
        );
    }
    /**
     * Test wheteher user can only receive a reward once
     *
     * @return void
     */
    public function testUserCanOnlyReceiveRewardsOnce()
    {
        $parameters = [
            'user_id' => 1,
            'daily_reward_id' => 1,
        ];
        $this->post('transaction/add', $parameters, []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            [
                'message',
            ]
        );
    }
}
