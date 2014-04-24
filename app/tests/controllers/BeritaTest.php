<?php

use Mockery as m;
use Way\Tests\Factory;

class BeritaTest extends TestCase {

	public function __construct() {
		$this->shit = m::mock('Eloquent', 'Berita');
		$this->collection = m::mock('Illuminate\Database\Eloquent\Collection')->shouldDeferMissing();
	}

	public function setUp()	{
		parent::setUp();
		$this->attributes = Factory::berita(['id' => 1]);
		$this->app->instance('Berita', $this->shit);
	}

	public function tearDown() {
		m::close();
	}

	public function testIndex() {
		$this->shit->shouldReceive('all')->once()->andReturn($this->collection);
		$this->call('GET', 'berita');
		$this->assertViewHas('berita');
	}

	public function testCreate() {
		$this->call('GET', 'berita/create');
		$this->assertResponseOk();
	}

	public function testStore() {
		$this->shit->shouldReceive('create')->once();
		$this->validate(true);
		$this->call('POST', 'berita');
		$this->assertRedirectedToRoute('berita.index');
	}

	public function testStoreFails() {
		$this->shit->shouldReceive('create')->once();
		$this->validate(false);
		$this->call('POST', 'berita');
		$this->assertRedirectedToRoute('berita.create');
		$this->assertSessionHasErrors();
		$this->assertSessionHas('message');
	}

	public function testShow() {
		$this->shit->shouldReceive('findOrFail')
				   ->with(1)
				   ->once()
				   ->andReturn($this->attributes);
		$this->call('GET', 'berita/1');
		$this->assertViewHas('berita');
	}

	public function testEdit() {
		$this->collection->id = 1;
		$this->shit->shouldReceive('find')
				   ->with(1)
				   ->once()
				   ->andReturn($this->collection);
		$this->call('GET', 'berita/1/edit');
		$this->assertViewHas('berita');
	}

	public function testUpdate() {
		$this->shit->shouldReceive('find')
				   ->with(1)
				   ->andReturn(m::mock(['update' => true]));
		$this->validate(true);
		$this->call('PATCH', 'berita/1');
		$this->assertRedirectedTo('berita/1');
	}

	public function testUpdateFails() {
		$this->shit->shouldReceive('find')->with(1)->andReturn(m::mock(['update' => true]));
		$this->validate(false);
		$this->call('PATCH', 'berita/1');
		$this->assertRedirectedTo('berita/1/edit');
		$this->assertSessionHasErrors();
		$this->assertSessionHas('message');
	}

	public function testDestroy() {
		$this->shit->shouldReceive('find')->with(1)->andReturn(m::mock(['delete' => true]));
		$this->call('DELETE', 'berita/1');
	}

	protected function validate($bool) {
		Validator::shouldReceive('make')
				->once()
				->andReturn(m::mock(['passes' => $bool]));
	}
}
