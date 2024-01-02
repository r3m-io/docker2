<?php
namespace Middleware\Maintenance\Middleware;

use R3m\Io\App;

use R3m\Io\Module\Controller;
use R3m\Io\Module\Data;
use R3m\Io\Module\Destination;
use R3m\Io\Module\Dir;

use Exception;

use R3m\Io\Exception\FileWriteException;
use R3m\Io\Exception\LocateException;
use R3m\Io\Exception\ObjectException;
use R3m\Io\Exception\UrlEmptyException;
use R3m\Io\Exception\UrlNotExistException;

class Maintenance extends Controller {
    const DIR = __DIR__ . DIRECTORY_SEPARATOR;

    /**
     * @throws LocateException
     * @throws ObjectException
     * @throws FileWriteException
     * @throws UrlEmptyException
     * @throws UrlNotExistException
     * @throws Exception
     */
    public static function run(App $object, Destination $destination, Data $middleware, $options=[]): Destination
    {
        if($destination === null){
            $destination = new Destination();
        }
        $method = $destination->get('method');

        if(in_array('CLI', $method)){
            // don't forget to turn off the cron-jobs
            return $destination;
        }
        $dir = Dir::name(Maintenance::DIR) . Controller::TEMPLATE;
        $template = (object) [
            'name' => 'Maintenance',
            'dir' => $dir
        ];
        $url = Maintenance::locate($object, $template);
        $response = Maintenance::response($object, $url);
        echo $response . PHP_EOL;
        exit;
    }
}