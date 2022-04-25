<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%country_continent_xref}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%country}}`
 * - `{{%continent}}`
 */
class m220425_021902_create_country_continent_xref_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%country_continent_xref}}', [
            'id' => $this->primaryKey(),
            'country_id' => $this->integer()->notNull(),
            'continent_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `country_id`
        $this->createIndex(
            '{{%idx-country_continent_xref-country_id}}',
            '{{%country_continent_xref}}',
            'country_id'
        );

        // add foreign key for table `{{%country}}`
        $this->addForeignKey(
            '{{%fk-country_continent_xref-country_id}}',
            '{{%country_continent_xref}}',
            'country_id',
            '{{%country}}',
            'id',
            'CASCADE'
        );

        // creates index for column `continent_id`
        $this->createIndex(
            '{{%idx-country_continent_xref-continent_id}}',
            '{{%country_continent_xref}}',
            'continent_id'
        );

        // add foreign key for table `{{%continent}}`
        $this->addForeignKey(
            '{{%fk-country_continent_xref-continent_id}}',
            '{{%country_continent_xref}}',
            'continent_id',
            '{{%continent}}',
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
            '{{%fk-country_continent_xref-country_id}}',
            '{{%country_continent_xref}}'
        );

        // drops index for column `country_id`
        $this->dropIndex(
            '{{%idx-country_continent_xref-country_id}}',
            '{{%country_continent_xref}}'
        );

        // drops foreign key for table `{{%continent}}`
        $this->dropForeignKey(
            '{{%fk-country_continent_xref-continent_id}}',
            '{{%country_continent_xref}}'
        );

        // drops index for column `continent_id`
        $this->dropIndex(
            '{{%idx-country_continent_xref-continent_id}}',
            '{{%country_continent_xref}}'
        );

        $this->dropTable('{{%country_continent_xref}}');
    }
}
