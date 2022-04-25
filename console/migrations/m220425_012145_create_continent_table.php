<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%continent}}`.
 */
class m220425_012145_create_continent_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%continent}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
        ]);

        $this->insert('continent', [
            'name' => 'Africa',
        ]);

        $this->insert('continent', [
            'name' => 'Asia',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%continent}}');
    }
}
