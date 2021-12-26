<?php

class DB {

	/** MySQL database name */
	const DB_NAME = 'sentence_examples';

	/** MySQL database username */
	const DB_USER = 'leon';

	/** MySQL database password */
	const DB_PASSWORD = 'rockpapermariadb';

	/** MySQL hostname */
	const DB_HOST = 'localhost';

	/** Database charset to use in creating database tables. */
	const DB_CHARSET = 'utf8';

	public $pdo;

	public function __construct()
	{
		$dsn = "mysql:host=". self::DB_HOST .";dbname=". self::DB_NAME .";charset=". self::DB_CHARSET;
		
		$options = [
			PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			PDO::ATTR_EMULATE_PREPARES   => false,
		];
		
		try {
			$this->pdo = new PDO($dsn, self::DB_USER, self::DB_PASSWORD, $options);
		} catch (\PDOException $e) {
			throw new \PDOException($e->getMessage(), (int)$e->getCode());
		}

	}

}

