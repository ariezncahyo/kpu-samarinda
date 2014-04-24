<?php

use Mockery as m;
use Way\Tests\Factory;

class TpsTest extends TestCase {

	public function __construct() {
		$this->shit = m::mock('Eloquent', 'Tps');
		$this->collection = m::mock('Illuminate\Database\Eloquent\Collection')->shouldDeferMissing();
	}

	public function setUp()	{
		parent::setUp();
		$this->attributes = Factory::tps(['id' => 1]);
		$this->app->instance('Tps', $this->shit);
	}

	public function tearDown() {
		m::close();
	}

	public function testIndex() {
		$this->shit->shouldReceive('all')->once()->andReturn($this->collection);
		$this->call('GET', 'tps');
		$this->assertViewHas('tps');
	}

	public function testCreate() {
		$this->call('GET', 'tps/create');
		$this->assertResponseOk();
	}

	public function testStore() {
		$this->shit->shouldReceive('create')->once();
		$this->validate(true);
		$this->call('POST', 'tps');
		$this->assertRedirectedToRoute('tps.index');
	}

	public function testStoreFails() {
		$this->shit->shouldReceive('create')->once();
		$this->validate(false);
		$this->call('POST', 'tps');
		$this->assertRedirectedToRoute('tps.create');
		$this->assertSessionHasErrors();
		$this->assertSessionHas('message');
	}

	public function testShow() {
		$this->shit->shouldReceive('findOrFail')
				   ->with(1)
				   ->once()
				   ->andReturn($this->attributes);
		$this->call('GET', 'tps/1');
		$this->assertViewHas('tps');
	}

	public function testEdit() {
		$this->collection->id = 1;
		$this->shit->shouldReceive('find')
				   ->with(1)
				   ->once()
				   ->andReturn($this->collection);
		$this->call('GET', 'tps/1/edit');
		$this->assertViewHas('tps');
	}

	public function testUpdate() {
		$this->shit->shouldReceive('find')
				   ->with(1)
				   ->andReturn(m::mock(['update' => true]));
		$this->validate(true);
		$this->call('PATCH', 'tps/1');
		$this->assertRedirectedTo('tps/1');
	}

	public function testUpdateFails() {
		$this->shit->shouldReceive('find')->with(1)->andReturn(m::mock(['update' => true]));
		$this->validate(false);
		$this->call('PATCH', 'tps/1');
		$this->assertRedirectedTo('tps/1/edit');
		$this->assertSessionHasErrors();
		$this->assertSessionHas('message');
	}

	public function testDestroy() {
		$this->shit->shouldReceive('find')->with(1)->andReturn(m::mock(['delete' => true]));
		$this->call('DELETE', 'tps/1');
	}

	protected function validate($bool) {
		Validator::shouldReceive('make')
				->once()
				->andReturn(m::mock(['passes' => $bool]));
	}
}
