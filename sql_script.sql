CREATE DATABASE IF NOT EXISTS localdb;
USE
    localdb;
CREATE TABLE IF NOT EXISTS sale(
    sale_id INT(4),
    sale_date_time DATETIME,
    PRIMARY KEY(sale_id)
);
CREATE TABLE IF NOT EXISTS catagory(
    catagory_id INT(4),
    catagory_name VARCHAR(255),
    PRIMARY KEY(catagory_id)
);
CREATE TABLE IF NOT EXISTS stock(
    item_id INT(4),
    item_name VARCHAR(255),
    item_description VARCHAR(1024),
    item_qty INT,
    item_price DECIMAL(7, 2),
    item_cost_price DECIMAL(7, 2),
    item_order_code VARCHAR(255),
    item_target_min_qty INT,
    catagory_id INT(4),
    FOREIGN KEY(catagory_id) REFERENCES catagory(catagory_id),
    bar_code VARCHAR(16),
    PRIMARY KEY(item_id)
);
CREATE TABLE IF NOT EXISTS purchase(
    sale_id INT(4),
    item_id INT(4),
    FOREIGN KEY(sale_id) REFERENCES sale(sale_id),
    FOREIGN KEY(item_id) REFERENCES stock(item_id),
    purchase_qty INT,
    purchase_price DECIMAL(7, 2),
    PRIMARY KEY(sale_id, item_id)
);
