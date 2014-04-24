<?php

use Mockery as m;
use Way\Tests\Factory;

class KecamatanTest extends TestCase {

	public function __construct() {
		$this->shit = m::mock('Eloquent', 'Kecamatan');
		$this->collection = m::mock('Illuminate\Database\Eloquent\Collection')->shouldDeferMissing();
	}

	public function setUp()	{
		parent::setUp();
		$this->attributes = Factory::kecamatan(['id' => 1]);
		$this->app->instance('Kecamatan', $this->shit);
	}

	public function tearDown() {
		m::close();
	}

	public function testIndex() {
		$this->shit->shouldReceive('all')->once()->andReturn($this->collection);
		$this->call('GET', 'kecamatan');
		$this->assertViewHas('kecamatan');
	}

	public function testCreate() {
		$this->call('GET', 'kecamatan/create');
		$this->assertResponseOk();
	}

	public function testStore() {
		$this->shit->shouldReceive('create')->once();
		$this->validate(true);
		$this->call('POST', 'kecamatan');
		$this->assertRedirectedToRoute('kecamatan.index');
	}

	public function testStoreFails() {
		$this->shit->shouldReceive('create')->once();
		$this->validate(false);
		$this->call('POST', 'kecamatan');
		$this->assertRedirectedToRoute('kecamatan.create');
		$this->assertSessionHasErrors();
		$this->assertSessionHas('message');
	}

	public function testShow() {
		$this->shit->shouldReceive('findOrFail')
				   ->with(1)
				   ->once()
				   ->andReturn($this->attributes);
		$this->call('GET', 'kecamatan/1');
		$this->assertViewHas('kecamatan');
	}

	public function testEdit() {
		$this->collection->id = 1;
		$this->shit->shouldReceive('find')
				   ->with(1)
				   ->once()
				   ->andReturn($this->collection);
		$this->call('GET', 'kecamatan/1/edit');
		$this->assertViewHas('kecamatan');
	}

	public function testUpdate() {
		$this->shit->shouldReceive('find')
				   ->with(1)
				   ->andReturn(m::mock(['update' => true]));
		$this->validate(true);
		$this->call('PATCH', 'kecamatan/1');
		$this->assertRedirectedTo('kecamatan/1');
	}

	public function testUpdateFails() {
		$this->shit->shouldReceive('find')->with(1)->andReturn(m::mock(['update' => true]));
		$this->validate(false);
		$this->call('PATCH', 'kecamatan/1');
		$this->assertRedirectedTo('kecamatan/1/edit');
		$this->assertSessionHasErrors();
		$this->assertSessionHas('message');
	}

	public function testDestroy() {
		$this->shit->shouldReceive('find')->with(1)->andReturn(m::mock(['delete' => true]));
		$this->call('DELETE', 'kecamatan/1');
	}

	protected function validate($bool) {
		Validator::shouldReceive('make')
				->once()
				->andReturn(m::mock(['passes' => $bool]));
	}
}
