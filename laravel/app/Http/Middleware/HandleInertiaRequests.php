<?php
namespace App\Http\Middleware;

use App\DTOs\Breadcrumb;
use Inertia\Middleware;
use Illuminate\Http\Request;
use Throwable;
use Diglactic\Breadcrumbs\Breadcrumbs;
use App\Services\MenuGenerationService;

class HandleInertiaRequests extends Middleware
{
    protected $rootView = 'layouts/inertia';

    private function getTitle()
    {
        try {
            $breadcrumb = Breadcrumbs::current();
            if ($breadcrumb === null) {
                return __('general.appName');
            } else {
                return $breadcrumb->title.' – '.__('general.appName');
            }
        } catch (Throwable $e) {
            return __('general.appName');
        }
    }

    public function share(Request $request): array
    {
        //Die share methode wird vor den Controllern aufgerufen. Wenn Code erst nach dem Ausführen des Controllers evaluiert werden soll, muss dieser als Callable zurückgegeben werden

        return array_merge(parent::share($request), [
            'auth' => [
                'user' => $request->user(),
            ],
            'flash' => [
                'success' => fn () => $request->session()->get('alert-success'),
                'error' => fn () => $request->session()->get('alert-danger'),
                'warning' => fn () => $request->session()->get('alert-warning'),
                'info' => fn () => $request->session()->get('alert-info'),
            ],
            'breadcrumbs' => fn () => Breadcrumb::collect(Breadcrumbs::generate()),
            'locale' => app()->getLocale(),
            'title' => $this->getTitle(),
            'version' => config('app.version'),
            'menu' => fn () => app(MenuGenerationService::class)->generateMenu(),
            'unreadNotificationsCount' => fn () => $request->user()->unreadNotifications()->count()
        ]);
    }

}
