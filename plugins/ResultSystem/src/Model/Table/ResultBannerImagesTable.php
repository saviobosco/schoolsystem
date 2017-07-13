<?php
namespace ResultSystem\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ResultBannerImages Model
 *
 * @method \ResultSystem\Model\Entity\ResultBannerImage get($primaryKey, $options = [])
 * @method \ResultSystem\Model\Entity\ResultBannerImage newEntity($data = null, array $options = [])
 * @method \ResultSystem\Model\Entity\ResultBannerImage[] newEntities(array $data, array $options = [])
 * @method \ResultSystem\Model\Entity\ResultBannerImage|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \ResultSystem\Model\Entity\ResultBannerImage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \ResultSystem\Model\Entity\ResultBannerImage[] patchEntities($entities, array $data, array $options = [])
 * @method \ResultSystem\Model\Entity\ResultBannerImage findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ResultBannerImagesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('result_banner_images');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        // loads the Proffer behaviour for picture upload .
        $this->addBehavior('Proffer.Proffer', [
            'banner_image' => [    // The name of your upload field
                'root' => WWW_ROOT .'img/result-banner', // Customise the root upload folder here, or omit to use the default
                'dir' => 'photo_dir',   // The name of the field to store the folder
            ]
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');


        return $validator;
    }
}
