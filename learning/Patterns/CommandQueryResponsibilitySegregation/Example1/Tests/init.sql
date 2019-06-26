CREATE TABLE IF NOT EXISTS posts (
    id VARCHAR(100) NOT NULL,
    title VARCHAR(100) NOT NULL,
    content TEXT NOT NULL,
    published INTEGER
);

CREATE TABLE IF NOT EXISTS single_post_with_comments (
    id INTEGER NOT NULL,
    post_id INTEGER NOT NULL,
    post_title VARCHAR(100) NOT NULL,
    post_content TEXT NOT NULL,
    post_created_at DATETIME NOT NULL,
    comment_content TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS events (
    id INTEGER PRIMARY KEY,
    aggregate_id INTEGER NOT NULL,
    type VARCHAR(100) NOT NULL,
    created_at DATETIME NOT NULL,
    data VARCHAR(255)
);