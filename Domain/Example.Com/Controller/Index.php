<?php
namespace Domain\Example_Com\Controller;

use R3m\Io\App;

use R3m\Io\Module\Cache;
use R3m\Io\Module\Controller;

use Exception;

use R3m\Io\Exception\FileWriteException;
use R3m\Io\Exception\ObjectException;
use R3m\Io\Exception\LocateException;
use R3m\Io\Exception\UrlEmptyException;
use R3m\Io\Exception\UrlNotExistException;

class Index extends Controller {
    const DIR = __DIR__ . DIRECTORY_SEPARATOR;
    const HTML = 'Html';
    const JSON = 'Json';
    const MAIN = 'Main';
    const NAME = 'Index';

    const CACHE_ROUTE_REQUEST_EXPOSE = [
        'page'
    ];

    /**
     * @throws ObjectException
     * @throws UrlEmptyException
     * @throws UrlNotExistException
     * @throws FileWriteException
     * @throws LocateException
     * @throws Exception
     */
    public static function main(App $object): string
    {
        $start = microtime(true);
        if(App::contentType($object) == App::CONTENT_TYPE_HTML){
            $cache_key = Cache::key($object, [
                'name' => Cache::name($object, [
                    'type' => Cache::ROUTE,
                    'extension' => $object->config('extension.html'),
                    'expose' => Index::CACHE_ROUTE_REQUEST_EXPOSE
                ]),
                'ttl' => Cache::INF,
                'route' => true, // key based on route
                'host' => true, // key based on host
                'expose' => Index::CACHE_ROUTE_REQUEST_EXPOSE
            ]);
            $url = $object->config('controller.dir.data') .
                Index::NAME .
                $object->config('ds') .
                Index::HTML .
                $object->config('ds') .
                ucfirst(__FUNCTION__) .
                $object->config('extension.json')
            ;
            $view = Cache::read($object, [
                'key' => $cache_key,
                'ttl' => Cache::INF,
            ]);
            if($view === null){
                Index::parse_read($object, $url);
                $object->set('template.name', Index::MAIN . '/' . Index::MAIN);
                $url = Index::locate($object);
                $view = Index::response($object, $url);
                Cache::write($object, [
                    'key' => $cache_key,
                    'data' => $view
                ]);
            }
        } else {
            $cache_key = Cache::key($object, [
                'name' => Cache::name($object, [
                    'type' => Cache::ROUTE,
                    'extension' => $object->config('extension.json'),
                    'expose' => Index::CACHE_ROUTE_REQUEST_EXPOSE
                ]),
                'ttl' => Cache::INF,
                'route' => true, // key based on route
                'expose' => Index::CACHE_ROUTE_REQUEST_EXPOSE
            ]);
            $url = $object->config('controller.dir.data') .
                Index::NAME .
                $object->config('ds') .
                Index::JSON .
                $object->config('ds') .
                ucfirst(__FUNCTION__) .
                $object->config('extension.json')
            ;
            $view = Cache::read($object, [
                'key' => $cache_key,
                'ttl' => Cache::INF,
            ]);
            if($view === null){
                Index::parse_read($object, $url);
                $url = Index::locate($object);
                $view = Index::response($object, $url);
                Cache::write($object, [
                    'key' => $cache_key,
                    'data' => $view
                ]);
            }
        }
        $duration = microtime(true) - $start;
        if($object->config('project.log.name')){
            $object->logger($object->config('project.log.name'))->info('Duration: ' . $duration, [ $cache_key ]);
        }
        return $view;
    }
}
