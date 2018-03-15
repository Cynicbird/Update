<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180315013151 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, bookmark_id INT DEFAULT NULL, username VARCHAR(100) NOT NULL, email VARCHAR(100) NOT NULL, birthdate DATE DEFAULT NULL, password VARCHAR(100) NOT NULL, INDEX IDX_8D93D64992741D25 (bookmark_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE news (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, summary VARCHAR(255) DEFAULT NULL, src_image_file VARCHAR(255) DEFAULT NULL, article_url VARCHAR(255) NOT NULL, release_time DATETIME DEFAULT NULL, id_api VARCHAR(255) DEFAULT NULL, INDEX IDX_1DD3995012469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bookmark (id INT AUTO_INCREMENT NOT NULL, news_id INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, INDEX IDX_DA62921DB5A459A0 (news_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, api_id INT DEFAULT NULL, news_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_64C19C154963938 (api_id), INDEX IDX_64C19C1B5A459A0 (news_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comments (id INT NOT NULL, user_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, descrption VARCHAR(255) NOT NULL, created_on DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, INDEX IDX_5F9E962AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE apis (id INT AUTO_INCREMENT NOT NULL, news_id INT DEFAULT NULL, name VARCHAR(100) NOT NULL, url VARCHAR(255) NOT NULL, type VARCHAR(25) NOT NULL, INDEX IDX_8B1CD742B5A459A0 (news_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64992741D25 FOREIGN KEY (bookmark_id) REFERENCES bookmark (id)');
        $this->addSql('ALTER TABLE news ADD CONSTRAINT FK_1DD3995012469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE bookmark ADD CONSTRAINT FK_DA62921DB5A459A0 FOREIGN KEY (news_id) REFERENCES news (id)');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C154963938 FOREIGN KEY (api_id) REFERENCES apis (id)');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C1B5A459A0 FOREIGN KEY (news_id) REFERENCES news (id)');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE apis ADD CONSTRAINT FK_8B1CD742B5A459A0 FOREIGN KEY (news_id) REFERENCES news (id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962AA76ED395');
        $this->addSql('ALTER TABLE bookmark DROP FOREIGN KEY FK_DA62921DB5A459A0');
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C1B5A459A0');
        $this->addSql('ALTER TABLE apis DROP FOREIGN KEY FK_8B1CD742B5A459A0');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64992741D25');
        $this->addSql('ALTER TABLE news DROP FOREIGN KEY FK_1DD3995012469DE2');
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C154963938');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE news');
        $this->addSql('DROP TABLE bookmark');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE comments');
        $this->addSql('DROP TABLE apis');
    }
}
