<?php

namespace Pantheon\Terminus\UnitTests\Commands\Import;

use Pantheon\Terminus\Commands\Import\DatabaseCommand;
use Pantheon\Terminus\Models\Workflow;
use Pantheon\Terminus\UnitTests\Commands\CommandTestCase;

/**
 * Class DatabaseCommandTest
 * Testing class for Pantheon\Terminus\Commands\Import\DatabaseCommand
 * @package Pantheon\Terminus\UnitTests\Commands\Import
 */
class DatabaseCommandTest extends CommandTestCase
{
    /**
     * @inheritdoc
     */
    protected function setup()
    {
        parent::setUp();
        $this->command = new DatabaseCommand($this->getConfig());
        $this->command->setSites($this->sites);
        $this->command->setLogger($this->logger);
        $this->command->setInput($this->input);
    }
    
    /**
     * Exercises import:database command with a valid URL
     */
    public function testImportValidURL()
    {
        $workflow = $this->getMockBuilder(Workflow::class)
            ->disableOriginalConstructor()
            ->getMock();
        $site_name = 'site_name';
        $this->environment->id = 'env_id';
        $valid_url = 'a_valid_url';

        $this->environment->expects($this->once())
            ->method('importDatabase')
            ->with($this->equalTo($valid_url))
            ->willReturn($workflow);
        $workflow->expects($this->once())
            ->method('checkProgress')
            ->with()
            ->willReturn(true);
        $this->site->expects($this->once())
            ->method('get')
            ->with($this->equalTo('name'))
            ->willReturn($site_name);
        $this->logger->expects($this->once())
            ->method('log')->with(
                $this->equalTo('notice'),
                $this->equalTo('Imported database to {site}.{env}.'),
                $this->equalTo(['site' => $site_name, 'env' => $this->environment->id,])
            );

        $out = $this->command->import("$site_name.{$this->environment->id}", $valid_url);
        $this->assertNull($out);
    }
}
