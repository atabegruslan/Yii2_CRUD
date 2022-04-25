<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%review}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%country}}`
 * - `{{%user}}`
 */
class m220425_023534_create_review_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%review}}', [
            'id' => $this->primaryKey(),
            'place' => $this->string()->notNull(),
            'country_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'review' => $this->text()->notNull(),
            'image_url' => $this->string(),
            'trip_start' => $this->dateTime(),
            'trip_end' => $this->dateTime(),
        ]);

        // creates index for column `country_id`
        $this->createIndex(
            '{{%idx-review-country_id}}',
            '{{%review}}',
            'country_id'
        );

        // add foreign key for table `{{%country}}`
        $this->addForeignKey(
            '{{%fk-review-country_id}}',
            '{{%review}}',
            'country_id',
            '{{%country}}',
            'id',
            'CASCADE'
        );

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-review-user_id}}',
            '{{%review}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-review-user_id}}',
            '{{%review}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%country}}`
        $this->dropForeignKey(
            '{{%fk-review-country_id}}',
            '{{%review}}'
        );

        // drops index for column `country_id`
        $this->dropIndex(
            '{{%idx-review-country_id}}',
            '{{%review}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-review-user_id}}',
            '{{%review}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-review-user_id}}',
            '{{%review}}'
        );

        $this->dropTable('{{%review}}');
    }
}
