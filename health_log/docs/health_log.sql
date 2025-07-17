CREATE TABLE health_records (
    id INT AUTO_INCREMENT PRIMARY KEY,
    weight FLOAT NOT NULL,
    heart_rate INT NOT NULL,
    systolic INT, -- 収縮期（上の血圧）
    diastolic INT, -- 拡張期（下の血圧）
    recorded_at DATE UNIQUE NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);