CREATE TABLE IF NOT EXISTS categories (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(50) UNIQUE
);

CREATE TABLE IF NOT EXISTS users (
  id INT PRIMARY KEY AUTO_INCREMENT,
  user_name VARCHAR(50) NOT NULL,
  first_name VARCHAR(50) NOT NULL,
  last_name VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  role ENUM('Admin', 'User') DEFAULT 'User' NOT NULL
);

CREATE TABLE IF NOT EXISTS tasks (
  id INT PRIMARY KEY AUTO_INCREMENT,
  title VARCHAR(255) NOT NULL,
  description TEXT NOT NULL,
  created_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  due_date VARCHAR(100),
  priority ENUM('Low', 'Medium', 'High') DEFAULT 'Medium',
  progress ENUM('Doing', 'Done') DEFAULT 'Doing',
  user_id INT,
  category_id INT,

  FOREIGN KEY (user_id) REFERENCES users(id),
  FOREIGN KEY (category_id) REFERENCES categories(id)
);

INSERT INTO tasks (id, title, description, created_date, due_date, priority, progress, user_id, category_id) VALUES 
(1, 'Task1', 'shut surprise win notice consider health occur herself back trick store however could mountain somewhere bank monkey past hungry circus shine neck not jungle', '2024-01-01', CURRENT_TIMESTAMP, 'Medium', 'Doing', 3, 2),
(2, 'Task2', 'nuts sheet me straw to take water bring north wall funny where song run continued design hundred science crop monkey bread with remain adultClotilde', '2024-01-01', CURRENT_TIMESTAMP,'Medium', 'Doing', 4, 5),
(3, 'Task3', 'member able nearby whenever temperature sky particles open official greatly bit cotton hello equator castle idea production money situation proud mirror oil sign sisterKoby', '2024-01-01', CURRENT_TIMESTAMP,'Medium', 'Done', 2, 1), 
(4, 'Task4', 'tiny pink sight brown branch left unhappy if damage grandmother magic drove so climb calm substance feed process time officer bill steam enjoy summerLela', '2024-01-01', CURRENT_TIMESTAMP,'Low', 'Done', 5, 4), 
(5, 'Task5', 'till rapidly love journey chief feathers line other song themselves victory let capital prove plural cattle stretch outside same making difficult upward oldest hundredAlphonso', '2024-01-01', CURRENT_TIMESTAMP,'High', 'Doing', 1, 3);


INSERT INTO categories (name) VALUES 
('Study'), 
('Work'), 
('Health'), 
('Diet'), 
('Sleep');


