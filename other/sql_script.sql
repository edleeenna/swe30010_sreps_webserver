CREATE DATABASE IF NOT EXISTS localdb;
USE
    localdb;
CREATE TABLE IF NOT EXISTS sales(
    sale_id INT(6) ZEROFILL AUTO_INCREMENT,
    sale_datetime DATETIME NOT NULL,
    PRIMARY KEY(sale_id)
);
CREATE TABLE IF NOT EXISTS categories(
    category_id INT(4) AUTO_INCREMENT ,
    category_name VARCHAR(255) NOT NULL,
    PRIMARY KEY(category_id)
);
CREATE TABLE IF NOT EXISTS stock(
    stock_id INT(6) ZEROFILL AUTO_INCREMENT,
    stock_name VARCHAR(255) NOT NULL,
    stock_description LONGTEXT,
    stock_directions LONGTEXT,
    stock_ingredients LONGTEXT,
    stock_price DECIMAL(7, 2),
    stock_cost_price DECIMAL(7, 2) NOT NULL,
    stock_qty INT NOT NULL,
    stock_target_min_qty INT,
    stock_supplier VARCHAR(255),
    stock_supplier_order_code VARCHAR(32),
    stock_category_id INT(4),
    stock_bar_code VARCHAR(32),
    PRIMARY KEY(stock_id),
    FOREIGN KEY(stock_category_id) REFERENCES categories(category_id)
);
CREATE TABLE IF NOT EXISTS orderlines(
    orderline_sale_id INT(6) ZEROFILL,
    orderline_stock_id INT(6) ZEROFILL,
    orderline_qty INT NOT NULL,
    orderline_price DECIMAL(7, 2),
    PRIMARY KEY(orderline_sale_id, orderline_stock_id),
    FOREIGN KEY(orderline_sale_id) REFERENCES sales(sale_id),
    FOREIGN KEY(orderline_stock_id) REFERENCES stock(stock_id)
);
