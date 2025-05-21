INSERT INTO users (account_name, email, display_name, password, created_at) VALUES
('john_doe', 'john@example.com', 'John Doe', '$2b$10$eB9ePBsEb3NK7mHiN0c8ZOJL.HoqiKc39sEyyDklSTUAdp6S3o9Zy', '2024-03-10 09:15:00'),
('jane_smith', 'jane@example.com', 'Jane Smith', '$2b$10$eB9ePBsEb3NK7mHiN0c8ZOJL.HoqiKc39sEyyDklSTUAdp6S3o9Zy', '2024-03-11 10:45:00'),
('alice_wonder', 'alice@example.com', 'Alice Wonder', '$2b$10$eB9ePBsEb3NK7mHiN0c8ZOJL.HoqiKc39sEyyDklSTUAdp6S3o9Zy', '2024-03-12 14:30:00'),
('bob_builder', 'bob@example.com', 'Bob Builder', '$2b$10$eB9ePBsEb3NK7mHiN0c8ZOJL.HoqiKc39sEyyDklSTUAdp6S3o9Zy', '2024-03-13 08:20:00'),
('charlie_brown', 'charlie@example.com', 'Charlie Brown', '$2b$10$eB9ePBsEb3NK7mHiN0c8ZOJL.HoqiKc39sEyyDklSTUAdp6S3o9Zy', '2024-03-14 16:05:00'),
('daisy_duck', 'daisy@example.com', 'Daisy Duck', '$2b$10$eB9ePBsEb3NK7mHiN0c8ZOJL.HoqiKc39sEyyDklSTUAdp6S3o9Zy', '2024-03-15 11:10:00'),
('ethan_hunt', 'ethan@example.com', 'Ethan Hunt', '$2b$10$eB9ePBsEb3NK7mHiN0c8ZOJL.HoqiKc39sEyyDklSTUAdp6S3o9Zy', '2024-03-16 12:40:00'),
('fiona_apple', 'fiona@example.com', 'Fiona Apple', '$2b$10$eB9ePBsEb3NK7mHiN0c8ZOJL.HoqiKc39sEyyDklSTUAdp6S3o9Zy', '2024-03-17 13:55:00'),
('george_clark', 'george@example.com', 'George Clark', '$2b$10$eB9ePBsEb3NK7mHiN0c8ZOJL.HoqiKc39sEyyDklSTUAdp6S3o9Zy', '2024-03-18 09:25:00'),
('hannah_montana', 'hannah@example.com', 'Hannah Montana', '$2b$10$eB9ePBsEb3NK7mHiN0c8ZOJL.HoqiKc39sEyyDklSTUAdp6S3o9Zy', '2024-03-19 15:15:00');

INSERT INTO tweets (message, user_id, image_path, created_at) VALUES
('今日もいい天気ですね。', 1, NULL, '2024-03-20 08:00:00'),
('ランチはカレーにしました！🍛', 2, NULL, '2024-03-20 12:30:00'),
('新しいプロジェクトが始まった💻', 3, 'images/project.png', '2024-03-21 09:45:00'),
('猫の写真をアップしました🐱', 1, 'images/cat.jpg', '2024-03-21 14:20:00'),
('今夜は映画鑑賞🎬', 1, NULL, '2024-03-21 19:00:00'),
('Reactの勉強中！', 6, NULL, '2024-03-22 11:15:00'),
('週末は登山に行ってきました⛰️', 7, 'images/mountain.jpg', '2024-03-23 07:40:00'),
('コーヒーが手放せない☕️', 8, NULL, '2024-03-23 10:50:00'),
('ランニング5km達成！🏃', 8, NULL, '2024-03-24 06:30:00'),
('読書の秋📚 最近のお気に入りはミステリー小説。', 3, NULL, '2024-03-24 17:25:00');
