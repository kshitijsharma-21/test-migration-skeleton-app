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
class Version000001Date20211117102055 extends SimpleMigrationStep
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

		if ($schema->hasTable('migration_test_users')) {
			$table = $schema->getTable('migration_test_users');
			$table->addColumn('user_status', 'boolean', [
				'notnull' => true,
				'default' => true,
			]);
		}

		return $schema;
	}

	/**
	 * @param \Closure $schemaClosure The `\Closure` returns a `ISchemaWrapper`
	 * @param array $options
	 * @since 13.0.0
	 */
	public function postSchemaChange(IOutput $output, \Closure $schemaClosure, array $options): void
	{
		/** @var ISchemaWrapper */
		$schema = $schemaClosure();
		$query = $this->db->getQueryBuilder();
		if ($schema->hasTable('migration_test_users')) {
			$query->update('migration_test_users')
					->set('user_status', 'status');
			$query->execute();
		}
	}
}
