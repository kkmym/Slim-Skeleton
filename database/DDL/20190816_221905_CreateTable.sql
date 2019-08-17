CREATE TABLE users (
    user_id INT NOT NULL AUTO_INCREMENT
    ,disp_user_id VARCHAR(255) NOT NULL
    ,login_id VARCHAR(255) NOT NULL
    ,hashed_pw VARCHAR(255) NOT NULL
    ,user_name VARCHAR(255) NOT NULL
    ,created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
    ,updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    ,CONSTRAINT PRIMARY KEY PK_users (user_id)
) CHARSET utf8mb4 COLLATE utf8mb4_general_ci ;

CREATE TABLE user_login_fails (
    login_id VARCHAR(255) NOT NULL
    ,fail_count_start_datetime DATETIME NOT NULL
    ,fail_counts INT NOT NULL
    ,locked_out_flag BIT(1) NOT NULL DEFAULT 0
    ,lock_out_start_datetime DATETIME NOT NULL DEFAULT '1900-01-01'
    ,created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
    ,updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    ,CONSTRAINT PRIMARY KEY PK_user_login_fails (login_id)
) CHARSET utf8mb4 COLLATE utf8mb4_general_ci ;

CREATE TABLE user_password_reset_keys (
    reset_key_id INT NOT NULL AUTO_INCREMENT
    ,user_id INT NOT NULL
    ,url_key VARCHAR(32) NOT NULL
    ,input_key VARCHAR(8) NOT NULL
    ,expiration_datetime DATETIME NOT NULL
    ,available_flag BIT(1) NOT NULL DEFAULT 1
    ,created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
    ,updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    ,CONSTRAINT PRIMARY KEY PK_user_reset_password_keys (reset_key_id)
) CHARSET utf8mb4 COLLATE utf8mb4_general_ci ;
