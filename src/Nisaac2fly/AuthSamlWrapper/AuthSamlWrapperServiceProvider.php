<?php namespace Nisaac2fly\AuthSamlWrapper;

use App\User;
use Exception;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use SimpleSAML_Auth_Simple;

class AuthSamlWrapperServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../../config/saml.php' => config_path('saml.php'),
        ]);

        AliasLoader::getInstance()->alias(
            'Saml',
            'Nisaac2fly\AuthSamlWrapper\SamlFacade'
        );
    }

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        if ($this->isPackage('simplesaml'))
        {
            $this->registerSimpleSaml();
        }
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return [];
	}

    private function registerSimpleSaml()
    {
        $autoload = base_path(config('saml.simplesaml.autoload'));

        if ( ! \File::exists($autoload))
        {
            throw new Exception('Simple Saml autoload file could not be found. Check configuration.');
        }

        require_once $autoload;

        $this->app->singleton('Nisaac2fly\AuthSamlWrapper\Contracts\SimpleSaml', function ()
        {
            return new SimpleSAML_Auth_Simple(config('saml.simplesaml.source'));;
        });

        $this->app->singleton('Nisaac2fly\AuthSamlWrapper\Contracts\Saml', function()
        {
            return new SimpleSaml($this->app['Nisaac2fly\AuthSamlWrapper\Contracts\SimpleSaml']);
        });

        $this->app->singleton('App\User', function ()
        {
            return new User((array) $this->app['Nisaac2fly\AuthSamlWrapper\Contracts\Saml']->attributes());
        });
    }

    /**
     * Check for package name in configuration
     *
     * @return bool
     */
    private function isPackage($package)
    {
        return config('saml.package') == $package;
    }

}
