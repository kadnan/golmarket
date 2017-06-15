<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;

class HomePageTest extends DuskTestCase {

	/**
	 * A Dusk test example.
	 *
	 * @return void
	 */
	public function testHomePageTitle() {
		$this->browse( function ( Browser $browser ) {
			$browser->visit( '/' )
			        ->assertTitle( 'Welcome to Me' );
		} );
	}
}
