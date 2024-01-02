<?php
namespace Package\R3m\Io\Autoload\Trait;

use R3m\Io\App;

use R3m\Io\Module\Core;
use R3m\Io\Module\File;

use R3m\Io\Node\Model\Node;

use Exception;
trait Import {

    public function role_system(): void
    {
        $object = $this->object();
        $package = $object->request('package');
        if($package){
            $node = new Node($object);
            $node->role_system_create($package);
        }
    }

    /**
     * @throws Exception
     */
    public function autoload(): void
    {
        $object = $this->object();
        $package = $object->request('package');
        if($package){
            $options = App::options($object);
            $class = 'System.Autoload';
            $options->url = $object->config('project.dir.vendor') .
                $package . '/Data/' .
                $class .
                $object->config('extension.json')
            ;
            $node = new Node($object);
            $response = $node->import($class, $node->role_system(), $options);
            $node->stats($class, $response);
        }
    }

    /**
     * @throws Exception
     */
    public function autoload_prefix(): void
    {
        $object = $this->object();
        $package = $object->request('package');
        if($package){
            $options = App::options($object);
            $class = 'System.Autoload.Prefix';
            $options->url = $object->config('project.dir.vendor') .
                $package . '/Data/' .
                $class .
                $object->config('extension.json')
            ;
            $node = new Node($object);
            $response = $node->import($class, $node->role_system(), $options);
            $node->stats($class, $response);
        }

    }

    /**
     * @throws Exception
     */
    public function config_autoload(): void
    {
        $object = $this->object();
        $options = App::options($object);
        $class = 'System.Config';
        $node = new Node($object);
        $response = $node->record($class, $node->role_system(), []);
        if(
            $response &&
            is_array($response) &&
            array_key_exists('node', $response) &&
            property_exists($response['node'], 'uuid')
        ){
            $patch = (object) [
                'uuid' => $response['node']->uuid,
                'autoload' => '*'
            ];
            $response = $node->patch($class, $node->role_system(), $patch);
            if(
                $response &&
                is_array($response) &&
                array_key_exists('node', $response)
            ){
                echo 'Configured ' . $class . ' autoload...' . PHP_EOL;
            }
        }
    }
}