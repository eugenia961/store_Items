<?php

use Phalcon\Cli\Task;
use App\DataFixtures\ItemFixture;
use App\DataFixtures\UserFixture;

final class FixturesLoadTask extends Task {

    public function itemAction() {

        echo 'This is load action from items' . PHP_EOL;

        $itemFixtures = new ItemFixture($this->di);
        $itemFixtures();
    }
    
     public function userAction() {

        echo 'This is load action from users' . PHP_EOL;

        $userFixture = new UserFixture($this->di);
        $userFixture();
    }


}
