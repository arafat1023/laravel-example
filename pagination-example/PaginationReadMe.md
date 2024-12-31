---

## **What is Pagination?**

**Definition:** Pagination is the process of breaking down large sets of data into smaller, manageable chunks or "pages" to improve usability and performance.

**Real-World Analogy:** Think of a book with numbered pages. Instead of reading the entire book in one go, you read it page by page.

### **Why Use Pagination?**

**1. User Experience:**

- Imagine scrolling through thousands of records on a single page. Pagination makes it easier for users to consume and navigate content.

**2. Performance Optimization:**

- Instead of fetching and displaying all records at once, pagination retrieves only a subset, reducing server and client load.

**3. Scalability:**

- Pagination ensures your application can handle large datasets efficiently without crashing or slowing down.

---

## **Key Concepts in Pagination**

### **1. Current Page**

- Represents the page number currently being viewed.
- Typically passed as a query parameter in the URL (e.g., `?page=2`).

### **2. Records Per Page**

- The maximum number of records displayed on one page.
- Example: If set to 10, each page will show 10 records.

### **3. Total Records**

- The total number of records in the dataset. Used to calculate the total number of pages.

### **4. Offset**

- The number of records to skip before starting to fetch the current page's records.

**Formula:**

```text
Offset = (Current Page - 1) x Records Per Page
```

**Example:**

- If `Current Page = 3` and `Records Per Page = 10`, then:

```text
Offset = (3 - 1) x 10 = 20
```

- Skip the first 20 records and fetch the next 10.

### **5. Total Pages**

- The total number of pages needed to display all records.

**Formula:**

```text
Total Pages = CEIL(Total Records / Records Per Page)
```

**Example:**

- If `Total Records = 23` and `Records Per Page = 10`:

```text
Total Pages = CEIL(23 / 10) = 3
```

---

## **Real-World Examples**

**1. Search Engines**:

- Google paginates search results, typically showing 10 results per page.

**2. E-commerce Websites:**

- Products are displayed in pages for easy navigation.

**3. Social Media Feeds:**

- Infinite scrolling loads new content dynamically (a form of pagination).

---

## **SQL Queries for Basic Pagination**

### **1. Create a Table**

To work with pagination, you first need a database table. Here's how to create a simple `projects` table:

```sql
CREATE TABLE projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
```

### **2. Insert Sample Data**

```sql
INSERT INTO projects (name, description, created_at, updated_at) VALUES
('Project A', 'Description of Project A', NOW(), NOW()),
('Project B', 'Description of Project B', NOW(), NOW()),
('Project C', 'Description of Project C', NOW(), NOW()),
('Project D', 'Description of Project D', NOW(), NOW()),
('Project E', 'Description of Project E', NOW(), NOW());
```

### **3. Connect to MySQL and List Databases**

1. Open your terminal or command prompt.
2. Login to MySQL:

```bash
mysql -u your_username -p
```

- Replace `your_username` with your MySQL username.
- Enter your password when prompted.

3. List all databases:

```sql
SHOW DATABASES;
```

4. Select your database:

```sql
USE your_database_name;
```

- Replace `your_database_name` with the name of your database.

### **4. Fetch First 10 Records**

```sql
SELECT * FROM projects LIMIT 10;
```

### **5. Fetch Records for Page 2 (Offset Calculation)**

```sql
SELECT * FROM projects LIMIT 10 OFFSET 10;
```

- **Explanation:**
    - `LIMIT 10`: Fetch 10 records.
    - `OFFSET 10`: Skip the first 10 records.

### **6. Total Records Count**

```sql
SELECT COUNT(*) AS total_records FROM projects;
```

### **7. Calculate Total Pages**

```sql
SELECT CEIL(COUNT(*) / 10) AS total_pages FROM projects;
```

- Assumes 10 records per page.

---

## **Interactive Exercise**

1. **Task:** Write an SQL query to fetch the first 5 records for page 3.

    - Hint: Calculate the offset using the formula.

2. **Expected Answer:**

```sql
SELECT * FROM projects LIMIT 5 OFFSET 10;
```

---
