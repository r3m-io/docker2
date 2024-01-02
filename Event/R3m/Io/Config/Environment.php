<?php
namespace Event\R3m\Io\Config;

use R3m\Io\App;
use R3m\Io\Config;

use R3m\Io\Module\Core;
use R3m\Io\Module\Dir;

use Exception;

use R3m\Io\Exception\ObjectException;
use R3m\Io\Module\File;

class Environment
{

    /**
     * @throws ObjectException
     * @throws Exception
     */
    public static function set(App $object, $event, $options=[]): void
    {
        $id = $object->config(Config::POSIX_ID);
        if (!empty($id)) {
            return; //only root can execute this.
        }
        if (!array_key_exists('environment', $options)) {
            return;
        }
        $app_flags = App::flags($object);
        $app_options = App::options($object);
        $enable = false;
        if(
            in_array($options['environment'], [
                Config::MODE_PRODUCTION,
                Config::MODE_STAGING,
                Config::MODE_TEST,
                Config::MODE_REPLICA
            ], true)
        ){
            $enable = true;
            if(property_exists($app_options, 'disable-file-permission')){
                $enable = false;
            }
        }
        elseif(
            $options['environment'] === Config::MODE_DEVELOPMENT &&
            property_exists($app_options, 'enable-file-permission') &&
            $app_options->{'enable-file-permission'} === true
        ){
            $enable = true;
        }
        if($enable === false){
            return;
        }
        Core::output_mode(Core::MODE_INTERACTIVE);
        $environment = $options['environment'];
        $url = $object->config('controller.dir.data') . 'Environment' . $object->config('extension.json');
        $config = $object->data_read($url);
        switch($environment){
            case Config::MODE_DEVELOPMENT:
            case Config::MODE_PRODUCTION:
            case Config::MODE_STAGING:
            case Config::MODE_TEST:
            case Config::MODE_REPLICA:
                $environment_select = Config::MODE_PRODUCTION;
                if($environment === Config::MODE_DEVELOPMENT){
                    $environment_select = Config::MODE_DEVELOPMENT;
                }
                $directories = $config->data($environment_select . '.directory');
                $files = $config->data($environment_select . '.file');
                if(is_array($directories)){
                    foreach($directories as $directory){
                        if(
                            property_exists($directory, 'chmod') &&
                            property_exists($directory->chmod, 'file') &&
                            property_exists($directory->chmod, 'directory') &&
                            Dir::is($object->config('project.dir.root') . $directory->name)
                        ) {
                            if (
                                property_exists($directory, 'recursive') &&
                                $directory->recursive === true
                            ) {
                                $command = 'chmod ' .
                                    $directory->chmod->file . ' ' .
                                    $object->config('project.dir.root') .
                                    $directory->name .
                                    ' ' .
                                    '-R';
                                exec($command);
                                echo $command . PHP_EOL;
                                $command = 'cd ' .
                                    $object->config('project.dir.root') .
                                    $directory->name .
                                    $object->config('ds') .
                                    ' && ' .
                                    'chmod ' .
                                    $directory->chmod->directory .
                                    ' ' .
                                    '.'
                                ;;
                                exec($command);
                                echo $command . PHP_EOL;
                                $dir = new Dir();
                                $read = $dir->read(
                                    $object->config('project.dir.root') .
                                    $directory->name,
                                    true
                                );
                                if($read){
                                    foreach($read as $file){
                                        if($file->type === Dir::TYPE){
                                            $command = 'chmod ' .
                                                $directory->chmod->directory . ' ' .
                                                $file->url
                                            ;
                                            exec($command);
                                        }
                                    }
                                    echo $command . PHP_EOL;
                                }
                                $command = 'chown ' .
                                    $directory->owner .
                                    ':' .
                                    $directory->group .
                                    ' ' .
                                    $object->config('project.dir.root') .
                                    $directory->name .
                                    ' ' .
                                    '-R';
                                exec($command);
                                echo $command . PHP_EOL;
                            } else {
                                $command = 'chmod ' .
                                    $directory->chmod->directory . ' ' .
                                    $object->config('project.dir.root') .
                                    $directory->name;
                                exec($command);
                                echo $command . PHP_EOL;
                                $command = 'chown ' .
                                    $directory->owner .
                                    ':' .
                                    $directory->group .
                                    ' ' .
                                    $object->config('project.dir.root') .
                                    $directory->name;
                                exec($command);
                                echo $command . PHP_EOL;
                            }
                        }
                    }
                }
                if(is_array($files)){
                    foreach($files as $file){
                        if(
                            property_exists($file, 'chmod') &&
                            property_exists($file, 'name') &&
                            File::exist($object->config('project.dir.root') . $file->name)
                        ){
                            $command = 'chmod ' .
                                $file->chmod . ' ' .
                                $object->config('project.dir.root') .
                                $file->name;
                            exec($command);
                            echo $command . PHP_EOL;
                            $command = 'chown ' .
                                $file->owner .
                                ':' .
                                $file->group .
                                ' ' .
                                $object->config('project.dir.root') .
                                $file->name;
                            exec($command);
                            echo $command . PHP_EOL;
                        }
                    }
                }
                //chmod every file in application to 666 and adjust the dirs to 777
            break;
            default:
                throw new Exception('Environment not found: ' . $environment);
        }
    }
}