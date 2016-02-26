<?php
namespace SolutionORM;

use SolutionORM\Controllers\AbstractController,
    SolutionORM\Controllers\StructureController,
    SolutionORM\Interfaces\CacheController,
    SolutionORM\Controllers\StructureConventionController;

/** Database representation
* @property-write mixed $debug = false Enable debugging queries, true for error_log($query), callback($query, $parameters) otherwise
* @property-write bool $freeze = false Disable persistence
* @property-write string $rowClass = 'NotORM_Row' Class used for created objects
* @property-write bool $jsonAsArray = false Use array instead of object in Result JSON serialization
* @property-write string $transaction Assign 'BEGIN', 'COMMIT' or 'ROLLBACK' to start or stop transaction
*/
class SolutionORM extends AbstractController {
	
	/** Create database representation
	* @param PDO
	* @param NotORM_Structure or null for new NotORM_Structure_Convention
	* @param NotORM_Cache or null for no cache
	*/
	function __construct(PDO $connection, StructureController $structure = null, CacheController $cache = null) {

		$this->connection = $connection;
		$this->driver = $connection->getAttribute(PDO::ATTR_DRIVER_NAME);
		if (!isset($structure)) {
			$structure = new StructureConventionController;
		}
		$this->structure = $structure;
		$this->cache = $cache;
	}
	
	/** Get table data to use as $db->table[1]
	* @param string
	* @return NotORM_Result
	*/
	function __get($table) {
		return new Result($this->structure->getReferencingTable($table, ''), $this, true);
	}
	
	/** Set write-only properties
	* @return null
	*/
	function __set($name, $value) {
		if ($name == "debug" || $name == "debugTimer" || $name == "freeze" || $name == "rowClass" || $name == "jsonAsArray") {
			$this->$name = $value;
		}
		if ($name == "transaction") {
			switch (strtoupper($value)) {
				case "BEGIN": return $this->connection->beginTransaction();
				case "COMMIT": return $this->connection->commit();
				case "ROLLBACK": return $this->connection->rollback();
			}
		}
	}
	
	/** Get table data
	* @param string
	* @param array (["condition"[, array("value")]]) passed to NotORM_Result::where()
	* @return NotORM_Result
	*/
	function __call($table, array $where) {
		$return = new Result($this->structure->getReferencingTable($table, ''), $this);
		if ($where) {
			call_user_func_array(array($return, 'where'), $where);
		}
		return $return;
	}
	
}
