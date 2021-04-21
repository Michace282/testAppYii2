<?php
namespace common\models;

use yii\db\ActiveRecord;


class Url extends ActiveRecord
{
   public function rules() {
        return [
            [['url', 'title','status_id'], 'safe'],
            [['url'], 'string', 'max' => 255],
        ];
    }
    public static function tableName()
    {
        return '{{%url_title}}';
    }
	
	public function getTitle()
    {
       $text = file_get_contents( $this->url );
       preg_match( '/<title>(.*?)<\\/title>/is' , $text, $title );
	   $this->title = $title[1];
       return $this->save();
    }

}