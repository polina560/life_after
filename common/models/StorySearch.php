<?php

namespace common\models;

use yii\base\InvalidConfigException;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * StorySearch represents the model behind the search form of `common\models\Story`.
 */
final class StorySearch extends Story
{
    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['id'], 'integer'],
            [['accusation', 'first_name', 'middle_name', 'last_name', 'add_information', 'desktop_photo', 'mobile_photo', 'story', 'link'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios(): array
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with a search query applied
     *
     * @throws InvalidConfigException
     */
    public function search(array $params): ActiveDataProvider
    {
        $query = Story::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider(['query' => $query]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'accusation', $this->accusation])
            ->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'middle_name', $this->middle_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'add_information', $this->add_information])
            ->andFilterWhere(['like', 'desktop_photo', $this->desktop_photo])
            ->andFilterWhere(['like', 'mobile_photo', $this->mobile_photo])
            ->andFilterWhere(['like', 'story', $this->story])
            ->andFilterWhere(['like', 'link', $this->link]);

        return $dataProvider;
    }
}
