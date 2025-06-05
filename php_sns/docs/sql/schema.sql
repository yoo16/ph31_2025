CREATE TABLE users (
    id bigint PRIMARY KEY AUTO_INCREMENT,
    account_name varchar(255) UNIQUE NOT NULL,
    email varchar(255) UNIQUE NOT NULL,
    display_name varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    profile text DEFAULT NULL,
    created_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE tweets (
    id bigint PRIMARY KEY AUTO_INCREMENT,
    message text NOT NULL,
    user_id bigint NOT NULL,
    image_path text DEFAULT NULL,
    created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE likes (
    id bigint PRIMARY KEY AUTO_INCREMENT,
    user_id bigint NOT NULL,
    tweet_id bigint NOT NULL,
    created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    UNIQUE (user_id, tweet_id)
);

-- 外部キー制約
ALTER TABLE tweets ADD CONSTRAINT tweets_user_id_fk
    FOREIGN KEY (user_id) REFERENCES users(id)
    ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE likes ADD CONSTRAINT likes_tweet_id_fk
    FOREIGN KEY (tweet_id) REFERENCES tweets(id)
    ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE likes ADD CONSTRAINT likes_user_id_fk
    FOREIGN KEY (user_id) REFERENCES users(id)
    ON DELETE CASCADE ON UPDATE CASCADE;