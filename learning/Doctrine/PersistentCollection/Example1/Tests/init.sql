PRAGMA foreign_keys = ON;

CREATE TABLE IF NOT EXISTS books (
    id VARCHAR(100) NOT NULL PRIMARY KEY,
    title VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS authors (
    id VARCHAR(100) NOT NULL PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS books_have_authors (
    book_id VARCHAR(100) NOT NULL,
    author_id VARCHAR(100) NOT NULL,
    FOREIGN KEY(book_id) REFERENCES books(id),
    FOREIGN KEY(author_id) REFERENCES authors(id)
);

INSERT INTO books (id, title) VALUES ('1', 'Awesome Book'), ('2', 'Untitled Book'), ('3', 'World History');
INSERT INTO authors (id, name) VALUES ('1', 'John Doe'), ('2', 'Terry Smith'), ('3', 'James Blake');
INSERT INTO books_have_authors (book_id, author_id) VALUES ('1', '2'), ('2', '1'), ('2', '2'), ('2', '3'), ('3', '3'), ('3', '1');