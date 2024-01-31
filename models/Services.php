<?php

namespace app\models;

use yii\web\UploadedFile;

use Yii;

/**
 * This is the model class for table "services".
 *
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property float $price
 * @property float $warranty
 * @property int|null $car_types
 * @property string|null $image
 * @property string|null $description

 *
 * @property Categories $category
 */
class Services extends \yii\db\ActiveRecord
{
    /**
     * @var UploadedFile
     */
    public $imageFile;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'services';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'price', 'category_id', 'car_types'], 'required'],
            [['description', 'car_types'], 'string'],
            [['price'], 'number'],
            [['warranty'], 'number'],
            [['category_id'], 'integer'],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg,SVG, jpeg'],
            [['name'], 'string', 'max' => 255],
            // ['image', 'image', 'extensions' => 'jpg, jpeg, gif, png', 'maxFiles' => 1, 'maxSize' => 1024 * 100, 'skipOnEmpty' => true, 'on' => 'name_desc'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::class, 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'price' => 'Price',
            'warranty' => 'Warranty',
            'category_id' => 'Category ID',
            'car_types' => 'Car Types',
            'image' => 'Image',
            'imageFile' => 'Upload Image', // Add a label for the image file
        ];
    }

    /**
     * Handles file upload.
     *
     * @return bool Whether the upload was successful.
     */
    public function upload()
    {
        if ($this->validate()) {
            $uploadPath = 'uploads/images/';
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            $fileName = $this->imageFile->baseName . '.' . $this->imageFile->extension;
            $filePath = $uploadPath . $fileName;

            // Move the uploaded file to the destination path
            if ($this->imageFile->saveAs($filePath)) {
                // Update the image attribute with the file path
                $this->image = $filePath;

                // Clear the UploadedFile attribute to avoid saving it again
                $this->imageFile = null;

                // Save the model without validating it again
                return $this->save(false);
            }
        }

        return false;
    }


    /**
     * Gets the query for the associated Category model.
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Categories::class, ['id' => 'category_id']);
    }
}
