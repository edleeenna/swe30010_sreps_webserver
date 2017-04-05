CREATE DATABASE IF NOT EXISTS localdb;
USE
    localdb;
CREATE TABLE IF NOT EXISTS sales(
    sale_id VARCHAR(32),
    sale_datetime DATETIME,
    PRIMARY KEY(sale_id)
);
CREATE TABLE IF NOT EXISTS categories(
    category_id INT(4) NOT NULL AUTO_INCREMENT ,
    category_name VARCHAR(255),
    PRIMARY KEY(category_id)
);
CREATE TABLE IF NOT EXISTS stock(
    stock_id INT(5) NOT NULL AUTO_INCREMENT,
    stock_name VARCHAR(255),
    stock_description LONGTEXT,
    stock_directions LONGTEXT,
    stock_ingredients LONGTEXT,
    stock_price DECIMAL(7, 2),
    stock_cost_price DECIMAL(7, 2),
    stock_qty INT,
    stock_target_min_qty INT,
    stock_supplier VARCHAR(255),
    stock_supplier_order_code VARCHAR(32),
    stock_category_id INT(4),
    stock_bar_code VARCHAR(32),
    PRIMARY KEY(stock_id),
    FOREIGN KEY(stock_category_id) REFERENCES categories(category_id)
);
CREATE TABLE IF NOT EXISTS orderlines(
    orderline_sale_id VARCHAR(32),
    orderline_stock_id INT(5) AUTO_INCREMENT,
    orderline_qty INT,
    orderline_price DECIMAL(7, 2),
    PRIMARY KEY(orderline_sale_id, orderline_stock_id),
    FOREIGN KEY(orderline_sale_id) REFERENCES sales(sale_id),
    FOREIGN KEY(orderline_stock_id) REFERENCES stock(stock_id)
);
