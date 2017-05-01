-- Stock
INSERT INTO stock (stock_id,stock_name,stock_description,stock_directions,stock_ingredients,stock_price,stock_cost_price,stock_qty,stock_target_min_qty,stock_supplier,stock_supplier_order_code,stock_category_id,stock_bar_code)
VALUES
('175','Atkins Endulge Single Chocolate Coconut 40g','','','','3.26','3.25','21','18','Hermann Group','MC-H24','8000','698193990-8'),
('176','Atkins Endulge Single Milk Chocolate 30g','','','','3.26','3.25','14','15','Dicki, Leuschke and Osinski','WQ-191','8000','563952943-1'),
('177','Atkins Endulge Chocolate Coconut 200g 5 Pack','','','','14.49','14.5','27','6','Dicki, Leuschke and Osinski','VN-787','8000','789424826-6'),
('178','Accu Chek Fastclix Device','','','','36.24','36.25','18','7','Luettgen-Considine','37HP8-QX-959','5000','163370735-0'),
('179','Extra Bottle Peppermint Gum 64g','','','','14.7','14.7','24','15','Harber-Homenick','ZKsog47','8000','056664770-2'),
('180','Extra Bottle Spearmint Gum 64g','','','','1.45','1.45','16','3','Bauch and Sons','977-21-5005','8000','096564721-8'),
('181','Health & Beauty Toothpaste Childrens 3 Pack','','','','2.99','3','30','16','Bednar-Ruecker','13537-102','4000','678152783-5'),
('182','Double D Sugarfree Cola Bottles 90g','','','','2.69','2.7','26','11','Harber-Homenick','TXjhp51','8000','097261867-8'),
('183','Double D Sugarfree Fruit Chews 70g','','','','2.69','2.7','20','15','Cole-Kuhn','99-PG','8000','214359169-1'),
('184','Ostelin Vitamin D and Calcium Kids Chewable 90','','','','21.99','22','30','11','Boyer-Bayer','931-GH-9','1000','869917010-6'),
('185','Swisse Ultiboost Liver Detox 200 Tablets','','','','43.95','43.95','29','2','Luettgen-Considine','24MW4-CO-012','1000','728330614-5'),
('186','Swisse Ultiboost High Strength Cranberry 90 Capsules','','','','57.99','58','12','2','Lueilwitz-Klein','DkVsWz-1','1000','582046084-7'),
('187','Cavendish & Harvey Barley Sugar Tin 175g','','','','3.95','3.95','24','8','Lueilwitz-Klein','LxLdYe-6','8000','596662560-3'),
('188','Cavendish & Harvey Wild Berry Tin 175g','','','','3.95','3.95','23','26','Dicki, Leuschke and Osinski','YW-544','8000','150730713-6'),
('189','Tena Men Pads Level 3 8 Pack','','','','9.54','9.55','0','10','Hartmann-O\'Connell','YT-H68','4000','397037151-1'),
('190','Sweet Shack Berries & Cream 100g','','','','15.3','15.3','17','11','Dicki, Leuschke and Osinski','VZ-013','8000','990562914-9'),
('191','Radox Sleep Easy Bath Soak with Chamomile & Jasmine 500ml','','','','4','4','27','18','Bauch and Sons','312-23-0469','5000','412878741-8'),
('192','Goat Soap 100g 6 Pack Gift Set','','','','18.5','18.5','30','1','Dicki, Leuschke and Osinski','CO-012','2000','001017673-X');

-- Sales
INSERT INTO sales (sale_id,sale_datetime)
VALUES
('16','2017-03-10 17:30:55'),
('17','2017-03-10 17:5:28'),
('18','2017-03-09 12:56:40'),
('19','2017-03-10 13:34:32'),
('20','2017-03-07 17:3:56');

-- Orderlines
INSERT INTO orderlines (orderline_sale_id,orderline_stock_id,orderline_qty,orderline_price)
VALUES
('16','72','2','4.65'),
('16','8','2','29.35'),
('16','44','4','125.58'),
('17','36','2','94.99'),
('18','69','2','5.85'),
('18','32','5','16.95'),
('19','54','1','39.99'),
('19','20','1','2.99'),
('19','66','3','19.04'),
('19','73','1','12.2'),
('19','3','4','9.69'),
('19','2','2','13.95'),
('19','17','5','13.62'),
('19','9','3','29.99'),
('19','35','1','93.99'),
('20','47','5','95.96'),
('20','6','3','37.3'),
('20','52','3','9.99'),
('20','64','3','46.58'),
('20','1','1','1.16'),
('20','41','2','81.63'),
('20','29','2','9.54'),
('20','63','4','12.3');
