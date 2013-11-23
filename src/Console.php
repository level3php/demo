<?php

use Cilex\Provider\Console\Adapter\Silex\ConsoleServiceProvider;
use Doctrine\ORM\Tools\Console\Command as ORMCommand;
use Doctrine\ORM\Tools\Console\Helper as ORMHelper;
use Doctrine\DBAL\Tools\Console\Command as DBALCommand;
use Doctrine\DBAL\Tools\Console\Helper as DBALHelper;

$app->register(new ConsoleServiceProvider(), [
    'console.name' => 'Level3\Demo',
    'console.version' => '1.0.0'
]);

$app['console']->setHelperSet(new Symfony\Component\Console\Helper\HelperSet([
    'db' => new DBALHelper\ConnectionHelper($app['db']),
    'em' => new ORMHelper\EntityManagerHelper($app['orm.em'])
]));

$app['console']->addCommands([
  new ORMCommand\ClearCache\MetadataCommand,
  new ORMCommand\ClearCache\QueryCommand,
  new ORMCommand\ClearCache\ResultCommand,
  new ORMCommand\SchemaTool\CreateCommand,
  new ORMCommand\SchemaTool\DropCommand,
  new ORMCommand\SchemaTool\UpdateCommand,
  new ORMCommand\ConvertDoctrine1SchemaCommand,
  new ORMCommand\ConvertMappingCommand,
  new ORMCommand\EnsureProductionSettingsCommand,
  new ORMCommand\GenerateEntitiesCommand,
  new ORMCommand\GenerateProxiesCommand,
  new ORMCommand\GenerateRepositoriesCommand,
  new ORMCommand\InfoCommand,
  new ORMCommand\RunDqlCommand,
  new ORMCommand\ValidateSchemaCommand,
  new DBALCommand\ImportCommand,
  new DBALCommand\ReservedWordsCommand,
  new DBALCommand\RunSqlCommand
]);


return $app['console'];
