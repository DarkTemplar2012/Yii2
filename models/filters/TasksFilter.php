<?php

namespace app\models\filters;

use app\models\User;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\tables\Tasks;

/**
 * TasksFilter represents the model behind the search form of `app\models\tables\Tasks`.
 */
class TasksFilter extends Tasks
{
  /**
   * {@inheritdoc}
   */
  public $deadline_month;

  public function rules()
  {
    return [
      [['id', 'creator_id', 'responsible_id', 'status_id'], 'integer'],
      [['title', 'description', 'deadline', 'deadline_month'], 'safe'],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function scenarios()
  {
    // bypass scenarios() implementation in the parent class
    return Model::scenarios();
  }

  /**
   * Creates data provider instance with search query applied
   *
   * @param array $params
   *
   * @return ActiveDataProvider
   */
  public function search($params)
  {

    $query = Tasks::find();
//      ->join('LEFT JOIN', 'users', 'users . id = creator_id');
    // add conditions that should always apply here

    $dataProvider = new ActiveDataProvider([
      'query' => $query,
    ]);

    $this->load($params);

    if (!$this->validate()) {
      // uncomment the following line if you do not want to return any records when validation fails
      // $query->where('0 = 1');
      return $dataProvider;
    }

    // grid filtering conditions
    $query->andFilterWhere([
      'id' => $this->id,
      'creator_id' => $this->creator_id,
      'responsible_id' => $this->responsible_id,
      'deadline' => $this->deadline,
      'status_id' => $this->status_id,
//      'login' => $this->login,
    ]);
    $query->andFilterWhere(['like', 'title', $this->title])
      ->andFilterWhere(['like', 'description', $this->description])
      ->andFilterWhere(['month(deadline)' => $this->deadline_month]);
//    var_dump($this->deadline_month);
    return $dataProvider;
  }
}
