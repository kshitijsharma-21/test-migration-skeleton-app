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
class Version000001Date20211117102065 extends SimpleMigrationStep
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
        /** @var ISchemaWrapper $schema */
        $schema = $schemaClosure();

		if ($schema->hasTable('migration_test_users')) {
			$table = $schema->getTable('migration_test_users');
			$table->dropColumn('status');
		}

        return $schema;
	}
}
