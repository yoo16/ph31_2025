INSERT INTO categories (name, sort_order) VALUES
('まぐろ', 1),
('白身・光り物', 2),
('えび', 3),
('サーモン', 4),
('いか', 5),
('軍艦巻き', 6),
('サイドメニュー', 7);

INSERT INTO products (name, price, image_path, category_id) VALUES
('まぐろ', 100, 'images/products/maguro.png', 1),
('本鮪中とろ', 160, 'images/products/chu_tro.png', 1),
('とろびんちょう', 100, 'images/products/toro_bincho.png', 1),
('活〆はまち', 100, 'images/products/katu_hamachi.png', 2),
('活〆まだい', 160, 'images/products/katu_madai.png', 2),
('しめさば', 160, 'images/products/sime_sama.png', 2),
('サーモン', 100, 'images/products/salmon.png', 4),
('焼とろサーモン', 160, 'images/products/yaki_toro_salmon.png', 4),
('いくら', 160, 'images/products/ikura.png', 6),
('うに軍艦', 160, 'images/products/uni.png', 6),
('えび', 100, 'images/products/ebi.png', 3),
('甘えび', 100, 'images/products/ama_ebi.png', 3),
('アカイカ', 160, 'images/products/aka_ika.png', 5),
('かつおだしの茶碗蒸し', 190, 'images/products/tyawan_musi.png', 7),
('あおさみそ汁', 120, 'images/products/aosa_misosiru.png', 7),
('カリカリポテト', 220, 'images/products/kari_poteto.png', 7);

INSERT INTO seats (number)
VALUES (1), (2), (3), (4), (5), (6), (7), (8), (9), (10);