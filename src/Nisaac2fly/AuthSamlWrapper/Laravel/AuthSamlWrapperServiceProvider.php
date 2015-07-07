<?php namespace Nisaac2fly\AuthSamlWrapper\Laravel;

use Exception;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Nisaac2fly\AuthSamlWrapper\SimpleSaml\Guard;
use SimpleSAML_Auth_Simple;

class AuthSamlWrapperServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = true;

    /**
     *
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../../config/saml.php' => config_path('saml.php'),
        ]);

        AliasLoader::getInstance()->alias(
            'Saml',
            'Nisaac2fly\AuthSamlWrapper\Laravel\SamlFacade'
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
		return ['Nisaac2fly\AuthSamlWrapper\Contracts\Saml'];
	}

    /**
     * Register SimpleSAMLphp
     *
     * @throws Exception
     */
    private function registerSimpleSaml()
    {
        $autoload = base_path(config('saml.simplesaml.autoload'));

        if ( ! \File::exists($autoload))
        {
            throw new Exception('Simple Saml autoload file could not be found. Check configuration.');
        }

        require_once $autoload;

        $this->app->singleton('Nisaac2fly\AuthSamlWrapper\Contracts\Saml', function()
        {
            return new Guard(new SimpleSAML_Auth_Simple(config('saml.simplesaml.source')));
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
