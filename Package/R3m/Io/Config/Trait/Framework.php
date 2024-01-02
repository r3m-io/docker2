<?php
namespace Package\R3m\Io\Config\Trait;

use R3m\Io\Module\Event;

use R3m\Io\Node\Model\Node;

use Exception;
trait Framework {


    /**
     * @throws Exception
     */
    public function environment($environment=''): void
    {
        $object = $this->object();
        $package = $object->request('package');

        $node = new Node($object);
        $record = $node->record('System.Config.Framework', $node->role_system(), []);
        if(
            $record &&
            is_array($record) &&
            array_key_exists('node', $record) &&
            is_object($record['node']) &&
            property_exists($record['node'], 'uuid')
        ){
            if(
                property_exists($record['node'], 'environment') &&
                $record['node']->environment !== $environment
            ){
                $patch = (object) [
                    'uuid' => $record['node']->uuid,
                    'environment' => $environment
                ];
                $node->patch('System.Config.Framework', $node->role_system(), $patch, []);
            }
        }
        Event::trigger($object, 'r3m.io.config.framework.environment.set', [
            'environment' => $environment
        ]);
    }
}