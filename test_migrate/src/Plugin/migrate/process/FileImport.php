<?php

namespace Drupal\eminent_migrate\Plugin\migrate\process;

use Drupal\migrate\MigrateExecutableInterface;
use Drupal\migrate\ProcessPluginBase;
use Drupal\migrate\Row;

/**
 * Example on how to migrate an image from any place in Drupal.
 *
 * @MigrateProcessPlugin(
 *   id = "file_import"
 * )
 */
class FileImport extends ProcessPluginBase {

  /**
   * {@inheritdoc}
   */
  public function transform($value, MigrateExecutableInterface $migrate_executable, Row $row, $destination_property) {

    $user = \Drupal::currentUser();
    $file = \Drupal::entityTypeManager()->getStorage('file')->create(['uri' => $value]);

    // // TODO :: Get properties from csv & set it for the file instance.
    // // Get uri property from csv
    // $file_uri = $row->getSourceProperty('get_the_uri_property_from_csv'); 
    
    // // Set it for the file object
    // $file->setFileUri();
    // $file->save();

    return $file->id();
  }

}
