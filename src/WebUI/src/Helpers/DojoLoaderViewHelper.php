<?php
/**
 * Created by PhpStorm.
 * User: USER_T
 * Date: 06.08.2018
 * Time: 18:32
 */

namespace rollun\webUI\Helpers;


use Exception;
use Zend\View\Helper\AbstractHelper;

class DojoLoaderViewHelper extends AbstractHelper
{
    protected $rgridVersion = '0.4.22';
    protected $rollunRqlVersion = '0.3.8';
    protected $debugMode = false;

    protected $packages = [
        [
            'name' => 'dstore',
            'location' => 'https://cdn.jsdelivr.net/npm/dojo-dstore@1.x'
        ],
        [
            'name' => 'dgrid',
            'location' => 'https://cdn.jsdelivr.net/npm/dgrid@1.x'
        ],
        [
            'name' => 'dijit',
            'location' => 'https://cdn.jsdelivr.net/npm/dijit@1.x'
        ],
        [
            'name' => 'dojox',
            'location' => 'https://cdn.jsdelivr.net/npm/dojox@1.x'
        ],
        [
            'name' => 'promised-io',
            'location' => 'https://cdn.jsdelivr.net/npm/promised-io@0.x'
        ],
    ];

    /**
     * @param $libName {string} -
     * @param $version {string} - semver string with required rgrid version;
     * @throws Exception
     */
    public function changeVersion($libName, $version)
    {
        switch ($libName) {
            case 'rgrid':
                {
                    $this->rgridVersion = $version;
                    break;
                }
            case 'rollun-rql':
                {
                    $this->rollunRqlVersion = $version;
                }
            default:
                {
                    throw new Exception("$libName is not a valid lib name");
                }
        }

    }

    public function getVersions()
    {
        return [
            'rgrid' => $this->rgridVersion,
            'rollun-rql' => $this->rollunRqlVersion
        ];
    }

    public function register($packageName, $url)
    {
        $this->packages[] = ['name' => $packageName, 'location' => $url];
    }

    public function multiRegister($packages)
    {
        foreach ($packages as $package) {
            $this->register($package['name'], $package['location']);
        }
    }

    public function setDebug($isDebug)
    {
        $this->debugMode = $isDebug;
    }

    public function addLoader()
    {

        $rgridUrl = "https://cdn.jsdelivr.net/npm/rgrid@$this->rgridVersion/lib";
        $rollunRqlUrl = "https://cdn.jsdelivr.net/npm/rgrid@$this->rollunRqlVersion/";
        $rgridExamplesUrl = "https://cdn.jsdelivr.net/npm/rgrid@$this->rgridVersion/example";
        $rgridConfigUrl = $this->getRgridConfigUrl();
        $this->multiRegister([
            [
                'name' => 'rgrid',
                'location' => $rgridUrl,
            ],
            [
                'name' => 'rql',
                'location' => $rollunRqlUrl,
            ],
            [
                'name' => 'rgrid-examples',
                'location' => $rgridExamplesUrl,
            ],
            [
                'name' => 'config',
                'location' => $rgridConfigUrl
            ]
        ]);
        $view = $this->getView();
        $dojoConfigString = $this->generateDojoConfig();
        $view->headScript()->appendScript("var dojoConfig = JSON.parse('$dojoConfigString');");
        $view->headLink()->appendStylesheet('https://ajax.googleapis.com/ajax/libs/dojo/1.11.1/dojo/resources/dojo.css')
             ->appendStylesheet("https://cdn.jsdelivr.net/npm/rgrid@$this->rgridVersion/themes/flat/flat.css");
        $view->headScript()->appendFile('https://ajax.googleapis.com/ajax/libs/dojo/1.11.1/dojo/dojo.js');
        $view->inlineScript()->appendScript("require(['dojo/dom-class','dojo/_base/window'], 
                                          (domClass, window) => {domClass.add(window.body(), 'flat');});");
    }

    protected function getRgridConfigUrl()
    {
        return "http://$_SERVER[HTTP_HOST]/";
    }

    protected function generateDojoConfig()
    {
        $packagesJson = $this->generatePackagesJson();
        $isDebug = $this->debugMode ? "true" : 'false';
        return "{\"async\": true, \"isDebug\": $isDebug, \"packages\": $packagesJson}";
    }

    protected function generatePackagesJson()
    {
        return json_encode($this->packages);
    }
}