<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 9/25/16
 * Time: 2:53 PM
 */

namespace App\Event;

use Cake\Event\Event;
use Cake\Event\EventListenerInterface;
use Cake\Utility\Inflector;
use Proffer\Lib\ProfferPath;

class UploadFileNameListener implements  EventListenerInterface
{
    public function implementedEvents()
    {
        return [
            'Proffer.afterPath' => 'change'
        ];
    }

    public function change(Event $event, ProfferPath $path)
    {
        // Detect and select the right file extension
        switch ($event->subject()->get('image')['type']) {
            default:
            case "image/jpeg":
                $ext = '.jpg';
                break;
            case "image/png":
                $ext = '.png';
                break;
            case "image/gif":
                $ext = '.gif';
                break;
        }

        // Create a new filename using the id and the name of the entity
        $newFilename = $event->subject()->get('id') . '_' . Inflector::slug($event->subject()->get('name')) . $ext;

        // This would set the containing upload folder to `webroot/files/user_profile_pictures/<field>/<seed>/<file>`
        // for every file uploaded through the table this listener was attached to.
        $path->setTable('user_profile_pictures');

        // If a seed is set in the data already, we'll use that rather than make a new one each time we upload
        if (empty($event->subject()->get('image_dir'))) {
            $path->setSeed(date('Y-m-d-His'));
        }

        // Change the filename in both the path to be saved, and in the entity data for saving to the db
        $path->setFilename($newFilename);
        $event->subject('image')['name'] = $newFilename;

        // Must return the modified path instance, so that things are saved in the right place
        return $path;
    }


}