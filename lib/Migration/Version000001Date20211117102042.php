<?php

declare(strict_types=1);

namespace OCA\TestMigrationSkeletonApp\Migration;

use Closure;
use OCP\DB\ISchemaWrapper;
use OCP\IDBConnection;
use OCP\Migration\IOutput;
use OCP\Migration\SimpleMigrationStep;

/**
 * Auto-generated migration step: Please modify to your needs!
 */
class Version000001Date20211117102042 extends SimpleMigrationStep
{
	/** @var IDBConnection */
	protected $db;

	public function __construct(IDBConnection $db)
	{
		$this->db = $db;
	}

	/**
	 * @param IOutput $output
	 * @param Closure $schemaClosure The `\Closure` returns a `ISchemaWrapper`
	 * @param array $options
	 * @return null|ISchemaWrapper
	 */
	public function changeSchema(IOutput $output, Closure $schemaClosure, array $options): ?ISchemaWrapper
	{
		/** @var ISchemaWrapper */
		$schema = $schemaClosure();

		if (!$schema->hasTable('migration_test_users')) {
			$table = $schema->createTable('migration_test_users');
			$table->addColumn('user_id', 'integer', [
				'notnull' => true,
				'autoincrement' => true,
			]);

			$table->addColumn('username', 'string', [
				'notnull' => true,
				'length' => 10,
				'default' => '',
			]);

			$table->addColumn('password', 'string', [
				'notnull' => true,
				'length' => 10,
				'default' => '',
			]);

			$table->addColumn('status', 'boolean', [
				'notnull' => true,
				'default' => true,
			]);

			$table->setPrimaryKey(['user_id']);
		}

		return $schema;
	}
}
