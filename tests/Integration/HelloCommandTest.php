<?php

namespace Tests\Unit;

use App\Commands\ChangeloggerCommand;
use Tests\TestCase;

class HelloCommandTest extends TestCase
{
    /** @test */
    public function it_checks_the_hello_command_output(): void
    {
        $this->app->call((new ChangeloggerCommand())->getName());

        $this->assertTrue(strpos($this->app->output(), 'Love beautiful code? We do too.') !== false);
    }
}
