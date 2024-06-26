<?php

namespace Modules\Cms\App\Http\Controllers\Frontend;

use Modules\Core\App\Http\Controllers\BaseController;
use Modules\Cms\App\Models\CmsDomain;
use Modules\Cms\App\Forms\CmsDomainForm;
use Modules\Cms\App\Http\Requests\CmsDomainRequest;
use Facuz\Theme\Contracts\Theme;

class Controller extends BaseController
{
    protected $locale;
    public $domain;
    public $theme;
    public $seo;

    public function __construct(Theme $theme)
    {
        $this->domain = resolve('CmsDomain');
        $this->theme = $theme->layout('default');
        $this->locale = app()->getLocale();
        $this->seo = app('SeoManager');
    }

    /**
     * @param $view
     * @param $data
     * @return \Illuminate\Http\Response
     */
    public function view($view, $data = [])
    {
        return $this->theme->scope($view, $data)->render();
    }
}
