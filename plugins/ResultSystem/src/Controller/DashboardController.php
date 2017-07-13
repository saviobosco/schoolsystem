<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 9/26/16
 * Time: 5:58 PM
 */

namespace ResultSystem\Controller;

use Settings\Core\Setting;
use ResultSystem\Controller\AppController;
use Cake\Core\Configure;
use Cake\Utility\Hash;

class DashboardController extends AppController
{
    public function settings()
    {
         //Setting::write('ResultSystem.banner_image', '');


        $this->loadModel('Settings.Configurations');
        $this->prefixes = Configure::read('Settings.Prefixes');

        $key = 'ResultSystem';

        $prefix = Hash::get($this->prefixes, ucfirst($key));
        $settings = $this->Configurations->find('all')->where([
            'name LIKE' => $key . '%',
            'editable' => 1,
        ])->order(['weight', 'id']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $settings = $this->Configurations->patchEntities($settings, $this->request->data);
            foreach ($settings as $setting) {
                //$this->Flash->success('The settings has been saved.');
                if (!$this->Configurations->save($setting)) {
                    $this->Flash->error('The settings could not be saved. Please, try again.');
                }
            }
            $this->Flash->greatSuccess('The settings has been saved.');
            Setting::clear(true);
            Setting::autoLoad();
            return $this->redirect([]);
        }
        $this->set(compact('prefix', 'settings'));

    }

    public function uploadBannerImage()
    {
        $this->loadModel('ResultBannerImages');

         $image = $this->ResultBannerImages->find('all')->where(['id' => 1])->first();

        if ($this->request->is(['patch', 'post', 'put'])) {
            $image = $this->ResultBannerImages->patchEntity($image,$this->request->data);
            debug($image); exit;

            if($this->ResultBannerImages->save($image)) {
                $this->Flash->greatSuccess('The Image was successfully uploaded.');
            }

            return $this->redirect(['action' => 'settings']);
        }
    }

}